<?php

$req = $bdd->prepare('SELECT * FROM Groupe_Contact_List WHERE groupe_id = ? AND allow = ?');
$req->execute(array($Groupe['id'], 1));
while ($GroupeList = $req->fetch()) {
    $reb = $bdd->prepare('SELECT * FROM Account WHERE id = ?');
    $reb->execute(array($GroupeList['account_id']));
    $Account = $reb->fetch();


    echo '<tr>';

    if ($Account['id'] == $_SESSION['id']) {
        echo '<td><a href="manageGroupe.php?groupe_id=' . $_GET['groupe_id'] . '&quitGroup=1&idGroupList=' . $GroupeList['id'] . '" title="Quiter le groupe">Quiter le groupe</a></td>   ';
    } elseif ($Groupe['creator_id'] == $_SESSION['id'] OR $GroupeList['super_user'] == 1) {
        $super_user = true;
        if ($Groupe['creator_id'] != $Account['id'] && $Account['id'] != $_SESSION['id']) {
            echo '<td><a href="manageGroupe.php?groupe_id=' . $_GET['groupe_id'] . '&&ban=1&id=' . $Account['id'] . '" title="Banir"> Banir |</a>';
            if ($Account['id'] == $_GET['id'] && $_GET['ban'] == 1 && $_GET['groupe_id'] && !$_GET['up']) {
                echo '
                <form method="POST" action="#">
                <input type="text" name="banRaison" placeholder="Raison du bannisement : ">
                </form>
                ';
            }


            if ($GroupeList['super_user'] == 0) {
                echo '<a href="manageGroupe.php?groupe_id=' . $_GET['groupe_id'] . '&&up=1&id=' . $Account['id'] . '" title="Promouvoir"> Promouvoir</a></td>';
            } elseif ($GroupeList['super_user'] == 1) {
                echo '<a href="manageGroupe.php?groupe_id=' . $_GET['groupe_id'] . '&&up=0&&id=' . $Account['id'] . '" title="Dépromouvoir"> Enlevez les drois</a></td>';
            }
        }


    } else {
        echo '<td></td>';
    }
    echo ' <td><a href="profil.php?id=' . $Account['id'] . '" title="Voir le profil">' . $Account['firstName'] . '</a></td>
                    <td><a href="profil.php?id=' . $Account['id'] . '" title="Voir le profil">' . $Account['lastName'] . '</a></td>
                </tr>';
    $reb->closeCursor();

}
?>