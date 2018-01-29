<?php session_start();
include "Script/bdd.php";

$id_session = $_SESSION["id"]; //SESSION_ID

$getId = $_GET["id"];


$req = $bdd->prepare('SELECT * FROM Account WHERE id = ?');
$req->execute(array($getId));


$resultat = $req->fetch();
if (!$resultat)// si il n'existe pas, redirection
{

    echo '<body onLoad="alert(\'La personne que vous souhaitez ajouter n éxiste pas\')">';


    echo '<meta http-equiv="refresh" content="1;url=index.php"/>';

    die();
}
$req->closeCursor();

if ($_GET['id'] == $_SESSION['id'])
{
    echo '<body onLoad="alert(\'Vous ne pouvez pas vous ajoutez vous même en ami ...\')">';


    echo '<meta http-equiv="refresh" content="0;url=index.php"/>';

    die();
}




$req = $bdd->prepare('SELECT * FROM Account_Contact_List WHERE (user_id = ? AND user_contact = ?) OR (user_id = ? AND user_contact = ?)');
$req->execute(array($_SESSION['id'], $getId, $getId, $_SESSION['id']));
$donnees = $req->fetch();
if ($donnees) {


    echo '<meta http-equiv="refresh" content="0;url=profil.php?id=' . $_GET["id"] . '"/>';
} else {

    $req = $bdd->prepare('INSERT INTO Account_Contact_List(user_id, user_contact) VALUES(:user_id, :user_contact)');
    $req->execute(array(
        'user_id' => $id_session,
        'user_contact' => $_GET["id"]));
    $req->closeCursor();


echo '<meta http-equiv="refresh" content="0;url=profil.php?id=' . $_GET["id"] . '"/>';

}









?>