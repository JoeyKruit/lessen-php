<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Les 05 - Registreren</title>

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
                <li><a href="#"><i class="fa fa-user-plus"></i>&nbsp;Registreren</a></li>
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
                    <h1>Registreren</h1>
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
                    <form method="POST" action="app/register_user-vb.php">
                        <div class="form-group">
                            <label for="naam">Volledige naam <span class="required-field">*</span></label>
                            <input name="naam" type="text" class="form-control" id="naam" placeholder="Volledige naam" value="<?= $naam; ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Gebruikersnaam <span class="required-field">*</span></label>
                            <input name="username" type="text" class="form-control" id="username" placeholder="Kies een gebruikersnaam" value="<?= $username; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mailadres <span class="required-field">*</span></label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="E-mailadres" value="<?= $email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Wachtwoord <span class="required-field">*</span></label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Wachtwoord">
                        </div>
                        <div class="form-group">
                            <label for="password_repeat">Herhaal wachtwoord <span class="required-field">*</span></label>
                            <input name="password_repeat" type="password" class="form-control" id="password_repeat" placeholder="Herhaal het wachtwoord">
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Registreren</button>
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
