<?php
 if ($_FILES['icone']['name']) {

$path = $_FILES['icone']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);


$upload = upload('icone', 'Templates/ImagesProfils/', $_SESSION['id'] . '.' . $ext, array('png', 'gif', 'jpg', 'jpeg'));

$rea = $bdd->prepare('UPDATE Account SET imageProfil = :imageProfil WHERE id = :id'); // Update le ligne du $Session ID
$rea->execute(array(
'imageProfil' => 'Templates/ImagesProfils/' . $_SESSION['id'] . '.' . $ext,
'id' => $_SESSION['id']
));
$rea->closeCursor();

$_SESSION['imageProfil'] = 'Templates/ImagesProfils/' . $_SESSION['id'] . '.' . $ext;

echo '<meta http-equiv="refresh" content="0;url=myProfil.php"/>'; // redirige

}


function upload($icone, $destination, $name, $extensions = FALSE)
{
    if ($_FILES[$icone]['error'] > 0) $erreur = "Erreur lors du transfert";


    $nom = $name;


    $ext = substr(strrchr($_FILES[$icone]['name'], '.'), 1);
    if ($extensions !== FALSE AND !in_array($ext, $extensions)) {
        echo 'Canceled ! Only ';
        echo print_r($extensions);
        echo ' are allowed !';
        die();
        return FALSE;
    }

    $resultat = move_uploaded_file($_FILES[$icone]['tmp_name'], $destination . $nom);
    if ($resultat) echo "Changement d'image reussi<br />";
}


?>