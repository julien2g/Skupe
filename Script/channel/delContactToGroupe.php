<?php

$super_user = false; // affecte les droits
$selectSuperUser = $bdd->prepare('SELECT super_user FROM Channel_Contact_List WHERE channel_id = ? AND account_id = ?');
$selectSuperUser->execute(array($_GET['id_Channel'], $_SESSION['id']));
$GroupeList = $selectSuperUser->fetch();




if ($GroupeList['super_user'] == 1) $super_user = true;

$selectCreatorGroupe = $bdd->prepare('SELECT creator_id FROM Channel WHERE id = ?'); // permet d'identifier le createur pour lui donner les pleins droit
$selectCreatorGroupe->execute(array($_GET['id_Channel']));
$creatorId = $selectCreatorGroupe->fetch();
if ($creatorId['creator_id'] == $_SESSION['id']) $creator = true;


$selectGroupList = $bdd->prepare('SELECT * FROM Channel_Contact_List WHERE channel_id = ?'); // cherches ts les membres
$selectGroupList->execute(array($_GET['id_Channel']));
while ($GroupeList = $selectGroupList->fetch()) {

    if ($super_user == true) {
        $selectAccount = $bdd->prepare('SELECT * FROM Account WHERE id = ?');
        $selectAccount->execute(array($GroupeList['account_id']));
        $account = $selectAccount->fetch();
        // echo $account['firstName'] . ' ' . $account['lastName'];


        if ($GroupeList['super_user'] == 0) {
            echo '<label class="checkbox col-lg-6">
                                        <input class="form-control" type="checkbox" name="' . $account['id'] . '" id="' . $account['id'] . '" value="' . $account['id'] . '"><img  class="img-thumbnail" width="15%" src="' . $account['imageProfil'] . '" alt="Image de profil" >   ' . $account['firstName'] . ' ' . $account['lastName'] . '</label> 
        
                                         </label>';

        } elseif($creator == true ) {
            echo '<label class="checkbox col-lg-6">
                                        <input class="form-control" type="checkbox" name="' . $account['id'] . '" id="' . $account['id'] . '" value="' . $account['id'] . '"><img  class="img-thumbnail" width="15%" src="' . $account['imageProfil'] . '" alt="Image de profil" >   ' . $account['firstName'] . ' ' . $account['lastName'] . '</label> 
        
                                         </label>';
        }
        array_push($listFriend, $account['id']);

        $selectAccount->closeCursor();

    } else {
        echo '<script>alert("Vous n\'avez pas accès à cette page")</script> ';
        echo '<meta http-equiv="refresh" content="0;url=index.php"/>';
        die();

    }
}
$selectSuperUser->closeCursor();
$selectCreatorGroupe->closeCursor();
$selectGroupList->closeCursor();
foreach ($listFriend as $f) {

    if ($_POST[$f]) {
        $delGoupeList = $bdd->exec('DELETE FROM Channel_Contact_List WHERE channel_id = ' . $_GET['id_Channel'] . ' AND account_id = ' . $_POST[$f]);

        echo '<meta http-equiv="refresh" content="0;url=manageChannel.php?Channel_id=' . $_GET['id_Channel'] . '"/>';
        $delGoupeList->closeCursor();
    }





}
?>