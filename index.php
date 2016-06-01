<?php

$page_title = 'Forum Thema\'s';

include('app/authentication.php');

include('templates/header.php');
if(isLoggedIn())
    include('templates/nav-loggedin.php');
else
    include('templates/nav-login.php');
include('app/database.php');

if(connectToDatabase()) {
    /*
     * Hieronder halen we alle thema's uit de database
     */
    executeDbStatement("SELECT * FROM themes");

    $themes = fetchAllRecords();        // Hierin zitten nu alle thema's
} else {
    // Dit is niet de eind oplossing om om te gaan met fouten
    die('Geen connectie met de database mogelijk');
}
?>

    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Thema's
                    <span class="pull-right">
                        <a href="#" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Nieuw</a>
                    </span>
                </h1>

                <!-- BEGIN VAN EEN THEMA -->
                <!-- Met de onderstaande foreach statement in PHP lopen we
                     door alle thema's die we hierboven uit de database
                     hebben gehaald. Ieder thema komt dan beschikbaar in de
                     variabele $theme. -->
                <?php foreach($themes as $theme): ?>
                    <div class="panel panel-default">
                        <!-- HEADING -->
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="panel-title">
                                        <!-- We maken hier een link per thema om de
                                             onderwerpen te kunnen zien in dit thema -->
                                        <a href="theme.php?theme=<?= $theme['id']; ?>">
                                            <?= $theme['title']; ?>
                                        </a>
                                    </h3>
                                </div>
                                <div class="col-md-2">
                                    <h3 class="panel-title text-center">Onderwerpen</h3>
                                </div>
                            </div>
                        </div> <!-- EINDE HEADING -->
                        <!-- BODY -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <?= $theme['description']; ?>
                                </div>
                                <!-- TODO: We moeten nog laten zien hoeveel onderwerpen er per thema zijn -->
                                <div class="col-md-2 post-amount">
                                    8
                                </div>
                            </div>
                        </div> <!-- EINDE BODY -->
                    </div> <!-- EINDE PANEL/THEMA -->
                <?php endforeach; ?>    <!-- EINDE FOREACH -->
            </div>
        </div>
    </main>
<?php
include('templates/footer.php');

