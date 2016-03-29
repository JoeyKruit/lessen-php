<?php
session_start();
/*
 * Om aan te geven dat er niemand meer ingelogd is moeten
 * we de sessie variabelen username, id en email verwijderen.
 * Daarnaast de sessie ID verwijderen en de sessie dus stoppen.
 */

unset($_SESSION['username']);       // Verwijder de sessie variabele username
unset($_SESSION['id']);             // Verwijder de sessie variabele id
unset($_SESSION['email']);          // Verwijder de sessie variabele email
unset($_SESSION['naam']);           // Verwijder de sessie variabele naam
unset($_SESSION['role']);           // Verwijder de sessie variabele role

session_destroy();                  // Stop de sessie en verwijder de unieke sessie ID

header('Location: login.php');
exit(0);