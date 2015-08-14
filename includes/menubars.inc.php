<?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/login/includes/api.php";
        include_once($path);
     if(is_logged_in()) {
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/includes/navbar2.inc.php";
        include_once($path);
     } else {
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/includes/navbar.html";
        include_once($path);
     }
?>
