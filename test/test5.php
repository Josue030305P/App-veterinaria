<?php

require_once '../models/Mascota.php';

$mascota = new Mascota() ;
$tipoMascota = [
    'tipo' => 'perro'
];

header('Content-Type: application/json');
echo json_encode($mascota->searchType($tipoMascota));