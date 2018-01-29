<?php
$selectGroupe = $bdd->prepare('SELECT * FROM Groupe WHERE id = ?');
$selectGroupe->execute(array($_GET['groupe_id']));
$Groupe = $selectGroupe->fetch();

if (!$Groupe) {
    echo '<body onLoad="alert(\'Le groupe que vous souhaitez rechercher n éxiste pas\')">';

    echo '<meta http-equiv="refresh" content="1;url=index.php"/>';
    die();
}
else
{
    $super_user = false; // affecte les droits
    $selectSuperUser = $bdd->prepare('SELECT super_user FROM Groupe_Contact_List WHERE groupe_id = ? AND account_id = ?');
    $selectSuperUser->execute(array($Groupe['id'], $_SESSION['id']));
    $GroupeList = $selectSuperUser->fetch();

    if ($GroupeList['super_user'] ==1) $super_user = true;



    $selectSuperUser->closeCursor();


}
?>