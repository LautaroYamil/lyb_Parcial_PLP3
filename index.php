<?php
// =========================
// lyb_Parcial_PLP3 - FoodExpress
// Desarrollado por Lautaro Yamil Bruera
// Este archivo muestra el menú, el carrito y el formulario de pedido.
// =========================
include('includes/lyb_conexion.php');

// Traemos los productos desde la base de datos
$stmt = $conexion->query("SELECT * FROM lyb_productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FoodExpress - lyb</title>
  <link rel="stylesheet" href="css/lyb_estiloos.css">
</head>
<body>

  <!-- HEADER -->
  <header class="lyb-header">
    <h1>🍕🍕 FoodExpress🍕🍕</h1>
    <p>Pedidos rápidos y exquisitos</p>
  </header>

  <!-- MENÚ DE PRODUCTOS -->
  <section class="lyb-menu">
    <h2>Menú</h2>
    <div class="lyb-grid">
      <?php foreach($productos as $p): ?>
        <div class="lyb-card">
          <img src="<?php echo $p['imagen']; ?>" alt="<?php echo $p['nombre']; ?>">
          <h3><?php echo $p['nombre']; ?></h3>
          <p><?php echo $p['descripcion']; ?></p>
          <span class="lyb-precio">$<?php echo number_format($p['precio'],2); ?></span>
          <button class="lyb-btn-agregar" 
                  data-id="<?php echo $p['id_producto']; ?>" 
                  data-nombre="<?php echo $p['nombre']; ?>" 
                  data-precio="<?php echo $p['precio']; ?>">
            Agregar al carrito
          </button>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- CARRITO -->
  <section class="lyb-carrito">
    <h2>🛒 Tu Carrito</h2>
    <table id="lyb-tabla-carrito">
      <thead>
        <tr><th>Producto</th><th>Cant.</th><th>Subtotal</th><th></th></tr>
      </thead>
      <tbody></tbody>
    </table>
    <p class="lyb-total">Total: $<span id="lyb-total">0</span></p>
  </section>

  <!-- CHECKOUT -->
  <section class="lyb-checkout">
    <h2>📦 Finalizar Pedido</h2>
    <form id="lyb-form-pedido" method="POST" action="lyb_guardar_pedido.php">
      <input type="text" name="nombre" placeholder="Tu nombre" required>
      <input type="text" name="telefono" placeholder="Teléfono" required>
      <input type="hidden" name="pedido_json" id="lyb-pedido-json">
      <button type="submit">Enviar Pedido</button>
    </form>
  </section>

  <script src="js/lyb_script.js"></script>
</body>
</html>
