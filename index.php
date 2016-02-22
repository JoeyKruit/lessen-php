<?php
session_start();

if(isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit(0);
} else {
    header('Location: login.php');
    exit(0);
}
