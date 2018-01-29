<?php session_start();
include 'head.php';
include 'Script/bdd.php';
if ($_SESSION['id']) {?>



<table class="table table-striped table-hover ">
    <thead>
    <tr>
        <th>#</th>
        <th>Photo de profil</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Status</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count;
    $listAccount = $bdd->query('SELECT * FROM Account');
    while ($Account = $listAccount->fetch()) {
        ?>

    <tr>

        <td><a href="profil.php?id=<?php echo $Account['id']?>" title="Voir le profil de cet utilisateur"><?php $count++; echo $count?></a></td>
        <td><a href="profil.php?id=<?php echo $Account['id']?>" title="Voir le profil de cet utilisateur"><img src="<?php echo $Account["imageProfil"] ?>" width="150" height="100"/></a></td>
        <td><a href="profil.php?id=<?php echo $Account['id']?>" title="Voir le profil de cet utilisateur"> <?php echo $Account["firstName"] ?></a></td>
        <td><a href="profil.php?id=<?php echo $Account['id']?>" title="Voir le profil de cet utilisateur"><?php echo $Account["lastName"] ?></a></td>
        <td><a href="profil.php?id=<?php echo $Account['id']?>" title="Voir le profil de cet utilisateur"><?php echo $Account["status"] ?></a></td>

        <td><a href="addfreind.php?id=<?php echo $Account["id"] ?>"> Devenir ami</a></td>

    </tr>

    <?php } ?>
    </tbody>
</table>








<?php } // Fin du if session
include 'Templates/footer.php'; ?>


