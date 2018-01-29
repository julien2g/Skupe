<?php
if ($_GET['id'] && $_GET['id'] != null) {
    $acc = $bdd->prepare('SELECT * FROM Account WHERE id = ?');
    $acc->execute(array($_GET['id']));
    $Account = $acc->fetch();
    if ($Account) {

        $accList = $bdd->prepare('SELECT * FROM Account_Contact_List WHERE ((user_id = ? AND user_contact = ?) OR (user_id = ? AND user_contact = ?)) AND friend = ?');
        $accList->execute(array($_SESSION['id'], $_GET['id'], $_GET['id'], $_SESSION['id'], 1));
        $AccountList = $accList->fetch();
        if ($AccountList) {

            echo '<h1><a href="profil.php?id=' . $Account['id'] . '" title="Voir le profil">' . $Account['firstName'] . ' ' . $Account['lastName'] . '</a>  : ' . $Account['status'] . '   </h1>';


            $rep = $bdd->prepare('SELECT * FROM Message WHERE (id_sent = ? AND id_receiver = ?) OR (id_sent = ? AND id_receiver = ? ) ORDER BY id');// RECHERCHE LES MSG AVEC LE CONTACT SELECTIONE
            $rep->execute(array($_SESSION['id'], $_GET['id'], $_GET['id'], $_SESSION['id']));
            while ($message = $rep->fetch()) {

                if ($message['id_sent'] == $_GET['id'] AND $message['id_receiver'] == $_SESSION['id']) {
                    echo '<div class="row >';
                    echo '<a href="profil.php?id=' . $Account['id'] . '"> <img src="' . $Account['imageProfil'] . '" title="Image de profil" alt="Image de profil" height="30"/></a>  ';
                    echo '<div  class="col-lg-4 bg-success border" >';
                    echo $message['message'];
                    echo '</div>';
                    echo '</div>';
                } elseif ($message['id_sent'] == $_SESSION['id'] AND $message['id_receiver'] == $_GET['id']) {
                    echo '<div class="row">';
                    echo '<div  class="col-lg-offset-4 col-lg-4  bg-info border">';
                    echo $message['message'];
                    echo '</div>';
                    echo '<a href="myProfil.php"> <img src="' . $_SESSION['imageProfil'] . '" title="Image de profil" alt="Image de profil" height="30"/> </a>';
                    echo '<a href="Script/delMessage.php?id=' . $message['id'] . '&idContact=' . $_GET['id'] . '" >-</a>';
                    echo '</div>';

                }

            }
            $rep->closeCursor();
        } else {
            echo 'Vous n\'êtes pas ami avec cet utilisateur';
        }
        $accList->closeCursor();

    } else {
        echo 'Cet utilisateur n\'éxiste pas';
    } ?>


    <div id="btns" class=" row col-lg-offset-2  col-lg-5">

        <form method="POST" action="#" class="form-control">
            <input type="button" value="G" style="font-weight: bold;" onclick="commande('bold');"/>
            <input type="button" value="I" style="font-style: italic;" onclick="commande('italic');"/>

            <input type="button" value="S" style="text-decoration: underline;" onclick="commande('underline');"/>
            <button id="img">Insert image</button>
            <br>
            <div id="editeur" class="form-control" contentEditable></div>
            <textarea id="resultat" style="display:none;" name="message"></textarea>
            <input class="btn btn-primary form-control" onclick="hello();" type§="submit" value="Envoyer">
        </form>
    </div>


    </div>


    <form method="post" action="Script/uploadFile.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
        <label for="icone">Envoyer un fichier</label><br/>
        <input type="file" name="icone" id="icone"/>
        <input type="submit" name="submit" value="Envoyer"/>
    </form>

    <a href="../3PJT+/Script/video/video.php" target="_blank">
        <button>Démarrer la video</button>
    </a>

    <script>


        var btns = document.getElementById("btns");

        var editImg = btns.querySelector("#img")
        editImg.addEventListener("click", function (event) {
            var linkImg = prompt("lien de l'image")
            document.getElementById("resultat").value = "<img src='" + linkImg + "' widht='100' height='100'/>"

        })
    </script>


    <?php
    $acc->closeCursor();


}

?>










