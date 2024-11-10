<?php 

include "_conf.php";

if (isset($_POST['send_connexion'])) {
    // Récupérer les informations de l'utilisateur depuis le formulaire
    $email = $_POST['email']; 
    $password = $_POST['mdp']; 

    // Connexion à la base de données
    $connexion = mysqli_connect($serveurBDD, $userBDD, $mdpBDD, $nomBDD);
    
    if ($connexion) {

        $email = mysqli_real_escape_string($connexion, $email);
        $password = mysqli_real_escape_string($connexion, $password);
        
        // Requête pour insérer l'utilisateur
        $requete = "INSERT INTO user (email, mdp) VALUES ('$email', '$password')";

        if (mysqli_query($connexion, $requete)) {
            echo "Connexion réussie";
        } else {
            echo "Erreur de connexion" . mysqli_error($connexion);
        }

        // Fermer la connexion
        mysqli_close($connexion);
    } else {
        echo 'Erreur de connexion à la base de données';
    }
}
?>
