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

function supprimer_utilisateur($pdo){
$id_utilisateur=$_GET['id'];
     $_POST['boutton_supprimer']= $sql = "DELETE FROM utilisateurs
WHERE id='$id_utilisateur'";
        $sth=$pdo->prepare($sql);
        $sth->execute();
        echo 'Effacement exécuté';
    }

    $pdo=connect_to_database();
    supprimer_utilisateur($pdo);
?>
