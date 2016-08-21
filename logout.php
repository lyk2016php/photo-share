<?php
require_once "init.php";
redirectIfNotLoggedIn();
session_destroy();
header("Location: index.php");