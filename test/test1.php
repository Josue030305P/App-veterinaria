<?php
require_once '../models/Mascota.php';

$mascota =  new Mascota();
header('Content-Type: application/json');
echo json_encode($mascota->getAll());