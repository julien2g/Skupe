<?php session_start();
include 'head.php';
include 'Script/bdd.php';




$listFriend = array();
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ADD


if ($_GET['add'] && $_GET['add'] == 1 && $_GET['id_Channel'] && $_GET['id_Channel'] != null) { // Formulaire pour afficher les contacts
    ?>

    <h1 align="center">Ajouter vos contacts</h1>
    <form class="form-horizontal" method="post" action="#">

        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-6">
                <div class="checkbox-inline row marketing">
                    <label>
                        <?php include 'Script/channel/addContactToGroupe.php'; ?>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div align="center">
                <input type="submit" class="btn btn-default" value="Ajouter">
            </div>
        </div>
    </form>


    <?php


}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// REMOVE
elseif ($_GET['add'] && $_GET['add'] == -1 && $_GET['id_Channel'] && $_GET['id_Channel'] != null) {
    ?>
    <h1 align="center">Suprimez des membres du groupe</h1>
    <form class="form-horizontal" method="post" action="#">

        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-6">
                <div class="checkbox-inline row marketing">
                    <label>
                        <?php
                        include 'Script/channel/delContactToGroupe.php';
                        ?>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div align="center">
                <input type="submit" class="btn btn-default" value="Suprimer du groupe">
            </div>
        </div>
    </form>


    <?php





}
include 'Templates/footer.php';
?>