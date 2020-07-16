<!DOCTYPE html>
<html>
<head>
    <title>Summer Code</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include("header.php"); ?>

</head>
<body>
  <div class="jumbotron">
  <h1 class="display-4">Welcome to Dalia's Dev Blog!</h1>
  <p class="lead">Bienvenue sur mon Dev Blog! le Summer Code Camp touche à sa fin et pour cloturer cette aventure inédite voici le projet que je propose, n'hésitez pas à me faire part de vos remarques!</p>
  <hr class="my-4">
  <p>Vous trouverez les liens des deux écoles qui nous ont aidé à le réaliser.</p>
</div>
<p>
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

        return($pdo);

      } catch (PDOException $e) {
        echo "La connexion a échoué" . $e->getMessage();
      }
    }
?>
<ul>
    <?php
    function recup_5_articles($pdo){

    $articles=$pdo->query("SELECT *
    FROM articles
    ORDER BY id DESC
    LIMIT 5
    ")->fetchAll();

    foreach ($articles as $article){
        echo '<h4><li>'.$article['titre'].'</li></h4>';
       echo '<div class="extrait"><p>'.$article['extrait'].'</p></div>';
        echo '<div class="extrait"><p>'.$article['contenu'].'</p></div>';
        echo '<div class="extrait"><p>'.$article['datee'].'</p></div>';
          echo '<div class="extrait"><p>'.$article['au'].'</p></div>';
       $number_article=$article['id'];
       ?>

       <div class="a_lien_article"><a href="vitrine-article.php?page=article&id=<?php echo $number_article?>">Consulter l'article</a>
       </div><?php
    }
    }

    $pdo = connect_to_database();
    recup_5_articles($pdo);
    ?></ul>
</p>

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
</html>
