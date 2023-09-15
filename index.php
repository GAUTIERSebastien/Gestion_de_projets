<?php

//Affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// à mettre dans chaque controllers qui utilisent les sessions
session_start();

require('vendor/autoload.php');

use Seb\GestionDeProjets\Kernel\Dispatcher;



$dispatcher = new Dispatcher();
$dispatcher->dispatch();
