<?php
session_start();
session_destroy();
header('Location: ../onboard_login.php');
?>