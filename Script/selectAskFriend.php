<?php
$req = $bdd->prepare('SELECT * FROM Account_Contact_List WHERE user_contact = ? AND friend = ?'); // Recherche tout les lignes ou il ya $_SESSION et freind = 1
$req->execute(array($_SESSION['id'], 0));
while ($donnees = $req->fetch()) {
    $rep = $bdd->prepare('SELECT * FROM Account WHERE id = ?');
    $rep->execute(array($donnees["user_id"]));
    $res = $rep->fetch();

    echo '<a href="profil.php?id=' . $res["id"] . '" >' . $res["firstName"] . ' ' . $res["lastName"] . '</a>';
    echo '<a href="makeContact.php?id=' . $res['id'] . '&val=1" title="Accepter l\'invitation"> Valider</a> ';
    echo '<a href="makeContact.php?id=' . $res['id'] . '&val=0" title="Refuser l\'invitation"> Refuser</a> <br/>';

    $rep->closeCursor();


}


$req->closeCursor();
?>