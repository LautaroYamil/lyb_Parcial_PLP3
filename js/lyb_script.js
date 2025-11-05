/*
  lyb_script.js - Proyecto FoodExpress
  Autor: Lautaro Yamil Bruera
  Funcionalidad:
  - Controla el carrito de compras de forma dinámica.
  - Permite agregar y eliminar productos sin recargar la página.
  - Calcula subtotales y total general automáticamente.
  - Guarda el pedido en formato JSON para el backend (PHP).
*/

let carrito = [];
const tablaCarrito = document.querySelector("#lyb-tabla-carrito tbody");
const totalSpan = document.querySelector("#lyb-total");
const inputPedido = document.querySelector("#lyb-pedido-json");
const botonesAgregar = document.querySelectorAll(".lyb-btn-agregar");

// Agregar producto al carrito
botonesAgregar.forEach(boton => {
  boton.addEventListener("click", () => {
    const id = boton.dataset.id;
    const nombre = boton.dataset.nombre;
    const precio = parseFloat(boton.dataset.precio);

    const existente = carrito.find(p => p.id === id);
    if (existente) {
      existente.cantidad++;
    } else {
      carrito.push({ id, nombre, precio, cantidad: 1 });
    }
    actualizarCarrito();
  });
});

// Actualizar tabla de carrito
function actualizarCarrito() {
  tablaCarrito.innerHTML = "";
  let total = 0;

  carrito.forEach((p, i) => {
    const subtotal = p.precio * p.cantidad;
    total += subtotal;

    const fila = document.createElement("tr");
    fila.innerHTML = `
      <td>${p.nombre}</td>
      <td><input type="number" min="1" value="${p.cantidad}" data-index="${i}" class="lyb-cant"></td>
      <td>$${subtotal.toFixed(2)}</td>
      <td><button class="lyb-btn-eliminar" data-index="${i}">X</button></td>
    `;
    tablaCarrito.appendChild(fila);
  });

  totalSpan.textContent = total.toFixed(2);
  inputPedido.value = JSON.stringify(carrito);

  // Reasignar eventos
  document.querySelectorAll(".lyb-cant").forEach(input => {
    input.addEventListener("change", e => {
      const index = e.target.dataset.index;
      let valor = parseInt(e.target.value);
      if (valor < 1 || isNaN(valor)) valor = 1;
      carrito[index].cantidad = valor;
      actualizarCarrito();
    });
  });

  document.querySelectorAll(".lyb-btn-eliminar").forEach(btn => {
    btn.addEventListener("click", e => {
      const index = e.target.dataset.index;
      carrito.splice(index, 1);
      actualizarCarrito();
    });
  });
}
