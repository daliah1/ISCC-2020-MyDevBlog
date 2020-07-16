<?php
function connect_to_database()
{
    $servername = "127.0.0.1";
    $username = "root";
    $password = "root";
    $databasename = "MyDevBlog";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Vous êtes connectés <br>";
        return ($pdo);
    } catch (PDOException $e) {
        echo "La connexion a échoué" . $e->getMessage();
    }
}


function ajout_utilisateur($pdo)
{

    $login = $_POST['login'];
    $password = $_POST['password'];
    try {
        $sql = "INSERT INTO
            utilisateurs (loginn,mdp)
            VALUES('$login','$password')";
        $pdo->exec($sql);
        echo 'Utilisateur ajouté';
    } catch (PDOException $e) {
        echo "La connexion a échoué" . $e->getMessage();
    }
}

$pdo = connect_to_database();
ajout_utilisateur($pdo);
?>
