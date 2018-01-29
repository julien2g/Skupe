<?php session_start();
include 'Script/bdd.php';
include 'head.php';

include 'Script/channel/selectChannel.php';
?>


<div class="container">

    <div class="row">
        <div align="center">
            <h1><?php echo $Groupe['name']; ?></h1>
            <?php if ($_SESSION['id'] == $Groupe['creator_id']) {

                echo '<a href="manageChannel.php?Channel_id=' . $_GET['Channel_id'] . '&deleteTheGroup=456" title="Supprimer le Channel"> X</a>   ';
                $canDelete = true;
            } ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>
                        <h4>Menbres du Channel</h4>
                    </th>
                    <th>
                        <p>Prénom</p>
                    </th>
                    <th>
                        <p>Nom</p>
                    </th>
                    <th>
                        <?php echo '<a href="contactChannel.php?add=1&id_Channel=' . $_GET['Channel_id'] . '" title="Ajouter un contact au Channel"><h4>+</h4></a> '; ?>
                    </th>

                    <?php



                    if ($super_user == true ) {
                        echo '<th><a href="contactChannel.php?add=-1&id_Channel=' . $_GET['Channel_id'] . '" title="Suprimer un contact du groupe groupe"><h4>-</h4></a> </th>';
                    }?>

                </tr>
                </thead>
                <tbody>


                <?php

                include 'Script/channel/listChannel.php';
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>
                        <h4>Menbres du Channel bani</h4>
                    </th>
                    <th>
                        <p>Prénom</p>
                    </th>
                    <th>
                        <p>Nom</p>
                    </th>
                    <th>
                        <p>Motif</p>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php

                include 'Script/channel/listChannelBan.php';
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php


if ($Groupe['creator_id'] == $_SESSION['id'] OR $super_user == true) { // Promouvoir
    include 'Script/channel/upDown.php';
}

if ($_GET['id'] && $_GET['ban'] == 1 && $_GET['Channel_id'] && !$_GET['up'] && $super_user == true && $_POST['banRaison']) // BANIR
{
    include 'Script/channel/ban.php';
}

if ($_GET['id'] && $_GET['ban'] == 0 && $_GET['Channel_id'] && $super_user == true) //DEBANIR
{
    include 'Script/channel/deban.php';
}

if ($_GET['quitGroup'] == 1 && $_GET['Channel_id'] && $_GET['idGroupList']) { // quite le groupe


    if ($canDelete == true) // test si l'utilisaeur est createur
    {
        ?><script>
        if (confirm('Voulez-vous aussi suprimer le Channel ?'))
        {
            document.location.href="manageChannel.php?Channel_id=<?php echo $_GET['Channel_id']; ?>&deleteTheGroup=456"
        }
    </script><?php // suprime le Channel si l'utilisateur clique sur ok // redirige avec les bons parametres

    }

    include 'Script/channel/quitGroupe.php'; //Sinon on kick le mec

}

if ($_GET['Channel_id'] && $_GET['deleteTheGroup'] == 456 && $_GET['ok'] == 1) {
    include 'Script/channel/delGroupe.php';
}
if ($_GET['Channel_id'] && $_GET['deleteTheGroup'] == 456 && !$_GET['ok']) { //Delete le grp


    ?>
    <script>
        if (confirm('Voulez-vous vraiment suprimer ce Channel ?')) {
            document.location.href="manageChannel.php?Channel_id=<?php echo $_GET['Channel_id']; ?>&deleteTheGroup=456&ok=1"
        }else
        {
            document.location.href="manageChannel.php?Channel_id=<?php echo $_GET['Channel_id']; ?>"
        }
    </script>


    <?php

}


?>

