<?php

    session_start();

    unset($_SESSION['useremail']);
    session_destroy();

    echo "<script>window.location.assign('First.php');</script>";
?>