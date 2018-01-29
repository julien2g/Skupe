<?php

if ($Groupe['creator_id'] == $_SESSION['id'] OR $super_user == true) {



    if ($_GET['up'] == 1 && $_GET['id'] && $_GET['id'] && !$_GET['ban']) {
        $rea = $bdd->prepare('UPDATE Channel_Contact_List SET super_user = :super_user WHERE channel_id = :channel_id AND account_id = :account_id');
        $rea->execute(array(
            'super_user' => 1,
            'channel_id' => $_GET['Channel_id'],
            'account_id' => $_GET['id']
        ));
        $rea->closeCursor();
        echo '<meta http-equiv="refresh" content="0;url=manageChannel.php?Channel_id=' . $_GET['Channel_id'] . '"/>';

    } elseif ($_GET['up'] == 0 && $_GET['id'] && $_GET['id'] && !$_GET['ban']) {
        $rea = $bdd->prepare('UPDATE Channel_Contact_List SET super_user = :super_user WHERE channel_id = :channel_id AND account_id = :account_id');
        $rea->execute(array(
            'super_user' => 0,
            'channel_id' => $_GET['Channel_id'],
            'account_id' => $_GET['id']
        ));
        $rea->closeCursor();

        echo '<meta http-equiv="refresh" content="0;url=manageChannel.php?Channel_id=' . $_GET['Channel_id'] . '"/>';

    }


}?>