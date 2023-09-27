// buscar.js

// Función para realizar la búsqueda en tiempo real
function buscarEnTiempoReal() {
    // Obtén el valor del campo de búsqueda
    const terminoDeBusqueda = document.getElementById("terminoDeBusqueda").value;
  
    // Verifica si el campo de búsqueda no está vacío
    if (terminoDeBusqueda.trim() !== "") {
        // Realiza una solicitud AJAX al archivo buscar.php
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `buscar.php?termino=${terminoDeBusqueda}`, true);
      
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Actualiza el div de resultados con los resultados de búsqueda
                document.getElementById("resultados").innerHTML = xhr.responseText;
            }
        };
      
        xhr.send();
    } else {
        // Si el campo de búsqueda está vacío, puedes manejarlo de acuerdo a tus necesidades
        // Por ejemplo, aquí simplemente limpiamos los resultados
        document.getElementById("resultados").innerHTML = "";
    }
}

// Agrega un evento de cambio al campo de búsqueda para buscar en tiempo real
document.getElementById("terminoDeBusqueda").addEventListener("input", buscarEnTiempoReal);
