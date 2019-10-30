<?php
require_once __DIR__ . '/../vendor/autoload.php';

use eCurring\DominoGame\UserInterface\CLI\Main;

$app = new Main();
$app->init();