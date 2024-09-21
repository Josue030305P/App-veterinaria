<?php

require_once '../models/Mascota.php';

$mascota = new Mascota();
$mascotaEliminar = [
    'idmascota' => 3
];

$resultado = $mascota->delete($mascotaEliminar);
var_dump($resultado);