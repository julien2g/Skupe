<?php
$req = $bdd->prepare('SELECT * FROM Groupe_Contact_List WHERE account_id = ?'); // Recherche tout les lignes ou il ya $_SESSION
$req->execute(array($id_session));
while ($donnees = $req->fetch()) {





    $ren = $bdd->prepare('SELECT * FROM Groupe WHERE id = ?');
    $ren->execute(array($donnees['groupe_id']));
    while ($don = $ren->fetch()) {
        echo '<a href="index.php?id_groupe=' . $don['id'] . '" title="Voir les messages du groupe" > ' . $don['name'] . '</a>';

        if ($_GET['id_groupe'] == $don['id']) {
            echo '<a href="manageGroupe.php?groupe_id=' . $don['id'] . '" title="Voir le groupe"> +</a>';

        }

        echo '<br/>';
    }
    $ren->closeCursor();

}
$req->closeCursor();


?>