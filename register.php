<?php
include_once('app/authentication.php');

$error_messages = [];
$naam = '';
$username = '';
$email = '';

if(isset($_SESSION['error_messages'])) {
    $error_messages = $_SESSION['error_messages'];
    $naam = $_SESSION['naam'] ?: '';
    $username = $_SESSION['username'] ?: '';
    $email = $_SESSION['email'] ?: '';
    unset($_SESSION['error_messages']);
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
                    <form method="POST" action="app/register-user.php">
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

<?php
include_once('templates/footer.php');
