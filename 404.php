<?php
require_once "vendor/autoload.php";
use Controller\NoFoundController;

$noFoundContoller = new NoFoundController();
$noFoundContoller->action404();