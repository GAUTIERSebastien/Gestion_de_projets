<?php
session_start();

require('vendor/autoload.php');

use Seb\GestionDeProjets\Kernel\Dispatcher;



$dispatcher = new Dispatcher();
$dispatcher->dispatch();
