<?php
include_once('app/authentication.php');

/*
 * Standaard vullen we de twee variabelen met een lege string
 */
$error_messages = [];
$username = '';

/*
 * Alleen als de sessie variabele error_message is gevuld stoppen
 * we deze in de variabele $error_message. Later zullen we deze gebruiken.
 */
if(isset($_SESSION['error_messages'])) {
    $error_messages = $_SESSION['error_messages'];
    unset($_SESSION['error_messages']);
}

/*
 * Alleen als de sessie variabele username is gevuld stoppen
 * we deze in de variabele $username. Later zullen we deze gebruiken.
 */
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    unset($_SESSION['username']);
}

include_once('templates/header.php');
if(!isLoggedIn())
    include_once('templates/nav-login.php');
else
    include_once('templates/nav-loggedin.php');

?>
    <main class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h1>Inloggen</h1>
                            <hr />
                            <?php
                            /*
                             * We willen de alert box alleen laten zien als er ook
                             * een error_message is, dus niet een lege string is.
                             */
                            if(!empty($error_messages)):
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Fout! </strong><br />
                                    <ul>
                                    <?php foreach($error_messages as $error_message): ?>
                                        <li><?= $error_message; ?></li>
                                    <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php
                            endif;
                            ?>
                            <form method="POST" action="app/authenticate.php">
                                <div class="form-group">
                                    <label for="username">Gebruikersnaam</label>
                                    <input name="username" type="text" class="form-control" id="username" placeholder="Gebruikersnaam" value="<?= $username; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Wachtwoord</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Wachtwoord">
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Inloggen</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>

<?php
include_once('templates/footer.php');