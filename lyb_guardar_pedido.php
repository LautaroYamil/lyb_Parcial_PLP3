<?php
/*
  lyb_guardar_pedido.php - Proyecto FoodExpress
  Autor: Lautaro Yamil Bruera
  Función:
  - Recibe los datos del formulario (cliente, teléfono y carrito en JSON).
  - Calcula el total y guarda el pedido en la base de datos.
  - Inserta los detalles de cada producto comprado.
  - Devuelve un mensaje de confirmación.
*/

include('includes/lyb_conexion.php');

// Verificamos que el formulario venga con datos
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = $_POST['nombre'] ?? '';
  $telefono = $_POST['telefono'] ?? '';
  $pedido_json = $_POST['pedido_json'] ?? '[]';
  $pedido = json_decode($pedido_json, true);

  if (!$pedido || count($pedido) === 0) {
    echo "<h2>No se recibió ningún producto.</h2>";
    exit;
  }

  try {
    // Calculamos el total en servidor
    $total = 0;
    foreach ($pedido as $item) {
      $total += $item['precio'] * $item['cantidad'];
    }

    // Insertamos el pedido
    $stmt = $conexion->prepare("INSERT INTO lyb_pedidos (nombre_cliente, telefono, total) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $telefono, $total]);
    $id_pedido = $conexion->lastInsertId();

    // Insertamos los detalles del pedido
    $detalleStmt = $conexion->prepare("INSERT INTO lyb_detalle_pedido (id_pedido, id_producto, cantidad, subtotal) VALUES (?, ?, ?, ?)");

    foreach ($pedido as $item) {
      $subtotal = $item['precio'] * $item['cantidad'];
      $detalleStmt->execute([$id_pedido, $item['id'], $item['cantidad'], $subtotal]);
    }

    echo "
      <h2>✅ Pedido registrado correctamente</h2>
      <p>Gracias, <strong>$nombre</strong>. Tu pedido fue guardado.</p>
      <p>Total: <strong>$$total</strong></p>
      <a href='index.php'>Volver al menú</a>
    ";

  } catch (PDOException $e) {
    echo "❌ Error al guardar el pedido: " . $e->getMessage();
  }
} else {
  echo "<h2>Acceso no válido.</h2>";
}
?>
