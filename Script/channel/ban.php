<?php
if ($_GET['id'] && $_GET['ban'] == 1 && $_GET['Channel_id'] && !$_GET['up'] && $super_user == true && $_POST['banRaison']) // BANIR
{

    $rec = $bdd->prepare('SELECT * FROM Channel_Contact_List WHERE channel_id = ? AND account_id = ?'); // test si la personne  a ban exist
    $rec->execute(array($_GET['Channel_id'], $_GET['id']));
    $ban = $rec->fetch();


    if ($ban) {
        $rea = $bdd->prepare('UPDATE Channel_Contact_List SET allow = :allow, banRaison = :banRaison WHERE id = :id'); // Update le ligne la connexion a allow 0
        $rea->execute(array(
            'allow' => 0,
            'banRaison' => $_POST['banRaison'],
            'id' => $ban['id']
        ));
        $rea->closeCursor();
        $rec->closeCursor();
        //echo '<body onLoad="alert(\'Le menbre est bani\')">';
        echo '<meta http-equiv="refresh" content="0;url=manageChannel.php?Channel_id=' . $_GET['Channel_id'] . '"/>';

    }
    $req->closeCursor();
    $ren->closeCursor();
}
?>