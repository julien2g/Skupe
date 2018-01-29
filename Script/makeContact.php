<?php session_start();


if ($_GET['id'] && ($_GET['val'] == 0 OR $_GET['val'] == 1) && !$_GET['deblock']) {
    $req = $bdd->prepare('SELECT * FROM Account_Contact_List WHERE user_id = ? AND user_contact = ?'); // Recupere la ligne
    $req->execute(array($_GET['id'], $_SESSION['id']));


    $resultat = $req->fetch();
    if (!$resultat)// si il n'existe pas, redirection
    {

        echo '<body onLoad="alert(\'La personne que vous souhaitez ajouter n éxiste pas\')">';


        echo '<meta http-equiv="refresh" content="1;url=index.php"/>'; // redirige

        die();
    }

    if ($_GET['val'] == 1) // si Accepter
    {
        $rea = $bdd->prepare('UPDATE Account_Contact_List SET friend = :friend WHERE id = :id'); // Update le ligne ou les 2 contacts, change la colonne friend
        $rea->execute(array(
            'friend' => 1,
            'id' => $resultat['id']
        ));
        $rea->closeCursor();
        echo '<meta http-equiv="refresh" content="0;url=index.php"/>'; // redirige

    }

    if ($_GET['val'] == 0) {
        //echo 'pas fait';
        $delAccountList = $bdd->exec('DELETE FROM Account_Contact_List WHERE id =' . $resultat['id']);
        //$rea->execute(array($resultat['id']));

        //echo 'fait';

        //$delAccountList->closeCursor();
        echo '<meta http-equiv="refresh" content="0;url=index.php"/>'; // redirige
    }


    $req->closeCursor();


}


?>