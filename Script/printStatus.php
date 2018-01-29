<?php
$status = "Rentrez un status";
if ($_SESSION['id']) {
?>


<form method="post" action="index.php">
    <?php

    $req = $bdd->prepare('SELECT status FROM Account WHERE id = ?');
    $req->execute(array($_SESSION['id']));//$_SESSION["id"]));
    $resultat = $req->fetch();
    if ($resultat['status']) {
        $status = $resultat['status'];

    }
    ?>

    <input type="text" name="status" id="status" list="competences" placeholder="<?php echo $status?>">
    <datalist id="competences">
        <option label="Disponible" value="Disponible">
        <option label="Occupé" value="Occupé">
        <option label="Bientot de retour" value="Bientot de retour">
        <option label="Hors ligne" value="Hors ligne">
    </datalist>


</form>
<?php
}
?>