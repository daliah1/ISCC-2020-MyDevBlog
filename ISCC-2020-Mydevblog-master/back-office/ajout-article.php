<?php
session_start();
function connect_to_database()
{
  $servername = "127.0.0.1";
  $username = "root";
  $password = "root";
  $databasename = "MyDevBlog";

  try {
    $pdo = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return($pdo);
  } catch (PDOException $e) {
    echo "La connexion a échoué<br>" . $e->getMessage();
  }
}


function ajout_article($pdo)
{
$titre = addslashes($_POST['nom']);
    $photo = addslashes($_POST['photo']);
    $date=addslashes($_POST['date']);
    $auteur=$_SESSION['login'];
    $contenu=addslashes($_POST['contenu']);
    $extrait=addslashes($_POST['extrait']);

    try {

      if (!empty($_POST['nom']) && !empty($_POST['date']) && !empty($_POST['contenu']) && !empty($_POST['extrait'])){

        $sql = "INSERT INTO
            articles(titre,image,datee,auteur,contenu,extrait)
            VALUES('$titre','$photo','$date','$auteur','$contenu','$extrait')";
        $pdo->exec($sql);
        header('Location: back.php?page=ajout-article');
        echo 'Article ajouté';}

    } catch (PDOException $e) {
        echo 'Erreur ajout<br>'.$e->getMessage();
    }
}

$pdo=connect_to_database();
ajout_article($pdo);
?>
