<?php
// lyb_conexion.php - Conexión a la BD
try {
  $conexion = new PDO("mysql:host=localhost;dbname=lyb_parcial_plp3", "root", "");
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Error de conexión: " . $e->getMessage();
  exit;
}
?>
