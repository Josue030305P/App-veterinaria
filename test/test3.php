<?php

require_once '../models/Mascota.php';

$mascota = new Mascota() ;
$datosActualizar = [
    'nombre' => 'Firualis 2.0',
    'tipo'=> 'perro',
    'genero' => 'macho',
    'peso' => 20.16,
    'fechanacimiento' => '1998-05-05',
    'estavivo' => 'no',
    'idmascota'=> 2,

];
$resultado = $mascota->update($datosActualizar);
var_dump($resultado);