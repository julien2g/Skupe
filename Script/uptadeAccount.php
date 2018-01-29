<?php
if ($_POST['firstName'] AND $_POST['lastName'] AND $_POST['email'] AND $_POST['passwd'] AND $_POST['firstName'] != null AND $_POST['lastName'] != null AND $_POST['email'] != null AND $_POST['passwd'] != null) {
    $rea = $bdd->prepare('UPDATE Account SET firstName = :firstName, lastName = :lastName, email = :email, passwd = :passwd WHERE id = :id'); // Update le ligne du $Session ID
    $rea->execute(array(
        'firstName' => ucfirst($_POST['firstName']), // Met en maj la 1 er lettre
        'lastName' => strtoupper($_POST['lastName']), // Met en maj tout le mot
        'email' => $_POST['email'],
        'passwd' => $_POST['passwd'],
        'id' => $_SESSION['id']
    ));
    $rea->closeCursor();

    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['lastName'] = $_POST['lastName'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['passwd'] = $_POST['passwd'];
    echo '<body onLoad="alert(\'Vos information ont été modifié\')">';
    echo '<meta http-equiv="refresh" content="0;url=myProfil.php"/>'; // redirige

}
?>