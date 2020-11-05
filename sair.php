<?php

    session_start();

    unset($_SESSION['usuario']);
    unset($_SESSION['email']);

    session_unset();

    header('Location: home.php');

?>