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
    if(isset($_POST['delete'])){

        foreach($_POST['checkbox'] as $select){
            $ajout = $bdd -> exec("INSERT INTO archive ( archive ) 
            VALUES ('$select')");
            $supp = $bdd -> exec("DELETE FROM todos WHERE faire = '$select'");
    
            // $supp_archiv = $bdd -> exec("DELETE FROM archive WHERE archive = '$select'");
        }
    }
    header('Location: http://localhost/todolist-sql/todolist-sql.php');
?>    