<?php
session_start();
session_unset();
$_SESSION = array();
session_destroy();
$url = "http://$_SERVER[HTTP_HOST]";
header("Location: {$url}/login");