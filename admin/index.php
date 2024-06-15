<?php
session_start();
ob_start();
require_once "./mvc/bridge.php";
require_once "./mvc/models/database.php";
$app = new app();