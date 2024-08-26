<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Page de Connexion</title>
  <style>
body {
  font-family: 'Helvetica', sans-serif;
  margin: 0 ;
  padding: 0 ;
  background-color: #f8f8f8 ;
}
.login-container {
  width: 300px ;
  margin: 100px auto ;
  background-color: #fff ;
  padding: 20px ;
  border-radius: 10px ;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1) ;
}
h2
{
  text-align: center ;
  color: #333 ;
  font-family: 'Playfair Display' , serif ;
}
form
{
  display: flex ;
  flex-direction: column ;
}
label
{
  margin-bottom: 8px;
  color: #555;
  font-size: 14px;
}
input {
  padding: 12px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 6px ;
  font-size: 14px ;
}
button {
  padding: 12px ;
  background-color: #d35400 ;
  color: #fff ;
  border: none ;
  border-radius: 6px ;
  cursor: pointer ;
  font-size: 16px ;
  font-weight: bold ;
}
button:hover
{
  background-color: #e67e22 ; 
}
</style>
</head>
<body>
  <div class="login-container">
  <h2>Connexion Administrateur</h2>
    <form action="verifadmin.php" method="post">
      <label for="username">Nom d'utilisateur:</label>
      <input type="text" id="username" name="username" required>
      <label for="password">Mot de passe:</label>
      <input type="password" id="password" name="password" required>
      <button type="submit">Se Connecter</button>
    </form>
  </div>
</body>
</html>