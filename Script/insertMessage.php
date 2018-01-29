<?php

$now = (new \DateTime())->format('Y-m-d H:i:s');

if ($_POST['message'] && $_POST['message'] != null && $_GET['id'])
{
    postMessage($bdd, $now, 'id_receiver', 'id', 'Message', $_POST['message']);
} elseif ($_POST['message'] && $_POST['message'] != null && $_GET['id_groupe'])
{
    postMessage($bdd, $now, 'id_Groupe', 'id_groupe', 'Messages_Groupe', $_POST['message']);
}
elseif ($_POST['message'] && $_POST['message'] != null && $_GET['id_Channel'])
{
    postMessage($bdd, $now, 'id_channel', 'id_Channel', 'Messages_Channel', $_POST['message']);
}




function postMessage($bdd,$now, $to , $get, $table, $postMessage)
{

    $texte_avec_lien = preg_replace('#(?:https?|ftp)://[\w%?=,:;&+\#@./-]+#', '<a href="$0">$0</a>', $postMessage);
    // Et sans protocole :
    $texte_avec_lien = preg_replace('#www.[\w%?=,:;&+\#@./-]+#', '<a href="http://$0">$0</a>', $postMessage);

    $insertMessage = $bdd->prepare('INSERT INTO ' . $table . '(id_sent, ' . $to . ', message, moment) VALUES(:id_sent, :' . $to . ', :message, :moment)');
    $insertMessage->execute(array(

        'id_sent' => $_SESSION['id'],
        $to => $_GET[$get],
        'message' => $texte_avec_lien,
        'moment' => $now
    ));
    echo '<meta http-equiv="refresh" content="0;url=index.php?' . $get . '=' . $_GET[$get] . '"/>';

    $insertMessage->closeCursor;

}
?>