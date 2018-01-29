<?php
/**
 * Created by PhpStorm.
 * User: juliengadea
 * Date: 11/04/2017
 * Time: 21:38
 */$req = $bdd->prepare('SELECT * FROM Account WHERE id = ?');
$req->execute(array($getId));


$resultat = $req->fetch();
if (!$resultat)// si il n'existe pas, redirection
{

    echo '<body onLoad="alert(\'Le profil que vous souhaitez rechercher n éxiste pas\')">';

    echo '<meta http-equiv="refresh" content="1;url=index.php"/>';

    die();
}
?>