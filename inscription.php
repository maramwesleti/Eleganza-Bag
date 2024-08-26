<?php
    session_start();
    @$nom=$_POST["nom"];
    @$prenom=$_POST["prenom"];
    @$login=$_POST["login"];
    @$pwd=$_POST["pass"];
    @$repass=$_POST["repass"];
    @$valider=$_POST["valider"];
    @$erreur="";
    if(isset($valider))
    {
        if(empty($nom)) $erreur="nom laissé vide !";
        elseif(empty($prenom)) $erreur="prénom laissé vide !";
        elseif(empty($login)) $erreur="login laissé vide !";
        elseif(empty($pwd)) $erreur="mot de passe laissé vide !";
        elseif($pwd!=$repass) $erreur="mots de passe non identiques !";
        else
        {
            include("connexion.php");
            $sql="select id from utilisateurs where login=?";
            $stmt=$con->prepare($sql);
            $stmt->bind_param("s",($login));
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows>0)
                $erreur="login existe déja!";
            else{
                $stmt->close();
                $sql="insert into utilisateurs(nom,prenom,login,pass)values(?,?,?,?)";
          
                $stmt=$con->prepare($sql);
                if($stmt->execute(array($nom,$prenom,$login,$pwd)))
                header("location:codehtml.html");

            }
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>inscription</title>
        <meta charset="utf-8">
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
        </style>
    </head>
    <body>
        <h1>inscription</h1>
        <div class="erreur"><?php echo $erreur ?></div>
        <form name="fo" method="post"action="">
            <input type="text"name="nom"placeholder="nom"value="<?php echo $nom?>"/><br/>
            <input type="text"name="prenom"placeholder="prenom"value="<?php echo $prenom?>"/><br/>
            <input type="text"name="login"placeholder="login"value="<?php echo $login?>"/><br/>
            <input type="password"name="pass"placeholder="mot de passe" /><br/>
            <input type="password"name="repass"placeholder="confirmer mot de passe" /><br/>
            <input type="submit" name="valider" value="s'inscrire" />
        </form>
    </body>
</html>