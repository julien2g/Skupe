<?php
/**
 * Created by PhpStorm.
 * User: juliengadea
 * Date: 11/04/2017
 * Time: 22:02
 */
$req = $bdd->prepare('SELECT * FROM Account_Contact_List WHERE (user_id = ? AND user_contact = ?) OR (user_id = ? AND user_contact = ?)  ');
$req->execute(array($_SESSION['id'], $getId, $getId, $_SESSION['id']));
$donnees = $req->fetch();
if ($donnees) { // Si l'utilisateur et un contact

echo '<div class="col-lg-offset-3 col-lg-6 ">';
    if ($donnees["friend"] != 1) { // si la demande est deja cree et qu'elle est en attente de confirmation
        echo 'Votre demande d\'ajout en ami est en attente';

    } elseif ($donnees['block'] == 1) // si le contact est bloqué
    {
        echo 'Cet utilisateur est bloqué';
        echo '<meta http-equiv="refresh" content="1;url=index.php"/>';
    } else { // si ils sont en contact

        echo '<form method="post" action="#">
    <input type="text" name="surname" placeholder="Surnom">
</form>';


    }
} else {
    echo '<div class="col-lg-offset-6">';
    echo('<a class="btn btn-success" href="addfreind.php?id=' . $getId . '">Ajouter en ami</a><br/>');
    echo '</div>';
}
echo '</div>';
$req->closeCursor();


?>