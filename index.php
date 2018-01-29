<?php session_start();
include 'Script/bdd.php'; ?>
<?php include 'head.php'; ?>


<?php


if(!$_SESSION['id'])
{
    echo '<img src="office.jpg" title="img de fond" alt="img de fond" /> ';
    die();
}



$id_session = $_SESSION['id'];
$askFriend = FALSE;

?>


    <div class="container">
        <div class="row">
            <div class="col-lg-3"><?php include 'Script/printStatus.php' ?></div> <?php include 'Script/postStatus.php' ?>
        </div>

        <div class="row">

            <div class="col-lg-3">

                <?php
                include 'Script/ifAskFriend.php';

                if ($askFriend == true) {
                    echo '<h1>Demandes d\'ajouts</h1>';
                    include 'Script/selectAskFriend.php';
                } else {?>        <h1>Contacts</h1>
                    <?php serachFreind($bdd, 'profil') /* recherche les contacts et les renvoies sur la page profil */ ?>
                <?php } ?>
                <h1>Conversations</h1>
                <?php serachFreind($bdd, 'index') /*  recherche les contacts et les renvoies sur la page index pour afficher les convers */ ?>

                <h1>Groupes <a href="newGroup.php" title="Créer un groupe">+</a></h1>
                <?php include 'Script/printGroup.php' ?>

                <h1>Channel <a href="newChannel.php" title="Créer un groupe">+</a> </h1>
                <?php include 'Script/channel/printChannel.php' ?>
            </div>
            <div class="col-lg-8">
                <h1 align="center">Messages</h1>
                <div class="container">
                <?php
                if ($_GET['id'] && $_GET['id'] != null) {
                    include 'Script/printMessage.php';
                } elseif ($_GET['id_groupe'] && $_GET['id_groupe'] != null) {
                    include 'Script/printMessageGroup.php';
                }elseif ($_GET['id_Channel'] && $_GET['id_Channel'] != null) {
                    include 'Script/channel/printMessageChannel.php';
                }


                ?>
                </div>
            </div>
            <div class="col-lg-2">


            </div>
        </div>


    </div>
    <br/><br/><br/>

    </div>

        <?php include 'Script/insertMessage.php'; ?>






    </div>


<?php

function serachFreind($bdd, $pageDestination)
{
    $selectAccountList = $bdd->prepare('SELECT * FROM Account_Contact_List WHERE (user_id = ? OR user_contact = ?) AND friend = ? AND block = ?'); // Recherche tout les lignes ou il ya $_SESSION et freind = 1
    $selectAccountList->execute(array($_SESSION['id'], $_SESSION['id'], 1, 0));
    while ($accountList = $selectAccountList->fetch()) {

        if ($accountList['user_id'] == $_SESSION['id']) // test si l'id session est ds la colonne user_id
        {
            echoContact($bdd, $pageDestination, $accountList, 'surname_contact', $accountList['user_contact']);

        } elseif ($accountList['user_contact'] == $_SESSION['id']) {

            echoContact($bdd, $pageDestination, $accountList, 'surname_id', $accountList['user_id']);
        }
    }
    $selectAccountList->closeCursor();

}

function echoContact($bdd, $pageDestination, $accountList, $surname, $accountListUser)
{


    $selectAccount = $bdd->prepare('SELECT * FROM Account WHERE id = ?'); // sinon faire une recherche avec l'user_id ds la table Account
    $selectAccount->execute(array($accountListUser));
    while ($account = $selectAccount->fetch()) {

        if ($accountList[$surname] != null) {
            echo('<a href="' . $pageDestination . '.php?id=' . $account["id"] . '">' . $accountList[$surname] . '</a><br/>');
        } else {
            echo('<a href="' . $pageDestination . '.php?id=' . $account["id"] . '">' . $account["firstName"] . ' ' . $account['lastName'] . '</a><br/>');
        }

    }
    $selectAccount->closeCursor();
}


$rep = $bdd->query('SELECT * FROM Account');
while ($donnees = $rep->fetch()) {


}
$rep->closeCursor();
?>


<?php include 'Templates/footer.php' ?>