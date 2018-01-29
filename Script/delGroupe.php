<?php

if ($_GET['groupe_id'] && $_GET['deleteTheGroup'] == 456) { //Delete le grp


    $ren = $bdd->prepare('DELETE FROM Groupe_Contact_List WHERE groupe_id = ?'); // Suprime la liste des membres
    $ren->execute(array($Groupe['id']));

    $ren->closeCursor();


    $delMessages = $bdd->prepare('DELETE FROM Messages_Groupe WHERE id_Groupe = ?'); // suprime le groupe
    $delMessages->execute(array($Groupe['id']));

    $delMessages->closeCursor();

    $del = $bdd->prepare('DELETE FROM Groupe WHERE id = ?'); // suprime le groupe
    $del->execute(array($Groupe['id']));

    $del->closeCursor();
    echo '<meta http-equiv="refresh" content="0;url=index.php"/>';

}

?>