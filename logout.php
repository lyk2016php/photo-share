<?php
require_once "include/init.php";
redirectIfNotLoggedIn();
session_destroy();
header("Location: index.php");