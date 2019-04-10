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

    $resultat = $bdd -> query('SELECT * FROM todos');
    $archive = $bdd -> query('SELECT * FROM archive');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Todolist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./assets/css/todo.css">
<body>
    <section class="todo">
        <form class="archiver" method="POST" action="http://localhost/todolist-sql/archivebd.php"">
            <h1>Todolist d'Oliver</h1>
            <h2>A faire :</h2>
            <section class="a_faire">
                <?php
                    while ($donnees = $resultat -> fetch())
                        {
                        echo "<p><input name='checkbox[]' type='checkbox' value='".$donnees['faire']."'/> ".$donnees['faire']."</p>";
                        }
                    $resultat->closeCursor();
                ?>
            </section>
            <input name="delete" type="submit" value="Fini !">
            <h2>Archive :</h2>
            <section class="fait">
                <?php
                    while ($donnees = $archive -> fetch()){
                    echo "<p class='valide'><input name='checkbox[]' type='checkbox' value='".$donnees['archive']."' checked='checked' disabled='disabled'/> ".$donnees['archive']."</p>";
                    }
                    $archive->closeCursor();
                ?>
            </section>
        </form>
        <form class="add" method="POST" action="http://localhost/todolist-sql/todobd.php">
            <p>Ajouter tache : </p>
            <textarea type="text" name="faire" cols="30" rows="2" required></textarea>
            <p><input type="submit" value="Ajouter"></p>
        </form>
    </section>
</body>
</html>