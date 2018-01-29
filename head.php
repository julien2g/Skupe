

 <!DOCTYPE html>
 <html lang="fr">
 <head>
     <meta charset="UTF-8">
     <title>skup</title>
     <link rel="stylesheet" href="+/stylechat.css" />
     <script src="+/editeur.js"></script>

             <link href="+/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
              <link href="+/bootstrap-3.3.7-dist/js/bootstrap.js" rel="stylesheet" type="text/css">



 </head>
 <body>

<?php
$page=$_SERVER['SCRIPT_FILENAME'];
$page=basename($page,".php");

?>












    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="true" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" title="Aller sur la page index">SKUP</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse in" aria-expanded="true" style="">
                <ul class="nav navbar-nav">
                    <li <?php if ($page == 'index') echo 'class="active"'; ?>><a href="index.php" title="Aller sur la page index">Home</a></li>
                    <?php
                    if (isset($_SESSION['id'])) { // Si on est connecter faire afficher mon profil sinon connexion
                    ?>
                        <li <?php if ($page == 'myProfil') echo 'class="active"'; ?> ><a href="myProfil.php" title="Mon profil">Mon profil</a></li>
                        <li <?php if ($page == 'myContacts') echo 'class="active"'; ?> ><a href="myContacts.php" title="Mes contacts">Contacts</a></li>
                        <li <?php if ($page == 'members') echo 'class="active"'; ?> ><a href="members.php" title="Membres">Membres</a></li>
                        <li <?php if ($page == 'channel') echo 'class="active"'; ?> ><a href="channel.php" title="Tous les channel">Channels</a></li>

                       <li><a href="logOut.php" title="Deconnexion">Se deconnecter</a></li>

                       <?php
                    } else {
                    ?>
                        <li <?php if ($page == 'login') echo 'class="active"'; ?>><a href="login.php" title="Connexion">Connexion</a></li>
                        <li <?php if ($page == 'signIn') echo 'class="active"'; ?>><a href="signIn.php" title="Inscription">Inscription</a></li>
                    <?php
                    }
                    ?>


                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <br/>
    <br/>
 <br/>



