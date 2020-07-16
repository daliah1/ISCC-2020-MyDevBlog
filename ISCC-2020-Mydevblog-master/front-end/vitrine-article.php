<head>
    <title>Summer Code</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include("header.php"); ?>
</head>

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
;
    return($pdo);

  } catch (PDOException $e) {
    echo "La connexion a échoué" . $e->getMessage();
  }
}

function afficher_article_entier($pdo){

    $number_article=$_GET['id'];

    $articles=$pdo->query("SELECT *
    FROM articles
    WHERE id='$number_article'")->fetchAll();


    echo '<h3>'.$articles[0]['titre'].'</h3>';
    echo '<p>'.$articles[0]['contenu'].'</p>';
    echo '<div class="extrait"><p>'.$article['datee'].'</p></div>';
      echo '<div class="extrait"><p>'.$article['auteur'].'</p></div>';

}
$pdo=connect_to_database();
afficher_article_entier($pdo);

?>


<footer class="page-footer font-small blue pt-4">
  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col-md-3 mt-md-0 mt-3">
        <h5 class="text-uppercase"></h5>
        <a href="http://epitech.eu/" target="_BLANK">
        <img src="../IMG/epitech-logo.jpg" width="100" class="img">
        </a>
      </div>
      <div class="col-md-3 mt-md-0 mt-3">
        <h5 class="text-uppercase"></h5>
          <a href="http://iseg.fr/" target="_BLANK">
          <img src="../IMG/logo-iseg.png" width="100" class="img">
        </a>
      </div>
      <hr class="clearfix w-100 d-md-none pb-3">
      <div class="col-md-3 mb-md-0 mb-3">
        <ul class="list-unstyled">
          <li>
           <a href="https://github.com/daliah1">
             <img src="https://img.icons8.com/ios/50/000000/github.png"/>
           </a>
          </li>
          <li>
          <a href="https://www.linkedin.com/in/dalia-haddad-86ab86197/">
            <img src="https://img.icons8.com/ios/50/000000/linkedin.png"/>
          </a>
          </li>
        </ul>
      </div>
      <div class="col-md-3 mb-md-0 mb-3">
        <h5 class="text-uppercase">Admin</h5>

        <ul class="list-unstyled">
          <li>
            <a href="../back-office/back.php">Espace administration</a>
            <br>
            <?php
            if ($_GET['page']==4){
                echo'<h3>Espace administration<h3>';
            }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
