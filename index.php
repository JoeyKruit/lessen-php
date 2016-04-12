<?php
/*
 * We kunnen met index.php twee dingen doen:
 * a) We maken hier een startpagina van met algemene informatie over ons forum.
 *    In het menu geven we dan de mogelijkheid om je te registreren of in te loggen.
 * b) We controleren hier alleen of er iemand is ingelogd, zo ja dan gaan we door naar
 *    het dashboard voor ingelogde gebruikers, zo nee dan gaan we door naar het
 *    inlogformulier.
 *
 * Wat gaan we hier doen (b)?
 *
 * TODO     Controleren of iemand ingelogd is
 * TODO     JA -> Dan gaan we door naar het dashboard
 * TODO     NEE -> Dan gaan we door naar het login scherm
 */
include('app/authentication.php');

if(isLoggedIn()) {
    if(isAdmin())
        header('Location: adminpanel.php');
    else
        header('Location: dashboard.php');
    exit(0);
} else {
    header('Location: login.php');
    exit(0);
}