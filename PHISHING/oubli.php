<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="oublie.css">
    <title>Mot de Passe Oublié</title>
</head>
<body>
    <img src="img/Hostinger.png" alt="Hostinger" class="logo">
    <div class="container"> <!-- Conteneur pour centrer le formulaire -->
        <h2>Réinitialisez votre mot de passe</h2>
        <form action="oubli.php" method="post">
            <input type="email" name="email" id="email" placeholder="E-mail" required>
            <input type="submit" name="send_email" value="Envoyer un e-mail de réinitialisation" class="btn-connect">
        </form>

        <!-- Texte avec liens et mise en forme -->
        <p style="color: gray; text-align: center; margin-top: 15px;">
            <a href="https://nordpass.com" target="_blank" style="color: gray; text-decoration: underline;font-size:11px;">
                Fatigué de réinitialiser les mots de passe ? Essayez NordPass, c'est gratuit !
            </a>
        </p><br>
        <p style="text-align: center;">
            <a href="index.php" style="color: gray; text-decoration: underline; font-size:11px;">Retour au formulaire de connexion</a>
        </p>
    </div>
</body>

<?php
function passgen1($nbChar) {
    $chaine = "mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
    srand((double)microtime()*1000000);
    $pass = '';
    for($i = 0; $i < $nbChar; $i++){
        $pass .= $chaine[rand() % strlen($chaine)];
    }
    return $pass;
}

include "_conf.php"; // Inclusion de la configuration pour la connexion

if (isset($_POST['send_email']) && isset($_POST['email'])) {
    // Récupère l'email soumis et enlève les espaces avant/après
    $varemail = trim($_POST['email']);
    echo "Email saisi : $varemail <br>";

    // Connexion à la base de données
    if ($connexion = mysqli_connect($serveurBDD, $userBDD, $mdpBDD, $nomBDD)) {

        // Requête pour chercher l'email
        $requete = "SELECT * FROM user WHERE LOWER(email) = LOWER(?)";
        $stmt = mysqli_prepare($connexion, $requete);
        mysqli_stmt_bind_param($stmt, 's', $varemail);
        mysqli_stmt_execute($stmt);
        $resultat = mysqli_stmt_get_result($stmt);

        if (!$resultat) {
            die("Erreur SQL : " . mysqli_error($connexion));
        }

        $trouve = mysqli_num_rows($resultat);
        //echo "Résultats trouvés : $trouve <br>";

        if ($trouve == 1) {
            //echo "Email trouvé dans la base de données.<br>";

            // Générer un nouveau mot de passe
            $mdpnew = passgen1(10);
            //echo "Nouveau mot de passe : $mdpnew <br>";

           

            // Mise à jour du mot de passe dans la base de données
            $update_sql = "UPDATE user SET mdp = ? WHERE email = ?";
            $stmt_update = mysqli_prepare($connexion, $update_sql);
            mysqli_stmt_bind_param($stmt_update, 'ss', $hashed_md5, $varemail);
            mysqli_stmt_execute($stmt_update);

            // Préparation du message
            $message = "Bonjour, votre nouveau mot de passe est : $mdpnew";
            $message = wordwrap($message, 70);

            // Envoi de l'email
            if (mail($varemail, "Réinitialisation de mot de passe", $message)) {
                echo "Un email avec le nouveau mot de passe a été envoyé à : $varemail<br>";
            } else {
                echo "Échec de l'envoi de l'email.<br>";
            }

        } else {
            echo "Adresse email introuvable.<br>";
        }

        // Fermer la connexion
        mysqli_close($connexion);
    } else {
        echo "Erreur de connexion à la base de données.<br>";
    }
}
?>
</html>
