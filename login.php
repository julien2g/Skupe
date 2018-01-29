<?php session_start();
include 'head.php';

?> 

    <form action="#" method="post">

        <div class="col-lg-offset-4 col-lg-4 border">
            <div class="form-group">
                <label for="exampleInputEmail1">Adresse Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" <?php if ($_GET['email']) echo 'value="' . $_GET['email'] . '"'?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="passwd"
                       placeholder="Mot de passe">
            </div>
            <div class="form-group">

                <a class="help-block" href="signIn.php">Crée un nouveau compte</a>
                <a href="forgotPasswd.php" title="Avez vous oublié votre mot de passe ?">Mot de passe oublié</a>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="createCookies" value="true"/>Restez connecté</label>
            </div>
            <div align="center">
                 <button type="submit" class="btn btn-default">Submit</button>
            </div>

        </div>
    </form>


<?php







include  'Script/login.php';





?>