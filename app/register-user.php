<?php
session_start();

include('database.php');
/*
 * Controle of ik dit scriptje uitvoer vanuit het registratie formulier
 */
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../register.php');
    exit(0);
}

/*
 * Controleren of alle invoervelden zijn ingevuld.
 *
 * We halen eerst alle ingevulde gegevens uit het formulier en
 * stoppen deze in lokale variabelen.
 */
$naam = $_POST['naam'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

// Is de naam wel ingevuld?
if(empty($naam))
    $_SESSION['error_messages'][] = 'Naam is verplicht!';

// Is de gebruikersnaam wel ingevuld?
if(empty($username))
    $_SESSION['error_messages'][] = 'Gebruikersnaam is verplicht!';

// Is het e-mailadres wel ingevuld?
if(empty($email))
    $_SESSION['error_messages'][] = 'E-mailadres is verplicht!';

// Is het wachtwoord wel ingevuld?
if(empty($password))
    $_SESSION['error_messages'][] = 'Wachtwoord is verplicht!';

// Is het herhaal wachtwoord wel ingevuld?
if(empty($password_repeat))
    $_SESSION['error_messages'][] = 'Herhaal wachtwoord is verplicht!';

/*
 * Als er bij de controles hierboven een fout is toegevoegd aan de
 * sessie variabele error_messages dan keren we met de reeds ingetikte
 * waarden weer terug naar het registratie formulier. Het heeft geen zin om
 * de volgende controles nog uit te voeren dan.
 */
if(isset($_SESSION['error_messages'])) {
    $_SESSION['naam'] = $naam;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    header('Location: ../register.php');
    exit(0);
}

/*
 * Controle of gebruikersnaam en email beschikbaar zijn
 */
if(connectToDatabase()) {
    /*
     * Eerst controleren we of de gebruikersnaam al bestaat.
     */
    executeDbStatement('SELECT * FROM users WHERE username = :username',
        [
            ':username' => $username
        ]
    );

    $user = fetchRecord();

    if($user) {
        // Als de variabele $user niet gelijk is aan null dan is er dus een
        // record gevonden met de gebruikersnaam. En dus geven we de onderstaande
        // fout door.
        $_SESSION['error_messages'][] = 'Gebruikersnaam bestaat al. Kies een andere!';
    }

    /*
     * We testen nu of het e-mailadres al in de database voorkomt.
     */
    executeDbStatement('SELECT * FROM users WHERE email = :email',
        [
            ':email' => $email
        ]
    );

    $user = fetchRecord();

    if ($user) {
        // Als de variabele $user niet gelijk is aan null dan is er dus een
        // record gevonden met het e-mailadres. En dus geven we de onderstaande
        // fout door.
        $_SESSION['error_messages'][] = 'E-mailadres bestaat al!';
    }
}

/*
 * Als bij de bovenstaande twee controles een fout bericht is achtergelaten in
 * de sessie variabele error_messages dan bestaat een van de twee waarden al in
 * de database of beide bestaan al. In elk geval geven we wel de ingetikte waarden
 * terug aan het registratie formulier.
 */
if(isset($_SESSION['error_messages'])) {
    $_SESSION['naam'] = $naam;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    header('Location: ../register.php');
    exit(0);
}

/*
 * Controle of de beide ingetikte wachtwoorden wel hetzelfde zijn
 */
if($password != $password_repeat) {
    // We geven wel de reeds ingetikte waarden terug aan het registratie formulier
    $_SESSION['error_messages'][] = 'Beide wachtwoorden komen niet overeen!';
    $_SESSION['naam'] = $naam;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    header('Location: ../register.php');
    exit(0);
}

/*
 * Als we hier aangekomen zijn, dan zijn er geen fouten geweest
 * en kunnen we de user opslaan in de database.
 */
if(connectToDatabase()) {
    executeDbStatement('INSERT INTO users(naam, username, password, email)
                        VALUES(:naam, :username, :password, :email)',
        [
            ':naam' => $naam,
            ':username' => $username,
            ':password' => sha1($password),
            ':email' => $email
        ]
    );

    header('Location: ../login.php');
    exit(0);
}

/*
 * Connectie met de database is niet goedgegaan
 * We geven wel de reeds ingetikte waarden terug aan het registratie formulier
 */
$_SESSION['error_messages'][] = 'Connectie met de database is niet gelukt, probeer het later nog eens!';
$_SESSION['naam'] = $naam;
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
header('Location: ../register.php');
exit(0);