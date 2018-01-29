<?php
include 'date.class.php'; // obligatoire pour utiliser les fonction dateTime
include 'bdd.php';


$now = new dateOp(date('Y.m-d His'), 'aaaa.mm-jj hhiiss');

$SearchIp = $bdd->prepare('SELECT * FROM Ip WHERE ip = :ip'); // Recheche l'ip ds la bdd
$SearchIp->execute(array(
    'ip' => $_SERVER["REMOTE_ADDR"]
));
$idIp = $SearchIp->fetch(); // Cherche l'ip ds la bdd


$aujourdhui = new DateTime($now->GetDate('aaaa-mm-jj h:i:s '));
$deban  = new DateTime($idIp['dateDeban']); // Converti la date de deban

if($aujourdhui < $deban)
{
    echo '<body onLoad="alert(\'Vous êtes banni !\')">';
    echo '<meta http-equiv="refresh" content="0;url=index.php"/>';
    die();
}



if ($_GET['email'] && $_GET['passwd']) {
    $_POST["email"] = $_GET['email'];
    $_POST["passwd"] = $_GET['passwd'];

}
if (isset($_POST["email"]) && $_POST["email"] != null && isset($_POST["passwd"]) && $_POST["passwd"] != null) {






    $req = $bdd->prepare('SELECT * FROM Account WHERE email = :email AND passwd = :passwd');
    $req->execute(array(
        'email' => $_POST['email'],
        'passwd' => $_POST['passwd']
    ));


    $resultat = $req->fetch();
    if (!$resultat) {





        if ($idIp) { // Si adresse ip present
            $UpdateIp = $bdd->prepare('UPDATE Ip SET countTent = :countTent WHERE id = :id'); // Update le ligne where ip = ip
            $UpdateIp->execute(array(
                'countTent' => $idIp['countTent'] + 1,
                'id' => $idIp['id']
            ));

            if ($idIp['countTent']  == 9) {

                echo 'ban : ' . $idIp['ban'];
                echo '<br/>';
                //echo $now->GetDate('aaaa-mm-jj h:i:s ')."\n";
                switch ($idIp['ban']) {
                    case 0 :
                        echo 'bla';
                        $now->AjouteMinutes(5);
                        $ban = 1;
                        break;
                    case 1 :
                        echo 'bla';
                        echo 'bla';
                        $now->AjouteJours(7);
                        $ban = 2;
                        break;
                    case 2 :
                        echo 'bla';
                        echo 'bla';
                        echo 'bla';
                        $now->AjouteMois(7);
                        $ban = 0;
                        break;
                }
                //echo $now->GetDate('aaaa-mm-jj h:i:s ')."\n";
                $UpdateIp = $bdd->prepare('UPDATE Ip SET countTent = :countTent, dateDeban = :dateDeban, ban = :ban WHERE id = :id'); // Update le ligne where ip = ip
                $UpdateIp->execute(array(
                    'countTent' => 0,
                    'dateDeban' => $now->GetDate('aaaa-mm-jj h:i:s'),
                    'ban' => $ban,
                    'id' => $idIp['id']
                ));
            }
            //echo $idIp['countTent'];
            /**/



        } else {
            $InsertIp = $bdd->prepare('INSERT INTO Ip(ip, countTent) VALUES(:ip, :countTent)');
            $InsertIp->execute(array(
                'ip' => $_SERVER["REMOTE_ADDR"],
                'countTent' => 1
            ));
        }
        $SearchIp->closeCursor();


        //echo $idIp['id'];
        echo '<body onLoad="alert(\'Mauvais email ou mot de passe ! Réesayer ..\')">';
        echo '<meta http-equiv="refresh" content="1;url=login.php"/>';
        die();

    } else {


        $_SESSION['id'] = $resultat['id'];
        $_SESSION['imageProfil'] = $resultat['imageProfil'];
        $_SESSION['firstName'] = ucfirst($resultat['firstName']); // Met en maj la 1 er lettre
        $_SESSION['lastName'] = strtoupper($resultat['lastName']); // Met en maj tout le mot
        $_SESSION['email'] = $resultat['email'];
        $_SESSION['passwd'] = $resultat['passwd'];


        if ($idIp) {
            $delIp = $bdd->prepare('DELETE FROM Ip WHERE id = ?'); // Suprime la liste des membres // del l'ip
            $delIp->execute(array($idIp['id']));

            $delIp->closeCursor();
        }
        $SearchIp->closeCursor();

        // echo $_SESSION['firstName'] . ' vous étes bien connecté';
        echo '<meta http-equiv="refresh" content="0;url=index.php"/>';


    }
    $req->closeCursor();


}
?>