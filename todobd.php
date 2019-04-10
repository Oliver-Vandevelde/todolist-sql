<?php
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'user', 'password');
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }

    if(isset($_POST['faire'])){
        
        $faire = htmlspecialchars($_POST['faire']);

        $ajout = $bdd -> exec("INSERT INTO todos ( faire ) 
        VALUES ('$faire')");

    }
    header('Location: http://localhost/todolist-sql/todolist-sql.php');
?>