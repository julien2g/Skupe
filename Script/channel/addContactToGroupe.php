<?php

function ifContactIsInGroup($bdd, $accountList)
{
    $listFriend = array();
    $Account = $bdd->query('SELECT * FROM Account WHERE id =' . $accountList); // Si oui faire une recherche avec l'id user_contact ds la table Account
    $account = $Account->fetch();


//////////////////////////////////////////////////////////////////

    $selectGroupeList = $bdd->prepare('SELECT * FROM Channel_Contact_List WHERE channel_id = ? AND account_id = ?'); // Recheche ds la contact list si l'account y est deja
    $selectGroupeList->execute(array($_GET['id_Channel'], $account['id']));
    $groupeList = $selectGroupeList->fetch();
    if ($groupeList) {
        echo '<label class="checkbox col-lg-6">
       
        <input class="form-control checkbox disabled " disabled type="checkbox" name="' . $account['id'] . '" id="' . $account['id'] . '" value="' . $account['id'] . '"><img  class="img-thumbnail" width="15%" src="' . $account['imageProfil'] . '" alt="Image de profil" >   ' . $account['firstName'] . ' ' . $account['lastName'] . '</label> 
        
        </label>';

    } else {
        echo '<label class="checkbox col-lg-6">
   
        <input class="form-control" type="checkbox" name="' . $account['id'] . '" id="' . $account['id'] . '" value="' . $account['id'] . '"><img  class="img-thumbnail" width="15%" src="' . $account['imageProfil'] . '" alt="Image de profil" >   ' . $account['firstName'] . ' ' . $account['lastName'] . '</label> 
        
        </label>';
    }


    array_push($listFriend, $account['id']);
    $Account->closeCursor();
    $selectGroupeList->closeCursor();

    foreach ($listFriend as $f) { // Je sais plus comment ca marche haha
        //echo $f;
        //echo $_POST[$f];
        if ($_POST[$f]) {

            $req = $bdd->prepare('INSERT INTO Channel_Contact_List(channel_id, account_id, allow) VALUES(:channel_id, :account_id, :allow)');
            $req->execute(array(
                'channel_id' => $_GET['id_Channel'],
                'account_id' => $_POST[$f],
                'allow' => 1
            ));
            $req->closeCursor();
            echo '<meta http-equiv="refresh" content="0;url=manageChannel.php?Channel_id=' . $_GET['id_Channel'] . '"/>';

        }
    }

}

$selectAccountList = $bdd->prepare('SELECT * FROM Account_Contact_List WHERE (user_id = ? OR user_contact = ?) AND friend = ?'); // Recherche tout les lignes ou il ya $_SESSION et freind = 1
$selectAccountList->execute(array($_SESSION['id'], $_SESSION['id'], 1));
while ($accountList = $selectAccountList->fetch()) {


    if ($accountList['user_id'] == $_SESSION['id']) // test si l'id session est ds la colonne user_id
    {
        ifContactIsInGroup($bdd, $accountList['user_contact']);

    } elseif ($accountList['user_contact'] == $_SESSION['id']) {
        ifContactIsInGroup($bdd, $accountList['user_id']);


    } else {
        echo 'ERREUR';
    }
} // Affiche ds un check box ts les contacts
$selectAccountList->closeCursor();
