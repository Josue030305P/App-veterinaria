<?php

require_once '../models/Mascota.php';

$mascota = new Mascota();

$datosEnviar = [
    "nombre" => "Spinner",
    "tipo" => "gato",
    "genero" => "hembra",
    "peso" => 15.6,
    "fechanacimiento" => "1995-12-25"
];

$resultado = $mascota->insert($datosEnviar);

var_dump($resultado);