<?php
$req = $bdd->prepare('SELECT * FROM Account_Contact_List WHERE user_contact = ? AND friend = ?'); // Recherche tout les lignes ou il ya $_SESSION et freind = 1
$req->execute(array($_SESSION['id'], 0));
while ($donnees = $req->fetch()) {
    $rep = $bdd->prepare('SELECT * FROM Account WHERE id = ?');
    $rep->execute(array($donnees["user_id"]));
    $res = $rep->fetch();
    if ($res)
    {
        $askFriend = True;
    }
}


$req->closeCursor();
?>