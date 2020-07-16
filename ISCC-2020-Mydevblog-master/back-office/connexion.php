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
    return($pdo);
  } catch (PDOException $e) {
    echo "La connexion a échoué" . $e->getMessage();
  }
}

function login_form($pdo)
{
  try {
    if (!empty($_POST['login']) && !empty($_POST['password'])) {


      $login = $_POST['login'];
      $password = $_POST['password'];

      $requete=$pdo->query("SELECT loginn
      FROM utilisateurs ");
    $res=$requete->fetchAll();


      if ($res) {


        if ($login == $res[0]['loginn']) {
          echo "Connexion au compte déjà existant";
          $sql = "UPDATE utilisateurs
          SET mdp='$password'
          WHERE loginn='$login'";
          $pdo->exec($sql);
          echo 'Mot de passe mis à jour.';
        } else {

            $sql = "INSERT INTO
            utilisateurs (loginn,mdp)
            VALUES('$login','$password',' ')";
                    $pdo->exec($sql);
                    echo 'Entrée ajoutée dans la table';
        }
      } else {
        echo "Le nouvel utilisateur n'a pas pu être ajouté.";
        echo '<a href="back.php?page=connexion">Connexion</a>';
      }
    }
  } catch (PDOException $e) {
    echo "Login erreur" . $e->getMessage();
  }
}
$pdo=connect_to_database();
login_form($pdo);
?>
