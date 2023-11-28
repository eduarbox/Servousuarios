// Función para realizar la búsqueda en tiempo real
function buscarEnTiempoReal() {
    // Obtén el valor del campo de búsqueda
    const terminoDeBusqueda = document.getElementById("terminoDeBusqueda").value.toLowerCase();

    // Verifica si el campo de búsqueda no está vacío
    if (terminoDeBusqueda.trim() !== "") {
        // Obtén todas las filas de la tabla
        const filas = document.querySelectorAll('.table tbody tr');

        // Itera sobre las filas y muestra u oculta según la coincidencia
        filas.forEach((fila) => {
            const contenidoFila = fila.innerText.toLowerCase();
            if (contenidoFila.includes(terminoDeBusqueda)) {
                fila.style.display = 'table-row';
            } else {
                fila.style.display = 'none';
            }
        });
    } else {
        // Si el campo de búsqueda está vacío, muestra todas las filas
        const filas = document.querySelectorAll('.table tbody tr');
        filas.forEach((fila) => {
            fila.style.display = 'table-row';
        });
    }
}

// Agrega un evento de cambio al campo de búsqueda para buscar en tiempo real
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("terminoDeBusqueda").addEventListener("input", buscarEnTiempoReal);
    
    // Resto del código...
});
