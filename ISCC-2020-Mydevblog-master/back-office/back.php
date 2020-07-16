<html>

<head>
    <title>
        MyDevBlog - Administration
    </title>
    <meta charset="utf-8">
</head>

<body>
    <header>
        <nav>
            <?php if ($_GET['page'] == 'connexion') : ?>
                <strong><a style="color:#17c1ff" >Connexion</a></strong>
            <?php else : ?>
                <a href="back.php?page=connexion">Connexion</a>
            <?php endif; ?>
            <?php if ($_GET['page'] == 'ajout-article') : ?>
                <strong><a style="color:#17c1ff" >Ajout article</a></strong>
                    <?php else : ?>
                        <a href="back.php?page=ajout-article">Ajout article</a>
                    <?php endif; ?>
                    <?php if ($_GET['page'] == 'ajout-utilisateur') : ?>
                <strong><a style="color:#17c1ff" >Ajout utilisateur</a></strong>
                    <?php else : ?>
                        <a href="back.php?page=ajout-utilisateur">Ajout utilisateur</a>
                    <?php endif; ?>
                    <?php if ($_GET['page'] == 'utilisateurs') : ?>
                        <strong><a style="color:#17c1ff" >Utilisateurs</a></strong>
                            <?php else : ?>
                                <a href="back.php?page=utilisateurs">Utilisateurs</a>
                            <?php endif; ?>



        </nav>

        <h1>My Dev Blog</h1>
    </header>

    <?php
    if ($_GET['page'] == 'connexion') {
        ?>
        <form action="connexion.php" method="POST">
  <input type="text" placeholder="Nom d'utilisateur" name="login"><br>
  <input type="password" placeholder="Mot de passe" name="password"><br>
 <button type="submit" value="Connexion">Connexion</button>
 </form>
 <?php
        include('connexion.php');
    } elseif ($_GET['page'] == 'ajout-article') {
        ?>
        <form action="ajout-article.php" method="POST">
 <input type="text" placeholder="Titre de l'article" name="nom"/><br>
                <input  type="file" accept="image/x-png,image/jpg,image/jpeg"name="photo"/><br>
                <input type="datetime-local" name="date"/><br>
                <input type="texte" placeholder="Nom de l'auteur" name="auteur"/><br>
                <input type="text" placeholder="Article" name="contenu"/><br>
                <input type="text" placeholder="Extratit de l'article" name="extrait"/><br>
                <button type="submit" value="Envoyer">Publier l'article</button>
        </form>
        <?php
        include('ajout-article.php');
    } elseif ($_GET['page'] == 'ajout-utilisateur') {
        ?>
        <form action="ajout-utilisateur.php" method="POST">
<input type="text" placeholder="Nom d'utilisateur" name="login"><br>
<input type="password" placeholder="Mot de passe" name="password"><br>
<button type="submit" value="Ajout">Ajouter l'utilisateur</button>
  </form>
        <?php
        include('ajout-utilisateur.php');
    }elseif ($_GET['page']=='utilisateurs'){
        include('utilisateurs.php');
    }
    ?>

    <footer>
        </a>
    </footer>
</body>

</html>
