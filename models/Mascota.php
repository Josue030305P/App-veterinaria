<?php
require_once 'Conexion.php';

class Mascota extends Conexion {
  private $pdo;

  public function __CONSTRUCT() {
    $this->pdo = parent:: getConexion();
  }

  public function getAll() : array {
    try {
      $query = "SELECT * FROM mascotas ORDER BY idmascota DESC";
      $cmd = $this->pdo->prepare($query);
      $cmd->execute();

      return $cmd->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function insert($params = []) : bool {
    try {
      $status = false;
      $query = "INSERT INTO mascotas(nombre,tipo,genero,peso,fechanacimiento) VALUES(?,?,?,?,?)";
      $cmd = $this->pdo->prepare($query);
      $status =  $cmd->execute( array (
        $params["nombre"],
        $params["tipo"],
        $params["genero"],
        $params["peso"],
        $params["fechanacimiento"]

      ));
      return  $status;


    }  catch (Exception $e) {
        die($e->getMessage());
    }

  }

  public function update($params = []):bool {

    try {

      $status = false;
      $query = "UPDATE mascotas SET 
              nombre = ?,
              tipo = ?,
              genero = ?,
              peso = ?,
              fechanacimiento = ?,
              estavivo = ?
              WHERE idmascota = ?;
              ";

      $cmd = $this->pdo->prepare($query);
      $status = $cmd->execute( array (
        $params["nombre"],
        $params["tipo"],
        $params["genero"],
        $params["peso"],
        $params["fechanacimiento"],
        $params["estavivo"],
        $params["idmascota"],

      ) );

      return $status;

    } catch ( Exception $e) {

      die($e->getMessage());
    }
  }


  public function searchID($params = []):array {
    try {
      $query = "SELECT * FROM mascotas WHERE idmascota = ? AND estavivo = 'si'";
      $cmd = $this->pdo->prepare($query);
      $cmd->execute([$params['idmascota']]);
      return $cmd->fetchAll(PDO::FETCH_ASSOC);
      
    } catch (Exception $e) {
      die($e->getMessage());

    }
    }


    public function searchType($params = []):array {

      try {
        $query = "SELECT * FROM mascotas WHERE tipo = ? AND estavivo = 'si' ";
        $cmd = $this->pdo->prepare($query);
        $cmd->execute([$params["tipo"]]);

        return $cmd->fetchAll(PDO::FETCH_ASSOC);

      } catch (Exception $e) {

          die($e->getMessage());
      }
        
}

}