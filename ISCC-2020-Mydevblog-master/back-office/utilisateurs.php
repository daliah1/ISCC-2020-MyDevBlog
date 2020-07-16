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

function afficher_utilisateurs($pdo){
  $utilisateurs=$pdo->query("SELECT * FROM utilisateurs")->fetchAll();

  echo'<ul>';
  foreach($utilisateurs as $utilisateur){

      echo '<li><strong> Login: </strong>'.$utilisateur['loginn'].'. <strong>Mot de passe: </strong>'.$utilisateur['mdp'].
      '<br>'
      ?>
      <form method="post" action="supprimer_utilisateur.php?id=<?php echo $utilisateur['id']?>">
      <button type="submit" name="boutton_supprimer">Supprimer utilisateur</button>
      </form>
      </li>

<?php
}
  echo'</ul>';

}


$pdo=connect_to_database();
afficher_utilisateurs($pdo);
?>
