<?php
    session_start();
    require"connexion.php";
          
if (isset($_POST['login']) && isset($_POST['pass'])) {
    $login = $_POST['login'];
    $motdepasse = $_POST['pass'];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM utilisateurs WHERE login = ? AND pass = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $login, $motdepasse);
        mysqli_stmt_execute($stmt);

        // Check for a valid user
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            // Valid user, redirect to codehtml.php
            header('Location: codehtml.html');
        
        } else {
            // Invalid user, redirect to loginuser.php
            header('Location: loginuser.php');
            
        }

        mysqli_stmt_close($stmt );
                    
        }
    }   
?>   
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
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
            
            .erreur
            {
                color:#cc0000;
                margin-bottom:10px;
            }
             a {
            position: absolute;
            top: 10px;
            right: 10px;
            text-decoration: none;
            color: #3498db;
            font-size: 16px;
            }
            
            a:hover{
                text-decoration:underline;

            }
        </style>
        <title>login user</title>
    </head>
    <body onLoad="document.fo.login.focus()">
        <h1>Authentification </h1> <a href="inscription.php">créer un compte</a>
        <!-- <div class="erreur"><?php echo $erreur ?></div> -->
        <form name="fo" method="post" action="">
            <input type="text" name="login"placeholder="login" /><br />
            <input type="password" name="pass"placeholder="mot de passe" /><br />
            <input type="submit" name="valider" value="valider" />
        </form>


    </body>
</html>