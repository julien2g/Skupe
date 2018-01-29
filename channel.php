<?php session_start();
include 'head.php';
include 'Script/bdd.php';
if ($_SESSION['id']) {?>



    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>#</th>


            <th>Nom</th>

            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count;
        $listChannel = $bdd->query('SELECT * FROM Channel');
        while ($channel = $listChannel->fetch()) {
            ?>

            <tr>

                <td><a href="Script/channel/jointChannel.php?id=<?php echo $channel['id']?>" title="Voir le Channel"><?php $count++; echo $count?></a></td>
                <td><a href="Script/channel/jointChannel.php?id=<?php echo $channel['id']?>" title="Voir le Channel"> <?php echo $channel["name"] ?></a></td>


                <td><a href="Script/channel/jointChannel.php?id=<?php echo $channel["id"] ?>">Rejoindre</a></td>

            </tr>

        <?php }


        $listChannel->closeCursor();
        ?>
        </tbody>
    </table>








<?php } // Fin du if session
include 'Templates/footer.php'; ?>


