<?php

$dbHost = '127.0.0.1';          // Het adres van de database server
$dbName = 'les05';              // De database die we willen gebruiken
$dbUser = 'root';               // De database user
$dbPassword = 'root';           // Wachtwoord van de database user

$db = null;                     // Hierin bewaren we de connectie met de database server
$statement = null;              // Hierin bewaren we de sql statement en het resultaat hiervan

/**
 * Maak een verbinding met de database
 *
 * @return bool
 */
function connectToDatabase()
{
    // Dit zijn globale variabelen die buiten de functie zijn aangemaakt
    // maar die we met de onderstaande code beschikbaar maken in deze
    // functie.
    global $dbHost, $dbName, $dbUser, $dbPassword, $db;

    try {
        // De connectie maken
        $db = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPassword);

        // De connectie is goedgegaan
        return true;
    } catch(PDOExeception $e) {
        // De fout die is opgetreden is niet zo belangrijk
        // We vertellen met de return value false dat de verbinding niet is gelukt.
        return false;
    }
}


/**
 * Voer een SQL statement uit op de server
 *
 * @param string    $sql            De SQL statement
 * @param array $parameters         Een optionele array met velden om te vervangen
 *                                  in de SQL statement
 */
function executeDbStatement($sql, $parameters = [])
{
    // We willen gebruik maken van deze twee globale variabelen
    global $db, $statement;

    // We bereiden de SQL statement voor om SQL-injectie te voorkomen
    $statement = $db->prepare($sql);

    // Als we geen array hebben meegegeven aan deze functie, voeren
    // we de execute functie van de statement gewoon uit.
    // Als we wel een array hebben meegegeven dan geven we deze ook weer
    // door aan de execute functie van de statement.
    if(empty($parameters))
        $statement->execute();              // Zonder array
    else
        $statement->execute($parameters);   // Met array
}

function fetchRecord()
{
    global $statement;

    return $statement->fetch();
}


function fetchAllRecords()
{
    global $statement;

    return $statement->fetchAll();
}