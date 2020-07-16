<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="Style/vitrine.css"/>
    </head>
    <?php include("header.php"); ?>

    <body>
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
}?>
<ul>
<?php
function articles($pdo){

    $articles=$pdo->query("SELECT * FROM articles")->fetchAll();


    foreach ($articles as $article){
        echo '<h3><li>'.$article['titre'].'</li></h3>';
       echo '<p>'.$article['extrait'].'</p>';
       echo '<div class="extrait"><p>'.$article['contenu'].'</p></div>';
       echo '<div class="extrait"><p>'.$article['date'].'</p></div>';
         echo '<div class="extrait"><p>'.$article['auteur'].'</p></div>';

       $number_article=$article['id'];
       ?>

       <a href="vitrine-article.php?page=article&id=<?php echo $number_article?>">Lire l'article en entier</a>
       <?php
    }
    }
$pdo=connect_to_database();
articles($pdo);
    ?>

</ul>

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
    </body>
</html>
