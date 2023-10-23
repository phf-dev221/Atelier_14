<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription et de Connexion</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="header">
        <h1>Création de compte et connexion</h1>
    </div>
    <div class="container">
        <div class="left-container">
            <h2>creer un compte</h2>
            <form id="registration-form" action="traitement/inscription.php" method="post">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirmation du mot de passe</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                </div>
                <button type="submit">S'inscrire</button>
            </form>
        </div>

        <div class="right-container">
            <h2>Connexion</h2>
            <form id="login-form" action="traitement/connexion.php" method="post">
                <div class="form-group">
                    <label for="login-username">Adresse E-mail</label>
                    <input type="email" id="login-username" name="login-username" required>
                </div>
                <div class="form-group">
                    <label for="login-password">Mot de passe</label>
                    <input type="password" id="login-password" name="login-password" required>
                </div>
                <button type="submit">Se connecter</button>
            </form>
        </div>
    </div>
</body>
</html>
