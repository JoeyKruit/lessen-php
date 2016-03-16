<?php
include_once('app/authentication.php');

if(!isLoggedIn()) {
    header('Location: login.php');
    exit(0);
}

if(isUser()) {
    header('Location: dashboard.php');
    exit(0);
}

echo '<h1>Admin panel</h1>';