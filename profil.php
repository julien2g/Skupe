<?php session_start();
include 'Script/bdd.php';
include 'head.php' ?>


<?php
$getId = $_GET["id"];
$donID = 0;
////////////////////////////////////////////////////////////////////////////REGLES DE SECURITES/////////////////////////////////////////////////////////////
include 'Script/selectProfil.php';
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>

    <div class="container">
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <h1 align="center"><?php echo $resultat['firstName'] . ' ' . $resultat['lastName'] ?></h1>
            <?php include 'Script/askAddFreind.php'; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <img class="img-thumbnail" src="<?php echo $resultat['imageProfil'] ?>" alt="Image de profil"/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <h4 align="center"><?php echo $resultat['status'] ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <h5 align="center"><?php echo $resultat['email'] ?></h5>
        </div>
    </div>
<?php echo '<div class="row">';
echo '<div class="col-lg-3">';
echo ' <a class="btn btn-danger" href="profil.php?deleteConnexion=1&id=' . $getId . '" title="Suprimer l\' ami ">Suprimer l\'ami </a>';
echo '</div>';
echo '<div class="col-lg-offset-6">';
echo '<a class="btn btn-warning" href="profil.php?block=1&id=' . $getId . '" title"Bloquer l\'ami">Bloquer l\'ami</a> ';
echo '</div>';
echo '</div>';


////////////////////////////////////////////////////UILISATION DES GET/POST/////////////////////////////////////////////////////////////////////////////////////////
if ($_GET['deleteConnexion'] = 1 && $_GET['deleteConnexion'] && $_GET['id'] && $_GET['id'] != null)  //
{
    $ren = $bdd->prepare('DELETE FROM Account_Contact_List WHERE (user_id = ? AND user_contact = ?) OR (user_id = ? AND user_contact = ?)'); // SUPRIME LA LIGNE OU LES 2 USER SONT LIE
    $ren->execute(array($_SESSION['id'], $getId, $getId, $_SESSION['id']));
    echo '<meta http-equiv="refresh" content="0;url=profil.php?id=' . $getId . '"/>';
    $ren->closeCursor();
}

if ($_GET['block'] == 1 && $_GET['id'] && $_GET['id'] != null) // BLOCK
{

    $updateBlock = $bdd->prepare('UPDATE Account_Contact_List SET block = ? WHERE (user_id = ? AND user_contact = ?) OR (user_id = ? AND user_contact = ?) ');
    $updateBlock->execute(array(1, $_SESSION['id'], $getId, $getId, $_SESSION['id']));
    $updateBlock->closeCursor();

    echo '<meta http-equiv="refresh" content="0;url=profil.php?id=' . $getId . '"/>';

}

if ($_POST['surname'] && $_POST['surname'] != null) // RENAME
{

    if ($donnees['user_id'] == $_SESSION['id']) {
        updateSurname('surname_contact', $_POST['surname'], $bdd);
    } elseif ($donnees['user_contact'] == $_SESSION['id']) {
        updateSurname('surname_id', $_POST['surname'], $bdd);
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function updateSurname($colonne, $surname, $bdd)
{
    $updateSurnameId = $bdd->prepare('UPDATE Account_Contact_List SET ' . $colonne . ' = ? WHERE (user_id = ? AND user_contact = ?) OR (user_id = ? AND user_contact = ?) ');
    $updateSurnameId->execute(array($surname, $_SESSION['id'], $_GET['id'], $_GET['id'], $_SESSION['id']));
    $updateSurnameId->closeCursor();
}


?>

<?php include 'Templates/footer.php' ?>