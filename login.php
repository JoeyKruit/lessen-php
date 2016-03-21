<?php
/*
 * We starten de sessie op zodat we toegang hebben tot de
 * sessie variabelen (cookies op de server)
 */
session_start();

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
?>
<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Les 05 - Dashboard</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/font-awesome.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Les 05</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="register.php"><i class="fa fa-user-plus"></i>&nbsp;Registreren</a></li>
                        <li><a href="login.php"><i class="fa fa-unlock"></i>&nbsp;Aanmelden</a></li>
                    </ul>
                </div>
            </div>
        </nav>

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

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
