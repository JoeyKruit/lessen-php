<?php

include('database.php');

if(isset($_GET['code'])) {

    // Nu hebben we de code en gebruiken deze om de bijbehorende user op te vragen
    // Vervolgens deze user aan te passen:
    // 1. Verificatiecode weghalen
    // 2. We zetten de kolom verified op true

    if(connectToDatabase()) {
        executeDbStatement('SELECT * FROM users WHERE verification_code = :code',
            [
                ':code' => $_GET['code']
            ]
        );

        $user = fetchRecord();

        if ($user) {
            $verification_code = null;
            $verified = 1;
            $user_id = $user['id'];

            executeDbStatement('UPDATE users
                                SET verification_code = :verification_code,
                                    verified = :verified
                                WHERE id = :id', [
                ':verification_code' => $verification_code,
                ':verified' => $verified,
                ':id' => $user_id
            ]);
        }
    }
}
header('Location: ../login.php');
exit(0);