<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    if(isset($_SESSION['username']))
        echo 'TRUE';
    else
        echo 'FALSE';
?>