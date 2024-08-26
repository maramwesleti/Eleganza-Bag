<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <style>
         *{
                font-family:Arial, Helvetica, sans-serif;
            }
         body{
                margin:50px;
                align-items: center;
                justify-content: center;
                background-color: #f4f4f4;
                text-align: center;
            }
            input{
                border:solid 1px #2222AA;
                margin-bottom:10px;
                padding:20px;
                outline:none;
                border-radius:6px;
            }
    </style>
</head>
<body>

<form name="f" action="supprimerproduit.php" method="post">
    <h2>supprimer un produit </h2>
    ID de produit  <input type="number" name="id_inter"><br>
    <input type="submit" value="valider">
    <input type="reset" value="annuler">
</form>
<?php
require "connexion.php";
if (isset($_POST['id_inter'])) {
$i=$_POST['id_inter'];
$sql0="SELECT id FROM produits where id='$i' ";
$req0=mysqli_query($con,$sql0) or die ('erreur sql' .mysqli_error($con));
$n=mysqli_num_rows($req0);
if($n>0)
{
    $sql=" DELETE FROM produits WHERE id='$i' ";
    $req= mysqli_query($con,$sql) or die('erreur sql'.mysqli_error($con));
    mysqli_close($con);
    echo" nous venons de supprimer l'internaute numero $i de notre base ";

}
}
?>
</body>
</html>