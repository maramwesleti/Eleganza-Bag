<?php
require"connexion.php";

// Récupérer les données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Vérifier les informations de l'administrateur dans la table des administrateurs
// (Assurez-vous de sécuriser votre code contre les injections SQL)
$mysqli="SELECT * FROM admin WHERE login = ? AND pass = ?";
$query = mysqli_prepare($con, $mysqli);
//$query = $mysqli->prepare("SELECT * FROM admin WHERE login = ? AND pass = ?");
$query->bind_param('ss', $username, $password);
$query->execute();
$result = $query->get_result();
$admin = $result->fetch_assoc();

// Vérifier si l'administrateur existe
if ($admin) {
    // L'administrateur existe, redirigez-le vers la page d'administration
    header("Location: adminpage.html");
    exit();
} else {
    // L'administrateur n'existe pas, redirigez-le vers une page normale
    header("Location: loginadmin.php");
    exit();
}

// Fermer la connexion
$query->close();

?>