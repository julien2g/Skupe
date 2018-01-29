<?php
$selectGroupe = $bdd->prepare('SELECT * FROM Channel WHERE id = ?');
$selectGroupe->execute(array($_GET['Channel_id']));
$Groupe = $selectGroupe->fetch();

if (!$Groupe) {
    echo '<body onLoad="alert(\'Le Channel que vous souhaitez rechercher n éxiste pas\')">';

    echo '<meta http-equiv="refresh" content="1;url=index.php"/>';
    die();
}
else
{
    $super_user = false; // affecte les droits
    $selectSuperUser = $bdd->prepare('SELECT super_user FROM Channel_Contact_List WHERE channel_id = ? AND account_id = ?');
    $selectSuperUser->execute(array($Groupe['id'], $_SESSION['id']));
    $GroupeList = $selectSuperUser->fetch();

    if ($GroupeList['super_user'] ==1) $super_user = true;


//echo $super_user;
    $selectSuperUser->closeCursor();


}
?>