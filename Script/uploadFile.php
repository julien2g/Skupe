<?php session_start();
include 'bdd.php';


$ext = substr(strrchr($_FILES['icone']['name'],'.'),1);
$nom = md5(uniqid(rand(), true));
$upload = upload('icone', '../file/',  $nom . '.', FALSE);

$nameMessage = '<a href="file/' . $nom . '.' . $ext . '" > '. $_FILES['icone']['name'] . ' </a>';


$now = (new \DateTime())->format('Y-m-d H:i:s');

if ($_GET['id'])
{
    postMessage($bdd, $now, 'id_receiver', 'id', 'Message', $nameMessage);
    echo '<meta http-equiv="refresh" content="0;url=index.php?id="' . $_GET['id'] . '/>'; // redirige
} elseif ($_GET['id_groupe'])
{
    postMessage($bdd, $now, 'id_Groupe', 'id_groupe', 'Messages_Groupe', $nameMessage);
    echo '<meta http-equiv="refresh" content="0;url=index.php?id_groupe="' . $_GET['id_groupe'] . '/>'; // redirige
}
elseif ($_GET['id_Channel'])
{
    postMessage($bdd, $now, 'id_channel', 'id_Channel', 'Messages_Channel', $nameMessage);
    echo '<meta http-equiv="refresh" content="0;url=index.php?id_Channel="' . $_GET['id_Channel'] . '/>'; // redirige
}




function postMessage($bdd,$now, $to , $get, $table, $postMessage)
{



    $insertMessage = $bdd->prepare('INSERT INTO ' . $table . '(id_sent, ' . $to . ', message, moment) VALUES(:id_sent, :' . $to . ', :message, :moment)');
    $insertMessage->execute(array(

        'id_sent' => $_SESSION['id'],
        $to => $_GET[$get],
        'message' => $postMessage,
        'moment' => $now
    ));

    $insertMessage->closeCursor;


}



function upload($icone, $destination, $name, $maxsize, $extensions = FALSE)
{
    if ($_FILES[$icone]['error'] > 0) $erreur = "Erreur lors du transfert";


    $nom = $name;

    //Test2: taille limite
    if ($maxsize !== FALSE AND $_FILES[$icone]['size'] > $maxsize) return FALSE;
    $ext = substr(strrchr($_FILES[$icone]['name'], '.'), 1);
    if ($extensions !== FALSE AND !in_array($ext, $extensions)) {
        echo 'Canceled ! Only ';
        echo print_r($extensions);
        echo ' are allowed !';
        die();
        return FALSE;
    }

    $resultat = move_uploaded_file($_FILES[$icone]['tmp_name'], $destination . $nom . $ext);
    if ($resultat) echo "Changement reussi<br />";
}


?>