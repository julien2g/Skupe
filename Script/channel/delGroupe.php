<?php

if ($_GET['Channel_id'] && $_GET['deleteTheGroup'] == 456) { //Delete le grp


    $ren = $bdd->prepare('DELETE FROM Channel_Contact_List WHERE groupe_id = ?'); // Suprime la liste des membres
    $ren->execute(array($Groupe['id']));

    $ren->closeCursor();


    $delMessages = $bdd->prepare('DELETE FROM Messages_Channel WHERE id_Groupe = ?'); // suprime le groupe
    $delMessages->execute(array($Groupe['id']));

    $delMessages->closeCursor();

    $del = $bdd->prepare('DELETE FROM Channel WHERE id = ?'); // suprime le groupe
    $del->execute(array($Groupe['id']));

    $del->closeCursor();
    echo '<meta http-equiv="refresh" content="0;url=index.php"/>';

}

?>