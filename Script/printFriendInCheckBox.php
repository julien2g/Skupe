<?php


$selectContactList = $bdd->prepare('SELECT * FROM Account_Contact_List WHERE (user_id = ? OR user_contact = ?) AND friend = ?'); // Recherche tout les lignes ou il ya $_SESSION et freind = 1
$selectContactList->execute(array($_SESSION['id'], $_SESSION['id'], 1));
while ($contactList = $selectContactList->fetch()) {


    if ($contactList['user_id'] == $_SESSION['id']) // test si l'id session est ds la colonne user_id
    {
        $friend = $bdd->query('SELECT * FROM Account WHERE id =' . $contactList['user_contact']); // Si oui faire une recherche avec l'id user_contact ds la table Account
        $don = $friend->fetch();
        //echo $don['firstName'];

        echo '<label class="checkbox">
 

        <input class="form-control" type="checkbox" name="' . $don['id'] . '" id="' . $don['id'] . '" value="' . $don['id'] . '"><img  class="img-thumbnail" width="10%" src="' . $don['imageProfil'] . '" alt="Image de profil" >   ' . $don['firstName'] . ' ' . $don['lastName'] . '</label> ';
        //echo  $don['id'];
        array_push($listFriend, $don['id']);
        $friend->closeCursor();

    } elseif ($contactList['user_contact'] == $_SESSION['id']) {
        $friend = $bdd->query('SELECT * FROM Account WHERE id =' . $contactList['user_id']); // sinon faire une recherche avec l'user_id ds la table Account
        $don = $friend->fetch();
        //echo $don['firstName'];

        echo '<label class="checkbox">
 

        <input class="form-control" type="checkbox" name="' . $don['id'] . '" id="' . $don['id'] . '" value="' . $don['id'] . '"><img  class="img-thumbnail" width="10%" src="' . $don['imageProfil'] . '" alt="Image de profil" >   ' . $don['firstName'] . ' ' . $don['lastName'] . '</label> ';
        //echo  $don['id'];
        array_push($listFriend, $don['id']);
        $friend->closeCursor();

    }
    else
    {
        echo 'Erreur';
    }
}
$selectContactList->closeCursor();
?>




