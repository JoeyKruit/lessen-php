<?php
/*
 * session_start maakt het mogelijk om in dit script te werken
 * met een sessie. Dit is ook altijd de eerste statement in je
 * script.
 */
session_start();

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

/*
 * Nu proberen we een connectie te maken met de database
 * en de te controleren of de ingetikte username en password
 * in de database voorkomen.
 */
try {
    // De connectie maken
    $db = new PDO('mysql:host=127.0.0.1;dbname=les05', 'root', 'root');

    /*
     * De SQL-statement om te controleren of de ingetikte username en password
     * in de database in de tabel users voorkomen
     */
    $user_query = $db->prepare('SELECT * FROM users
                                WHERE username = :username AND password = :password');
    $user_query->execute([
        ':username' => $username,
        ':password' => $password
    ]);

    /*
     * Als de gebruiker in de database tabel users voorkomt dan halen we
     * zijn/haar record nu binnen en stoppen deze in de variabele $user.
     * Als het niet goedgegaan is zal de waarde in de variabele $user gelijk
     * zijn aan null
     */
    $users = $user_query->fetchAll();

    /*
     * We controleren nu of de waard van de variabele ongelijk is aan null
     */
    if($users) {
        /*
         * Login is goedgegaan, dus de variabele $user is gevuld nu
         * met de record van de gebruiker uit de database
         */
        // TODO STAP 1: Vastleggen dat de login is goedgegaan in de sessie

        // TODO STAP 2: Doorgaan naar dashboard.php
    } else {
        /*
         * Login is NIET goedgegaan, de variabele $user is dus gevuld met
         * de waarde null
         */
        // STAP 1:  Een foutmelding vastleggen in de sessie, zodat login.php
        //          deze kan laten zien.
        $_SESSION['error_message'] = 'De combinatie van gebruikersnaam en wachtwoord klopt niet';

        // STAP 2:  De ingetikte gebruikersnaam weer teruggeven aan login.php
        //          zodat deze weer kan worden ingevuld in de input voor username
        //          We doen dit, omdat het gebruikersvriendelijk
        $_SESSION['username'] = $username;

        // STAP 3: We gaan nu terug naar login.php
        header('Location: ../login.php');
        exit(0);
    }
} catch(PDOException $e) {
    /*
     * Als er iets onverwachts fout gaat met de database connectie
     * dan vangen we dat hier op (ons programma stopt dus niet met
     * rare foutmeldingen) en laten een aangepaste foutmelding zien.
     */
    echo 'ERROR: ' . $e->getMessage();
}
