<?php

require_once '../models/Mascota.php';

$mascota = new Mascota();
$mascotaBuscar = [
    'idmascota' => 4
];

header('Content-Type: application/json');
echo json_encode($mascota->searchID($mascotaBuscar));