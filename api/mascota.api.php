<?php 

require_once '../models/Mascota.php';

$mascota = new Mascota();

header("Content-Type: application/json");

$verbo =$_SERVER["REQUEST_METHOD"];


switch ($verbo) {

    case "GET":
        echo json_encode($mascota->getAll());
        break;

    case "POST":
        $datosRecibidos = json_decode(file_get_contents('php://input'), true);
        $datosEnviar = [
            'nombre' => $datosRecibidos['nombre'],
            'tipo' => $datosRecibidos['tipo'],
            'genero' => $datosRecibidos['genero'],
            'peso' => $datosRecibidos['peso'],
            'fechanacimiento' => $datosRecibidos['fechanacimiento'],
        ];
        $resultado = $mascota->insert($datosEnviar);
        echo json_encode(['guardado' => $resultado]);
}