<?php
if ($_GET['id'] && $_GET['del'] == 456) { //Delete le msg
    include 'bdd.php';



    $delMessages = $bdd->prepare('DELETE FROM Message WHERE id = ?');
    $delMessages->execute(array($_GET['id']));

    $delMessages->closeCursor();


    echo '<meta http-equiv="refresh" content="0;url=../index.php?id=' . $_GET['idContact'] . '"/>'; // Redirige sur la conversation

}

if (!$_GET['del']) {

    ?>


    <script>
        if (!confirm('Voulez-vous vraiment supprimer ce message ?')) {
            document.location.href = "../index.php?id=<?php echo $_GET['idContact']; ?>";

        }
        else {
            document.location.href = "delMessage.php?id=<?php echo $_GET['id'] . '&del=456&idContact=' . $_GET['idContact']; ?>"; // redirige sur cette pâge en sup le msg
        }
    </script>

    <?php
}
    ?>
