<?php
require "connexion.php";
if(!empty($_POST['nom']) && !empty($_POST['prix'])&& !empty($_POST['description']) && !empty($_POST['image']))
{
    $n=$_POST['nom'];
    $p=$_POST['prix'];
    $d=$_POST['description'];
    $i=$_POST['image'];
    $sql = "INSERT INTO produits (nom, image, prix, description) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssds", $n, $i, $p, $d);
        mysqli_stmt_execute($stmt);

        echo 'Données ajoutées avec succès.';
        mysqli_stmt_close($stmt);
    } else {
        die('Erreur SQL: ' . mysqli_error($con));
    }

    mysqli_close($con);
}


?>

<head>
    <style>
    body {
    margin: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f4f4f4;
    text-align: center;
}

.container {
    max-width: 300px;
    margin: 20px;
    background-color: #ffffff;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}

h2 {
    color: #343a40;
    text-align: center;
    margin-top: 0;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

label {
    margin-bottom: 8px;
    color: #495057;
    font-size: 16px;
}

input,
textarea {
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ced4da;
    border-radius: 6px;
    font-size: 16px;
    box-sizing: border-box;
    width: 100%; /* Ajout d'une largeur à 100% pour s'adapter au conteneur */
}

input[type="submit"] {
    background-color: #d35400;
    color: #fff;
    cursor: pointer;
    border: none;
    border-radius: 6px;
    padding: 10px;
    font-weight: bold;
    width: 100%; /* Ajout d'une largeur à 100% pour s'adapter au conteneur */
}

input[type="submit"]:hover {
    background-color: #e67e22;
}

.error-message,
.success-message {
    color: #28a745;
    margin-bottom: 10px;
}

.error-message {
    color: #cc0000;
}

* {
    font-family: 'Arial', Helvetica, sans-serif;
}

input {
    border: solid 1px #2222AA;
    margin-bottom: 5px;
    padding: 8px;
    outline: none;
    border-radius: 6px;
    width: 100%; /* Ajout d'une largeur à 100% pour s'adapter au conteneur */
}

    </style>
</head>
<h2>Ajouter un Produit</h2>
<form action="ajoutproduit.php" method="post">
<label for="nom">nom du produit</label><br>
<input type="text" name="nom" placeholder="nom du produit" id="nom" required=""><br><br>
<label for="prix">prix</label><br>
<input type="text" name="prix" placeholder="prix" id="prix" required=""><br><br>
<label for="description">description</label><br>
<textarea id="description" name="description" required></textarea><br><br>
<label for="image">image</label><br>
<input type="file" id="image" name="image"  required><br><br>
<input type="submit"><br><br>
</form>