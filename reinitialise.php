<!DOCTYPE html>
<html>
<link rel="stylesheet" href="styles/reinitialise.css">
<head>
    <title>Réinitialisation de Mot de Passe</title>
</head>

<body>
    <form class="container" action="traitement/traitementreinitialise.php" method="post">
        <h1>Réinitialisation de Mot de Passe</h1>
        <p>Entrez votre adresse e-mail, nouveau mot de passe, et confirmez le nouveau mot de passe pour réinitialiser votre mot de passe.</p>

        <label for="email">Adresse E-mail:</label>
        <input type="text" id="email" name="email" placeholder="Entrez votre adresse e-mail">

        <label for="newPassword">Nouveau Mot de Passe:</label>
        <input type="password" id="newPassword" name="newPassword" placeholder="Entrez votre nouveau mot de passe">

        <label for="confirmPassword">Confirmez le Mot de Passe:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirmez votre nouveau mot de passe">

        <input name="send" value="Réinitialiser le Mot de Passe" type="submit">
    </form>
</body>

</html>
