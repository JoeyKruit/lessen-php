<?php

$page_title = 'Onderwerpen';

include('templates/header.php');
include('templates/nav-login.php');
include('app/database.php');

if(connectToDatabase()) {
    /*
     * We halen hieronder eerst de gegevens van het thema er bij
     * Dit doen we om de title op de pagina te kunnen laten zien.
     * Dit levert ons wel twee requests naar de database op en is
     * niet de meest ideale oplossing.
     */
    executeDbStatement("SELECT * FROM themes WHERE id = :id", [
        ':id' => $_GET['theme']
    ]);

    $theme = fetchRecord();             // Hierin zit nu alle info over dit thema

    /*
     * Nu pas halen we alle onderwerpen binnen dit thema er bij
     */
    executeDbStatement("SELECT * FROM subjects WHERE theme_id = :id", [
        ':id' => $_GET['theme']
    ]);

    $subjects = fetchAllRecords();      // Hierin zitten nu alle onderwerpen
} else {
    // Dit is niet de eind oplossing om om te gaan met fouten
    die('Geen connectie met de database mogelijk');
}
?>

    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Hieronder laten de titel van de bijbehorende thema zien -->
                <h1><?= $theme['title']; ?>
                    <span class="pull-right">
                        <a href="#" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Nieuw</a>
                    </span>
                </h1>

                <!-- BEGIN VAN EEN ONDERWERP -->
                <!-- Met onderstaande PHP lus (foreach) lopen we langs
                     alle onderwerpen en laten de informatie per
                     onderwerp zien -->
                <?php foreach($subjects as $subject): ?>
                    <div class="panel panel-default">
                        <!-- HEADING -->
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3 class="panel-title">
                                        <!-- We maken hier een link om alle reacties binnen
                                             dit onderwerp te kunnen zien -->
                                        <a href="subject.php?subject=<?= $subject['id']; ?>">
                                            <?= $subject['title']; ?>
                                        </a>
                                    </h3>
                                </div>
                                <div class="col-md-2">
                                    <h3 class="panel-title text-center">Reacties</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3 class="panel-title text-center">Laatste reactie</h3>
                                </div>
                            </div>
                        </div> <!-- EINDE HEADING -->
                        <!-- BODY -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <!-- Het bericht gekoppeld aan dit onderwerp -->
                                    <?= substr($subject['message'], 0, 60) . '...'; ?>
                                </div>
                                <div class="col-md-2 post-amount">
                                    10 <!-- TODO: Tellen hoeveel reacties er zijn -->
                                </div>
                                <div class="col-md-2 text-center">
                                    <!-- TODO: De laatste reactie binnen dit onderwerp tonen -->
                                    11-02-2016 11:56<br />
                                    door Truus
                                </div>
                            </div>
                        </div> <!-- EINDE BODY -->
                    </div> <!-- EINDE ONDERWERP -->
                <?php endforeach; ?>
            </div>
        </div>
    </main>
<?php
include('templates/footer.php');


