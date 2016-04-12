<?php

include_once('app/authentication.php');
$page_title = 'Admin panel';
if(!isLoggedIn()) {
    header('Location: login.php');
    exit(0);
}

if(isUser()) {
    header('Location: dashboard.php');
    exit(0);
}

include_once('templates/header.php');
if(isLoggedIn())
    include_once('templates/nav-loggedin.php');
else
    include_once('templates/nav-login.php');
?>
    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Admin panel</h1>
            </div>
        </div>
    </main>

<?php
include_once('templates/footer.php');
