<?php
session_start();
$url = $_SERVER['HTTP_REFERER'];
session_unset();
session_destroy();

header("location: index.php");
