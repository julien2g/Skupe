<?php
/**
 * Created by PhpStorm.
 * User: juliengadea
 * Date: 11/04/2017
 * Time: 16:52
 */ if ($_POST['status']) {
    $rea = $bdd->prepare('UPDATE Account SET status = :status WHERE id = :id');
    $rea->execute(array(
        'status' => $_POST['status'],
        'id' => $_SESSION['id']
    ));
    $rea->closeCursor();
    echo '<meta http-equiv="refresh" content="0;url=index.php"/>';
}
?>