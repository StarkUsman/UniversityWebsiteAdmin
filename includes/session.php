<?php
if (empty($_SESSION['SESSION_ID'])) {
    header('Location:sign-in.php');
    }
?>