<?php session_start();
include '../bdd.php';


$req = $bdd->prepare('INSERT INTO Channel_Contact_List(channel_id, account_id) VALUES(:channel_id, :account_id)');
$req->execute(array(

    'channel_id' => $_GET['id'],
    'account_id' => $_SESSION['id'],

));


$req->closeCursor();

echo '<meta http-equiv="refresh" content="0;url=../../manageChannel.php?Channel_id=' . $_GET['id'] . '"/>';




?>