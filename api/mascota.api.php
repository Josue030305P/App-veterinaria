<?php 

require_once '../models/Mascota.php';

$mascota = new Mascota();

header("Content-Type: application/json");

$verbo =$_SERVER["REQUEST_METHOD"];


switch ($verbo) {

    case "GET":
 
        if (isset($_GET["idmascota"])) {
            
            $params = ['idmascota' => $_GET['idmascota']];
            echo json_encode($mascota->searchID($params));
        } else if (isset($_GET['tipo'])) {
            $params = ['tipo'=> $_GET['tipo']];
            echo json_encode($mascota->searchType($params));
        } else {
            echo json_encode($mascota->getAll());
        }

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


    case "PUT":
        $datosRecibidos = json_decode(file_get_contents('php://input'), true);
        $datosEnviar = [
            'nombre' => $datosRecibidos['nombre'],
            'tipo'=> $datosRecibidos['tipo'],
            'genero'=> $datosRecibidos['genero'],
            'peso' => $datosRecibidos['peso'],
            'fechanacimiento' => $datosRecibidos['fechanacimiento'],
            'estavivo' => 'no',
            'idmascota' => $datosRecibidos['idmascota'],
        ];
        $resultado = $mascota->update($datosEnviar);
        echo json_encode(['guardado'=> $resultado]);

    
   
}