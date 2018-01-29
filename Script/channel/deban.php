<?php

if ($_GET['id'] && $_GET['ban'] == 0 && $_GET['Channel_id'] && $super_user == true) //DEBANIR
{
    $rec = $bdd->prepare('SELECT * FROM Channel_Contact_List WHERE channel_id = ? AND account_id = ?'); // test si la personne  a ban exist
    $rec->execute(array($_GET['Channel_id'], $_GET['id']));
    $ban = $rec->fetch();


    if ($ban) {
        $rea = $bdd->prepare('UPDATE Channel_Contact_List SET allow = :allow WHERE id = :id'); // Update le ligne la connexion a allow 1
        $rea->execute(array(
            'allow' => 1,
            'id' => $ban['id']
        ));
        $rea->closeCursor();
        //echo '<body onLoad="alert(\'Le menbre est débani\')">';
        $rec->closeCursor();

        echo '<meta http-equiv="refresh" content="0;url=manageChannel.php?Channel_id=' . $_GET['Channel_id'] . '"/>';

    }


}
?>