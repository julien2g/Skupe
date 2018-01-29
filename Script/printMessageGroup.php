<?php



echo '<div class="container">';
if ($_GET['id_groupe'] && $_GET['id_groupe'] != null) {
    $SmessagesGroupe = $bdd->prepare('SELECT * FROM Messages_Groupe WHERE id_Groupe = ? ORDER BY id');// RECHERCHE LES MSG AVEC LE CONTACT SELECTIONE
    $SmessagesGroupe->execute(array($_GET['id_groupe']));

    $allowList = $bdd->prepare('SELECT * FROM Groupe_Contact_List WHERE groupe_id = ? AND account_id = ?');
    $allowList->execute(array($_GET['id_groupe'], $_SESSION['id']));
    $GroupeList = $allowList->fetch();




    while ($message = $SmessagesGroupe->fetch()) {


        if ($message) {
            if ($message['id_sent'] != $id_session) {
                $SelectSendAccount = $bdd->prepare('SELECT * FROM Account WHERE id = ? ');// Cherche l'envoyeur.
                $SelectSendAccount->execute(array($message['id_sent']));
                $sendAccount = $SelectSendAccount->fetch();






                ?>
                <div class="row">
                    <?php
                    echo $sendAccount['firstName'];

                    ?>
                    <br>
                    <a href="profil.php?id=' . $Account['id'] . '"> <img src="<?php echo $sendAccount['imageProfil'] ?>" title="Image de profil" alt="Image de profil" height="30"/></a>
                    <?php
                    if ($GroupeList['super_user'] == 1) // MOderattor
                    {
                        echo '<a href="Script/delMessageGroupe.php?id=' .  $message['id'] . '&idContact=' . $_GET['id_groupe'] . '" >-</a>';
                    } ?>
                    <div class="col-lg-4 bg-success  border">

                         <?php

                            echo $message['message'];


                        ?>
                    </div>
                </div>
                <?php
            } else { ?>
                <div class="row">
                    <div class="col-lg-offset-4 col-lg-4  bg-info border">
                        <?php echo $message['message'] ; ?>
                    </div>
                    <a href="myProfil.php"> <img src="<?php echo $_SESSION['imageProfil'] ?>" title="Image de profil" alt="Image de profil" height="30"/> </a>
                    <?php echo '<a href="Script/delMessageGroupe.php?id=' .  $message['id'] . '&idContact=' . $_GET['id_groupe'] . '" >-</a>'; ?>
                </div>

                <?php
            }
        }
    }
    $SmessagesGroupe->closeCursor();
    echo '</div>';
//////////////////////////////////////////////////////////////////// IF ALLOW = 1 AFFICHER LE TEXT AREA




    if ($GroupeList) {


        if ($GroupeList['allow'] == 1) {

           ?>
            <div id="btns" class=" row col-lg-offset-2 ">
                <form method="POST" action="#">
                    <input type="button" value="G" style="font-weight: bold;" onclick="commande('bold');"/>
                    <input type="button" value="I" style="font-style: italic;" onclick="commande('italic');"/>

                    <input type="button" value="S" style="text-decoration: underline;" onclick="commande('underline');"/>
                    <button id="img">Insert image</button>
                    <br>
                    <div id="editeur" contentEditable></div>
                    <textarea id="resultat" style="display:none;" name="message"></textarea>
                    <input class="btn btn-primary" onclick="hello();" type="submit" value="Envoyer">
                </form>
            </div>
                <form method="post" action="Script/uploadFile.php?id_groupe=<?php echo $_GET['id_groupe']; ?>" enctype="multipart/form-data">
                    <label for="icone">Envoyer un fichier</label><br/>
                    <input  type="file" name="icone" id="icone"/>
                    <input type="submit" name="submit" value="Envoyer"/>
                </form>
            </div>
            <button id="start">Démarrer la video</button>

            <script>
                var btns = document.getElementById("btns");

                var editImg = btns.querySelector("#img")
                editImg.addEventListener("click", function (event) {
                    var linkImg = prompt("lien de l'image")
                    document.getElementById("resultat").value = "<img src='" + linkImg + "' widht='100' height='100'/>"

                })
            </script>

<?php
        } elseif ($GroupeList['allow'] == 0) { ////////////////////////////////////////////////////////////////////////////////////////////////////DESACTIVE LE TEXTAREA ICI
            echo ' <form method="POST" action="#">
                <fieldset disabled>
                      <textarea class="form-control" placeholder="Vous êtes banni " name="message"></textarea>  
                      </fieldset>
                   </form>';
        }
    }
    else
    {
        echo '<meta http-equiv="refresh" content="0;url=index.php"/>'; // redirige
    }


    $allowList->closeCursor();
}

?>
<script src="../app.js"></script>
