<?php

if ($Groupe['creator_id'] == $_SESSION['id'] OR $super_user == true) {

    if ($_GET['up'] == 1 && $_GET['id'] && $_GET['id'] && !$_GET['ban']) {
        $rea = $bdd->prepare('UPDATE Groupe_Contact_List SET super_user = :super_user WHERE groupe_id = :groupe_id AND account_id = :account_id');
        $rea->execute(array(
            'super_user' => 1,
            'groupe_id' => $_GET['groupe_id'],
            'account_id' => $_GET['id']
        ));
        $rea->closeCursor();
        echo '<meta http-equiv="refresh" content="0;url=manageGroupe.php?groupe_id=' . $_GET['groupe_id'] . '"/>';
    } elseif ($_GET['up'] == 0 && $_GET['id'] && $_GET['id'] && !$_GET['ban']) {
        $rea = $bdd->prepare('UPDATE Groupe_Contact_List SET super_user = :super_user WHERE groupe_id = :groupe_id AND account_id = :account_id');
        $rea->execute(array(
            'super_user' => 0,
            'groupe_id' => $_GET['groupe_id'],
            'account_id' => $_GET['id']
        ));
        $rea->closeCursor();

        echo '<meta http-equiv="refresh" content="0;url=manageGroupe.php?groupe_id=' . $_GET['groupe_id'] . '"/>';

    }

}?>