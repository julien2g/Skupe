<?php session_start();
include 'Script/bdd.php';
include 'head.php';

include 'Script/selectGroupe.php';
?>


<div class="container">

    <div class="row">
        <div align="center">
            <h1><?php echo $Groupe['name']; ?></h1>
            <?php if ($_SESSION['id'] == $Groupe['creator_id']) {

                echo '<a href="manageGroupe.php?groupe_id=' . $_GET['groupe_id'] . '&deleteTheGroup=456" title="Suprimer le groupe"> X</a>   ';
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
                        <h4>Menbres du groupe</h4>
                    </th>
                    <th>
                        <p>Prénom</p>
                    </th>
                    <th>
                        <p>Nom</p>
                    </th>
                    <th>
                        <?php echo '<a href="contactGroupe.php?add=1&id_groupe=' . $_GET['groupe_id'] . '" title="Ajouter un contact au groupe"><h4>+</h4></a> '; ?>
                    </th>

                        <?php



                        if ($super_user == true ) {
                            echo '<th><a href="contactGroupe.php?add=-1&id_groupe=' . $_GET['groupe_id'] . '" title="Suprimer un contact du groupe groupe"><h4>-</h4></a> </th>';
                        }?>

                </tr>
                </thead>
                <tbody>


                <?php

                include 'Script/listGroupe.php';
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
                        <h4>Menbres du groupe bani</h4>
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

                include 'Script/listGroupeBan.php';
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php


if ($Groupe['creator_id'] == $_SESSION['id'] OR $super_user == true) { // Promouvoir
    include 'Script/upDown.php';
}

if ($_GET['id'] && $_GET['ban'] == 1 && $_GET['groupe_id'] && !$_GET['up'] && $super_user == true && $_POST['banRaison']) // BANIR
{
    include 'Script/ban.php';
}

if ($_GET['id'] && $_GET['ban'] == 0 && $_GET['groupe_id'] && $super_user == true) //DEBANIR
{
    include 'Script/deban.php';
}

if ($_GET['quitGroup'] == 1 && $_GET['groupe_id'] && $_GET['idGroupList']) { // quite le groupe


    if ($canDelete == true) // test si l'utilisaeur est createur
    {
        ?><script>
            if (confirm('Voulez-vous aussi suprimer le groupe ?'))
            {
                document.location.href="manageGroupe.php?groupe_id=<?php echo $_GET['groupe_id']; ?>&deleteTheGroup=456"
            }
        </script><?php // suprime le groupe si l'utilisateur clique sur ok // redirige avec les bons parametres

    }

    include 'Script/quitGroupe.php'; //Sinon on kick le mec

}

if ($_GET['groupe_id'] && $_GET['deleteTheGroup'] == 456 && $_GET['ok'] == 1) {
    include 'Script/delGroupe.php';
}
if ($_GET['groupe_id'] && $_GET['deleteTheGroup'] == 456 && !$_GET['ok']) { //Delete le grp


    ?>
    <script>
        if (confirm('Voulez-vous vraiment suprimer ce groupe ?')) {
            document.location.href="manageGroupe.php?groupe_id=<?php echo $_GET['groupe_id']; ?>&deleteTheGroup=456&ok=1"
        }else
        {
            document.location.href="manageGroupe.php?groupe_id=<?php echo $_GET['groupe_id']; ?>"
        }
    </script>


    <?php

}


?>

