<?php
if ($_GET['id'] && $_GET['id'] != null && $_GET['deblock'] && $_GET['deblock'] == 1) {


    $updateBlock = $bdd->prepare('UPDATE Account_Contact_List SET block = ? WHERE (user_id = ? AND user_contact = ?) OR (user_id = ? AND user_contact = ?) ');
    $updateBlock->execute(array(0, $_SESSION['id'], $_GET['id'], $_GET['id'], $_SESSION['id']));
    $updateBlock->closeCursor();
    echo '<meta http-equiv="refresh" content="0;url=myProfil.php"/>'; // redirige
}
?>