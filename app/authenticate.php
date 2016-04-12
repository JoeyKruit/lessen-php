<?php
session_start();

/*
 * session_start maakt het mogelijk om in dit script te werken
 * met een sessie. Dit is ook altijd de eerste statement in je
 * script.
 */
include_once('database.php');

/*
 * Hieronder controleren we of dit script is opgestart vanuit een
 * formulier met de request methode POST. We weten dan enigszins zeker
 * dat dit script niet via de adresbalk van de browser is opgestart.
 */
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    /*
     * We zijn nu hier zeker van het feit dat dit script NIET is
     * opgestart met de request methode POST.
     * Dus keren we terug naar het login scherm.
     */
    header('Location: ../login.php');
    exit(0);
}

/*
 * Hieronder controleren we of we via een formulier zijn binnengekomen
 * in dit script middels een formulier waar op z'n minst de input velden
 * met de namen username en password.
 */
if(!isset($_POST['username']) && !isset($_POST['password'])) {
    /*
     * Blijkbaar bestaan de beide POST variabelen username en password
     * niet, dus kunnen we ervan uitgaan dat het niet om een inlog
     * formulier gaat. Dit betekent dat we terug keren naar ons
     * inlog formulier.
     */
    header('Location: ../login.php');
    exit(0);
}

/*
 * Als we hier zijn gekomen weten we nu enigszins zeker dat we via een
 * inlogformulier in dit script zijn gekomen.
 *
 * We halen nu de in het formulier ingetikte data op en stoppen
 * deze in twee variabelen.
 */
$username = $_POST['username'];
$password = $_POST['password'];
if (empty($username))
    $_SESSION['error_messages'][] = 'Gebruikersnaam is verplicht.';

if (empty($password))
    $_SESSION['error_messages'][] = 'Wachtwoord is verplicht';

/*
 * Als er hierboven een fout is opgetreden dan gaan we ook
 * direct terug naar login.php
 */
if(isset($_SESSION['error_messages'])) {
    $_SESSION['username'] = $username;
    header('Location: ../login.php');
    exit(0);
}

if (connectToDatabase()) {
    executeDbStatement('SELECT * FROM users WHERE username = :username AND password = :password',
        [
            ':username' => $username,
            ':password' => sha1($password)      // Wel eerst encrypten, want in de
                                                // database staat deze ook encrypted.
        ]
    );

    $users = fetchRecord();

    if($users) {
        /*
         * Is de huidige gebruiker geverifieerd
         */
        if(! $users['verified']) {
            $_SESSION['error_messages'][] = 'Uw account is nog niet geverifieerd!';
            header('Location: ../login.php');
            exit(0);
        }
        /*
         * Login is goedgegaan, dus de variabele $user is gevuld nu
         * met de record van de gebruiker uit de database
         */
        // STAP 1: Vastleggen dat de login is goedgegaan in de sessie
        $_SESSION['naam'] = $users['naam'];
        $_SESSION['username'] = $users['username'];
        $_SESSION['id'] = $users['id'];
        $_SESSION['email'] = $users['email'];
        $_SESSION['role'] = $users['role'];

        // STAP 2: Doorgaan naar dashboard.php
        if($_SESSION['role'] == 0)
            header('Location: ../adminpanel.php');
        else
            header('Location: ../dashboard.php');
        exit(0);
    } else {
        /*
         * Login is NIET goedgegaan, de variabele $user is dus gevuld met
         * de waarde null
         */
        // STAP 1:  Een foutmelding vastleggen in de sessie, zodat login.php
        //          deze kan laten zien.
        isset($_SESSION['error_messages']) ?: $_SESSION['error_messages'][] = 'De combinatie van gebruikersnaam en wachtwoord klopt niet';

        // STAP 2:  De ingetikte gebruikersnaam weer teruggeven aan login.php
        //          zodat deze weer kan worden ingevuld in de input voor username
        //          We doen dit, omdat het gebruikersvriendelijk
        $_SESSION['username'] = $username;

        // STAP 3: We gaan nu terug naar login.php
        header('Location: ../login.php');
        exit(0);
    }
}