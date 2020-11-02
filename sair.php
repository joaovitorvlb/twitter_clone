<?php

    session_start();

    unset($_SESSION['usuario']);
    unset($_SESSION['email']);

    session_unset();

    echo 'Esperamos você de volta em breve!!!';

?>