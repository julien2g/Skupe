<?php
$req = $bdd->prepare('SELECT * FROM Channel_Contact_List WHERE account_id = ?'); // Recherche tout les lignes ou il ya $_SESSION
$req->execute(array($_SESSION['id']));
while ($donnees = $req->fetch()) {



    $ren = $bdd->prepare('SELECT * FROM Channel WHERE id = ?');
    $ren->execute(array($donnees['channel_id']));
    while ($don = $ren->fetch()) {
        echo '<a href="index.php?id_Channel=' . $don['id'] . '" title="Voir les messages du Channel" > ' . $don['name'] . '</a>';

        if ($_GET['id_Channel'] == $don['id']) {
            echo '<a href="manageChannel.php?Channel_id=' . $don['id'] . '" title="Voir le Channel"> +</a>';

        }

        echo '<br/>';
    }
    $ren->closeCursor();

}
$req->closeCursor();


?>