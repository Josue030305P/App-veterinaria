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


  
}