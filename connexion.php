<?php
$hostname="127.0.0.1";
$username="root";
$password="";
$basename="bags";
$con = mysqli_connect($hostname,$username,$password,$basename);
if(mysqli_connect_errno())
{
    echo "impossible de se connecter a MYSQL :" . mysqli_connect_error();

}
/*else 
{
    echo "connexion réussite";
}*/
?>