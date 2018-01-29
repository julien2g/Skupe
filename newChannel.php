<?php session_start();
include 'Script/bdd.php';
include "head.php";
$listFriend = array();
?>


<form class="form-horizontal" method="post" action="#">
    <div class="form-group">
        <label for="inputEmail3" class="col-lg-2 control-label">Nom du Channel</label>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="name" placeholder="Nom du groupe">
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-5 col-lg-10">
            <div class="checkbox">
                <label>
                    <?php include 'Script/printFriendInCheckBox.php' ?>
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div align="center">
            <input type="submit" class="btn btn-default" value="Créer le groupe">
        </div>
    </div>
</form>


<?php
//echo $listFriend[0];
///////////////////////////////////////////////////////////////UTILISATION DES GETS / POSTS/////////////////////////////////////////////////////////////////
if ($_POST['name'] AND $_POST['name'] != null) {


    $req = $bdd->prepare('INSERT INTO Channel(name, creator_id) VALUES(:name, :creator_id)'); //
    $req->execute(array(
        'name' => $_POST['name'],
        'creator_id' => $_SESSION["id"]));
    $req->closeCursor();

    $selectLast = $bdd->query('SELECT id FROM Channel ORDER BY id DESC LIMIT 0, 1');
    $lastId = $selectLast->fetch(); // Cherche le dernier id celui qu'on viens de cree
    // echo $lastId['id'];

    $rea = $bdd->prepare('SELECT id FROM Channel WHERE id = ?'); // recherche l'id du groupe qu'on viens de cree
    $rea->execute(array($lastId['id']));
    $don = $rea->fetch();

    $groupeId = $don['id'];
    $selectLast->closeCursor();
    $rea->closeCursor();


    $req = $bdd->prepare('INSERT INTO Channel_Contact_List(Channel_id, account_id, allow, super_user) VALUES(:Channel_id, :account_id, :allow, :super_user)');
    $req->execute(array(
        'Channel_id' => $groupeId,
        'account_id' => $_SESSION['id'],
        'allow' => 1,
        'super_user' => 1
    ));
    $req->closeCursor();


}

foreach ($listFriend as $f) {
    //echo $f;
    if ($_POST[$f]) {
        $req = $bdd->prepare('INSERT INTO Channel_Contact_List(Channel_id, account_id, allow) VALUES(:Channel_id, :account_id, :allow)');
        $req->execute(array(
            'Channel_id' => $groupeId,
            'account_id' => $_POST[$f],
            'allow' => 1
        ));
        $req->closeCursor();

    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>













































