<?php
if ($_GET['quitGroup'] == 1 && $_GET['groupe_id'] && $_GET['idGroupList']) { // quite le groupe






        $ren = $bdd->prepare('DELETE FROM Groupe_Contact_List WHERE id = ?');
        $ren->execute(array($_GET['idGroupList']));

        $ren->closeCursor();
        echo '<meta http-equiv="refresh" content="0;url=index.php"/>';




}
?>