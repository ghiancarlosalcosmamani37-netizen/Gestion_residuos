window.onload = function () {
    var fecha = new Date();
  
    var dia = fecha.getDate();
    var mes = fecha.getMonth() + 1; // Los meses en JavaScript empiezan en 0
    var ano = fecha.getFullYear();
  
    if (dia < 10) dia = "0" + dia;
    if (mes < 10) mes = "0" + mes;
  
    document.getElementById("fecha").value = ano + "-" + mes + "-" + dia;
  
    var hora = fecha.getHours();
    var minuto = fecha.getMinutes();
  
    if (hora < 10) hora = "0" + hora;
    if (minuto < 10) minuto = "0" + minuto;
  
    document.getElementById("hora-recepcion").value = hora + ":" + minuto;
  
    // Escucha el evento 'input' en el campo 'kilos'
    document.getElementById("kilos").addEventListener("input", function () {
      // Obtiene el valor del campo 'kilos'
      var kilos = this.value;
  
      // Calcula el total
      var total = kilos * 5;
  
      // Actualiza el campo 'total'
      document.getElementById("total").value = total;
    });
  };
  
  document
    .getElementById("miFormulario")
    .addEventListener("submit", function (event) {
      var lugar = document.getElementById("lugar").value;
      var destino = document.getElementById("destino").value;
  
      if (lugar === destino) {
        event.preventDefault();
        swal("Error", "El lugar y el destino no pueden ser el mismo.", "error");
      }
    });