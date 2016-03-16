<?php
session_start();

function isLoggedIn()
{
    if( isset($_SESSION['naam']) &&
        isset($_SESSION['username']) &&
        isset($_SESSION['id']) &&
        isset($_SESSION['email']) &&
        isset($_SESSION['role'])) {
        /*
         * Alle sessie variabelen bestaan, dus er is blijkbaar via onze
         * authenticate.php ingelogd.
         */

        return true;
    }

    /*
     * Als ook maar 1 van de sessie variabele niet bestaat
     * kunnen we er van uit gaan dat er niet ingelogd is.
     */
    return false;
}

function isAdmin()
{
    if(isset($_SESSION['role']) && $_SESSION['role'] == 0)
        return true;

    return false;
}

function isUser()
{
    return ! isAdmin();
}
