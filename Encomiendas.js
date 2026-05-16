document.querySelectorAll("#importe").forEach(function (input) {
    input.addEventListener("input", function () {
      var total = 0;
      document.querySelectorAll("#importe").forEach(function (importe) {
        total += parseFloat(importe.value);
      });
      document.querySelector("#total").value = total.toFixed(0);
    });
  });
  
  setTimeout(function () {
    $(".alert").alert("close");
  }, 3000);
  
  setTimeout(function () {
    $(".alert").alert("close");
  }, 1000);
  // Desactivar el envío del formulario al actualizar la página
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  
  
  // jquery de Entregados.php
  $(document).ready(function() {
      $("#busqueda").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#tablaEntregados tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
      });
  });
  
  // jquery de Envios.php
  $(document).ready(function() {
      $("#busqueda").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#tablaEnvios tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
      });
  });
  
  // jquery de Seguimiento.php
  $(document).ready(function() {
      $("#busqueda").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#tablaSeguimiento tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
      });
  });

  // ver detalle
$(document).ready(function () {
  $(".ver-detalle").click(function() {
      var id = $(this).data("id");

      $.ajax({
          url: "Vistas/Modulos/Envios2.php",
          method: "POST",
          data: { id: id },
          success: function(data) {
              var detalles = JSON.parse(data);

              // Actualizar el contenido del modal con los detalles de la encomienda
              $("#detalleModalLabel").text("Detalles de la encomienda " + detalles.numero_boleto);
              $("#detalleModal .modal-body").html(
                  "<p><strong>DNI:</strong> " + detalles.dni + "</p>" +
                  "<p><strong>Lugar:</strong> " + detalles.lugar + "</p>" +
                  "<p><strong>Fecha:</strong> " + detalles.fecha + "</p>" +
                  "<p><strong>Hora de recepción:</strong> " + detalles.hora_recepcion + "</p>" +
                  "<p><strong>Hora de viaje:</strong> " + detalles.hora_viaje + "</p>" +
                  "<p><strong>Remitente:</strong> " + detalles.remitente + "</p>" +
                  "<p><strong>Consignado:</strong> " + detalles.consignado + "</p>" +
                  "<p><strong>Teléfono:</strong> " + detalles.telefono + "</p>" +
                  "<p><strong>Dirección:</strong> " + detalles.direccion + "</p>" +
                  "<p><strong>Destino:</strong> " + detalles.destino + "</p>" +
                  "<p><strong>Descripción:</strong> " + detalles.descripcion + "</p>" +
                  "<p><strong>Kilos:</strong> " + detalles.kilos + "</p>" +
                  "<p><strong>Total:</strong> " + detalles.total + "</p>" 
              );

              // Mostrar el modal
              var myModal = new bootstrap.Modal(document.getElementById('detalleModal'), {});
              myModal.show();
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.error("Error en la solicitud AJAX: ", textStatus, errorThrown);
          }
      });
  });
});