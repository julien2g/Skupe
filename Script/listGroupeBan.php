<?php
/**
 * Created by PhpStorm.
 * User: juliengadea
 * Date: 13/04/2017
 * Time: 00:08
 */
$req = $bdd->prepare('SELECT * FROM Groupe_Contact_List WHERE groupe_id = ? AND allow = ?');
$req->execute(array($Groupe['id'], 0));
while ($GroupeList = $req->fetch()) {
    $reb = $bdd->prepare('SELECT * FROM Account WHERE id = ?');
    $reb->execute(array($GroupeList['account_id']));
    $Account = $reb->fetch();
    ?>
    <tr>
        <td>
            <?php if ($Groupe['creator_id'] == $_SESSION['id'] OR $GroupeList['super_user'] == 1) {
                echo '<a href=manageGroupe.php?groupe_id=' . $_GET['groupe_id'] . '&ban=0&id=' . $Account['id'] . ' title="Débanir"> Débanir</a>';
            } ?>
        </td>
        <td>
            <?php echo $Account['firstName'] ?>
        </td>
        <td>
            <?php echo $Account['lastName'] ?>
        </td>
        <td><?php echo $GroupeList['banRaison'] ?> </td>
    </tr>


    <?php


    $reb->closeCursor();


}
?>