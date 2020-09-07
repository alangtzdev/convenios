<?php
session_start();
session_destroy();
// session_unset();
$_SESSION = [];
session_write_close();
header('Location: login.php');