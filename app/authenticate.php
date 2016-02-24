<?php

try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=les05', 'root', 'root');

    $user_query = $db->prepare('SELECT * FROM users');
    $user_query->execute();
    $users = $user_query->fetchAll();
    var_dump($users);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

echo '<br />Na de try...catch';