<?php session_start(); ?>
<?php include 'Script/bdd.php';
include 'head.php';


?>


    <div class="container border">

        <div class="row">
            <?php echo '<div class="col-lg-offset-9 col-lg-3">';
            include 'Script/Block.php';
            echo '</div>';

            ?>
            <div class="col-lg-offset-3  col-lg-6">


                <?php


                echo '<img class="img-thumbnail" src="' . $_SESSION['imageProfil'] . '" alt="Image de profil" />';
                echo '
                <form method="post" action="#" enctype="multipart/form-data">
                    <label for="icone">Image de profil( JPG, PNG ou GIF ) : </label><br />
                    <input class="form-control" type="file" name="icone" id="icone" /><br />
                    <input class="form-control" type="submit" name="submit" value="Envoyer" />
                </form>';
                ?>
            </div>
        </div>
            <br/>
            <br/>
            <br/>


            <div class="col-lg-offset-3 col-lg-6 ">
                <form method="post" action="#">
                    <div class="form-group">
                        <input class="form-control" type="text" name="firstName"
                               value="<?php echo $_SESSION["firstName"] ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="lastName"
                               value="<?php echo $_SESSION["lastName"] ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" value="<?php echo $_SESSION["email"] ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="passwd" value="<?php echo $_SESSION["passwd"] ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="submit" value="Modifier mes informations">
                    </div>
                </form>

            </div>

    </div>

<?php
if ($_FILES['icone']['name']) {
    include 'Script/updateImageProfil.php';
}


if ($_POST['firstName'] AND $_POST['lastName'] AND $_POST['email'] AND $_POST['passwd'] AND $_POST['firstName'] != null AND $_POST['lastName'] != null AND $_POST['email'] != null AND $_POST['passwd'] != null) {
    include 'Script/uptadeAccount.php';
}


if ($_GET['id'] && $_GET['id'] != null && $_GET['deblock'] && $_GET['deblock'] == 1) {

    include 'Script/deblock.php';
}


?>


    </body>


<?php/*
function upload($icone, $destination, $name, $extensions = FALSE)
{
    if ($_FILES[$icone]['error'] > 0) $erreur = "Erreur lors du transfert";


    $nom = $name;


    $ext = substr(strrchr($_FILES[$icone]['name'], '.'), 1);
    if ($extensions !== FALSE AND !in_array($ext, $extensions)) {
        echo 'Canceled ! Only ';
        echo print_r($extensions);
        echo ' are allowed !';
        die();
        return FALSE;
    }

    $resultat = move_uploaded_file($_FILES[$icone]['tmp_name'], $destination . $nom);
    if ($resultat) echo "Changement d'image reussi<br />";
}

*/
?>