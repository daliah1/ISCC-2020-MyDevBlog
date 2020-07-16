<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="accueil.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="vitrine-articles.php">Articles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="vitrine-contacts.php">Contacts</a>
      </li>
    </ul>
  </div>
        <?php
    session_start();
    if($_GET['page'] == 1){
       echo'<h2>Accueil !</h2>';

    }
    elseif($_GET['page'] ==2){
        echo'<h2>Articles</h2>';
    }
    elseif($_GET['page'] ==3){
        echo'<h2>Contact</h2>';
    }
    session_start();
    ?>
</ul>
</nav>
