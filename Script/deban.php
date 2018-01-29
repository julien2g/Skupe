<?php

if ($_GET['id'] && $_GET['ban'] == 0 && $_GET['groupe_id'] && $super_user == true) //DEBANIR
{
    $rec = $bdd->prepare('SELECT * FROM Groupe_Contact_List WHERE groupe_id = ? AND account_id = ?'); // test si la personne  a ban exist
    $rec->execute(array($_GET['groupe_id'], $_GET['id']));
    $ban = $rec->fetch();


    if ($ban) {
        $rea = $bdd->prepare('UPDATE Groupe_Contact_List SET allow = :allow WHERE id = :id'); // Update le ligne la connexion a allow 1
        $rea->execute(array(
            'allow' => 1,
            'id' => $ban['id']
        ));
        $rea->closeCursor();
        //echo '<body onLoad="alert(\'Le menbre est débani\')">';
        $rec->closeCursor();

        echo '<meta http-equiv="refresh" content="0;url=manageGroupe.php?groupe_id=' . $_GET['groupe_id'] . '"/>';

    }


}
?>