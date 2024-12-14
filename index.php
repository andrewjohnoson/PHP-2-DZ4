<?php

session_start();

require __DIR__ . '/App/autoload.php';

$ctrl = isset($_GET['ctrl']) ? ucfirst($_GET['ctrl']) : 'Index';
$class = '\App\Controllers\\' . $ctrl;
$ctrl = new $class;

$ctrl();