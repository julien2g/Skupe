<?php session_start();
include 'Script/bdd.php';
include 'head.php';
?>


    <form action="#" method="post">

        <div class="col-sm-offset-4 col-sm-4 border">
            <div class="form-group">
                <label for="exampleInputEmail1">Adresse Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                       placeholder="Email" <?php if ($_GET['email']) echo 'value="' . $_GET['email'] . '"' ?>>
            </div>

            <div align="center">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>

        </div>
    </form>

<?php
include "Templates/footer.php";

if ($_POST['email']) {


    $mailTo = $_POST['email'];
    $passwd = chaine_aleatoire(13);


    $SelectAccount = $bdd->prepare('SELECT id FROM Account WHERE email = :email');
    $SelectAccount->execute(array(
        'email' => $mailTo
    ));
    $account = $SelectAccount->fetch();
///echo chaine_aleatoire(13);

    if ($account) {


        $rea = $bdd->prepare('UPDATE Account SET passwd = :passwd WHERE id = :id'); // Update le ligne du $Session ID
        $rea->execute(array(
            'passwd' => $passwd,
            'id' => $account['id']
        ));
        $rea->closeCursor();


        $mail = $mailTo; // Déclaration de l'adresse de destination.
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
        {
            $passage_ligne = "\r\n";
        } else {
            $passage_ligne = "\n";
        }
//=====Déclaration des messages au format texte et au format HTML. <a href='http://mysup.96.lt/3PJT+/login.php?email=" . $mailTo . "&passwd=" . $passwd . "'>ici</a>
        $message_txt = $msgTxt;//"Suite à votre demande, je vous prie de bien vouloir trouver votre nouveau mot de passe : ";
        $message_html = "<html><head></head><body>Suite a votre demande, je vous prie de bien vouloir trouver votre nouveau mot de passe : <b>" . $passwd . "</b>
    <br/>Pour vous connecter cliquez <a href='http://mysup.96.lt/3PJT+/login.php?email=" . $mailTo . "&passwd=" . $passwd . "'>ici</a> </body></html>";
//==========

//=====Création de la boundary
        $boundary = "-----=" . md5(rand());
//==========

//=====Définition du sujet.
        $sujet = "SKUP - Votre nouveau mot de passe";
//=========

//=====Création du header de l'e-mail.
        $header = "From: \"SKUP\"<Skup@mail.com>" . $passage_ligne;
        $header .= "Reply-to: \"SKUP\" <Skup@mail.com>" . $passage_ligne;
        $header .= "MIME-Version: 1.0" . $passage_ligne;
        $header .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
//==========

//=====Création du message.
        $message = $passage_ligne . "--" . $boundary . $passage_ligne;
//=====Ajout du message au format texte.
        $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passage_ligne;
        $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
        $message .= $passage_ligne . $message_txt . $passage_ligne;
//==========
        $message .= $passage_ligne . "--" . $boundary . $passage_ligne;
//=====Ajout du message au format HTML
        $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
        $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
        $message .= $passage_ligne . $message_html . $passage_ligne;
//==========
        $message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
        $message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
//==========

//=====Envoi de l'e-mail.
        mail($mail, $sujet, $message, $header);
//==========
    }
    else
    {
        echo '<body onLoad="alert(\'Je pense que vous vous êtes trompé dans votre adresse email ! Réesayer ..\')">';
        echo '<meta http-equiv="refresh" content="0;url=forgotPasswd.php"/>';
    }
}



// Génération d'une chaine aléatoire
function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
{
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for ($i = 0; $i < $nb_car; $i++) {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}

?>