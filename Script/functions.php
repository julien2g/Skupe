
<?php




function serachFreind($bdd,$pageDestination)
{
    $selectAccountList = $bdd->prepare('SELECT * FROM Account_Contact_List WHERE (user_id = ? OR user_contact = ?) AND friend = ? AND block = ?'); // Recherche tout les lignes ou il ya $_SESSION et freind = 1
    $selectAccountList->execute(array($_SESSION['id'], $_SESSION['id'], 1, 0));
    while ($accountList = $selectAccountList->fetch()) {

        if ($accountList['user_id'] == $_SESSION['id']) // test si l'id session est ds la colonne user_id
        {

            echoContact($bdd, $pageDestination, $accountList, 'surname_contact', $accountList['user_contact']);

        } elseif($accountList['user_contact'] == $_SESSION['id']) {

            echoContact($bdd, $pageDestination, $accountList, 'surname_id', $accountList['user_id']);
        }
    }
    $selectAccountList->closeCursor();

}
function echoContact($bdd, $pageDestination , $accountList, $surname, $accountListUser)
{


    $selectAccount = $bdd->prepare('SELECT * FROM Account WHERE id = ?'); // sinon faire une recherche avec l'user_id ds la table Account
    $selectAccount->execute(array($accountListUser));
    while ($account = $selectAccount->fetch()) {

        if ($accountList[$surname] != null)
        {
            echo'<a class="btn btn-default " href="' . $pageDestination .'.php?id=' . $account["id"] . '" role="button">' . $accountList[$surname] . '</a>';
         //   echo('<a  href="' . $pageDestination .'.php?id=' . $account["id"] . '">' . $accountList[$surname] . '</a><br/>');
        }
        else
        {
            echo('<a class="btn btn-default " href="' . $pageDestination .'.php?id=' . $account["id"] . '">' . $account["firstName"] . ' ' . $account['lastName'] . '</a><br/>');
        }

    }

    $selectAccount->closeCursor();
}










?>