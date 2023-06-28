<?php
    session_destroy();
    header('location:index.php?module=auth&action=login');
?>