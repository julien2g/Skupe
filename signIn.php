
<!DOCTYPE html>
<html lang=fr>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sign In</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="col-lg-offset-4 col-lg-4 border">
    <form method="post" action="#">
        <div class="form-group">
            <label for="exampleInputEmail1">Prénom</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="firstName" placeholder="Prénom">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="lastName" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Telephone</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="tel" placeholder="Email">
        </div>
        <div align="center"><input value="Je m'inscris" type="submit" class="btn btn-default"></div>
    </form>
</div>
</body>


<?php
include 'Script/bdd.php';
if ($_POST['firstName'] AND $_POST['lastName'] AND $_POST['tel'] AND $_POST['firstName'] != null AND $_POST['lastName'] != null AND $_POST['tel'] != null )
{
    $req = $bdd->prepare('INSERT INTO Compte(nom, prenom, telephone) VALUES(:nom, :prenom, :telephone)');
    $req->execute(array(

        'nom' => ucfirst($_POST['firstName']),
        'prenom' => strtoupper($_POST['lastName']),
        'telephone' => $_POST['tel']
    ));


    $req->closeCursor();

}
?>





































































































<?php /*
include 'head.php';
include 'Script/bdd.php';


?>

<div class="col-lg-offset-4 col-lg-4 border">
    <form method="post" action="#">


        <div class="form-group">
            <label for="exampleInputEmail1">Prénom</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="firstName" placeholder="Prénom">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="lastName" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Telephone</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="tel" placeholder="Telephone">
        </div>
        <div align="center"><input value="Je m'inscris" type="submit" class="btn btn-default"></div>


    </form>
</div>


</form>
</div>
<?php
if ($_POST['firstName'] AND $_POST['lastName'] AND $_POST['tel'] AND $_POST['firstName'] != null AND $_POST['lastName'] != null AND $_POST['tel'] != null ) {

    $req = $bdd->prepare('INSERT INTO Account(firstName, lastName, tel) VALUES(:firstName, :lastName, :tel)');
    $req->execute(array(

        'nom' => ucfirst($_POST['firstName']),
        'prenom' => strtoupper($_POST['lastName']),
        'tel' => $_POST['email']
    ));


    $req->closeCursor();

}*/
?>


</body>