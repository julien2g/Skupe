<?php
/**
 * Created by PhpStorm.
 * User: juliengadea
 * Date: 11/04/2017
 * Time: 19:46
 */
function searchUserBlock ($bdd, $search)
{
    $selectBlockAccount = $bdd->prepare('SELECT * FROM Account WHERE id = ?');
    $selectBlockAccount->execute(array($search));
    $account = $selectBlockAccount->fetch();


    if ($account) {

        echo $account['firstName'] . ' ' . $account['lastName'];
        echo '<a href="myProfil.php?deblock=1&id=' . $account['id'] . '" title="Debloquer cet utilisateur"> Debloquer</a>';
        echo '<br/>';
    }
    else
    {
        echo 'Aucun utilisateur bloqué';
    }


    $res = $selectBlockAccount->fetch();

    $selectBlockAccount->closeCursor();
}





echo 'Utilisateurs bloqués : <br/>';
$selectBlock = $bdd->prepare('SELECT * FROM Account_Contact_List WHERE (user_id = ? OR user_contact = ?) AND block = ?'); // Recherche tout les lignes ou il ya $_SESSION et freind = 1
$selectBlock->execute(array($_SESSION['id'],$_SESSION['id'], 1));
while ($accountList = $selectBlock->fetch())
{

if ($accountList["user_contact"] == $_SESSION['id'])
{
    searchUserBlock($bdd, $accountList["user_id"]); // Affiche les utilisateurs bloqué
}
elseif ($accountList["user_id"] == $_SESSION['id'])
{
    searchUserBlock($bdd, $accountList["user_contact"]);
}



}
$selectBlock->closeCursor();

?>