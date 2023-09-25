<?php include("../../template/header.php"); // Incluye el encabezado del sitio web ?>

<?php
include("../../conexion.php"); // Incluye el archivo de conexión a la base de datos
$stm = $conexion->prepare("SELECT * FROM contactos"); // Prepara una consulta SQL para seleccionar todos los contactos
$stm->execute(); // Ejecuta la consulta
$contactos = $stm->fetchAll(PDO::FETCH_ASSOC); // Almacena los resultados en la variable $contactos

if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : ""); // Obtiene el ID del contacto a eliminar
    $stm = $conexion->prepare("DELETE FROM contactos WHERE id=:txtid"); // Prepara una consulta para eliminar un contacto por su ID
    $stm->bindParam(":txtid", $txtid); // Asocia el valor del ID a la consulta
    $stm->execute(); // Ejecuta la consulta de eliminación
    header("location:index.php"); // Redirige de nuevo a la página principal
    exit(); // Termina el script
}
?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
    Nuevo <!-- Botón para mostrar un formulario de creación de nuevo contacto -->
</button>

<?php include("create.php"); // Incluye el formulario de creación de nuevo contacto ?>

<style>
    /* Estilos CSS para personalizar la apariencia de la tabla */
    .table.table-dark thead th {
        color: #fff;
        /* Cambia el color del texto del encabezado a blanco */
        text-align: center;
        /* Alinea el texto en el centro */
        vertical-align: top;
        /* Alinea el contenido verticalmente en la parte superior */
        border: 1px solid #BDBDBD;
        /* Agrega un borde con un color personalizado */
        padding: 10px;
        /* Espacio alrededor del contenido de la celda */
        background-color: #515A5A;
        /* Cambia el color de fondo del encabezado */
        margin: 10px;
        /* Agrega un margen alrededor del encabezado */
    }
</style>

<div class="table-responsive">
    <table class="table table-dark table-sm">
        <br> <!-- Salto de línea antes de la tabla -->
        <thead>
            <tr>
                <!-- Encabezados de las columnas de la tabla -->
                <th scope="col" class="col">ID</th>
                <th scope="col" class="col">Nombre del Usuario</th>
                <th scope="col" class="col">Correo Electrónico</th>
                <th scope="col" class="col">Campus y Servidor</th>
                <th scope="col" class="col">Perfil</th>
                <th scope="col" class="col">No. de Caja y Contraseña</th>
                <th scope="col" class="col">Usuario Escritorio Remoto Y Contraseña</th>
                <th scope="col" class="col">Usuario Servo Escolar y Contraseña</th>
                <th scope="col" class="col">Fecha de Creación</th>
                <th scope="col" class="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto) { ?>
                <!-- Ciclo para mostrar los contactos en la tabla -->
                <tr class="">
                    <td scope="row"><?php echo $contacto['id']; ?></td>
                    <td style="text-align: center;"><?php echo implode(' ', [$contacto['apaterno'], $contacto['amaterno'], $contacto['nombre']]); ?></td>
                    <td style="text-align: center; vertical-align: middle;"><?php echo $contacto['email']; ?></td>
                    <td style="text-align: center; vertical-align: middle;"><?php echo implode(' ', [$contacto['campus'], $contacto['servidor']]); ?></td>
                    <td style="text-align: center; vertical-align: middle;"><?php echo $contacto['perfil']; ?></td>
                    <td style="text-align: center; vertical-align: middle;"><?php echo $contacto['caja'] . "<br> PASS: <span style='color: green;'>{$contacto['cajaclave']}</span>"; ?></td>
                    <td style="text-align: center; vertical-align: middle;"><?php echo $contacto['uescritorio'] . "<br> PASS: <span style='color: green;'>{$contacto['uescritorioclave']}</span>"; ?></td>
                    <td style="text-align: center; vertical-align: middle;"><?php echo $contacto['uservo'] . "<br> PASS: <span style='color: green;'>{$contacto['uservoclave']}</span>"; ?></td>
                    <td style="text-align: center; vertical-align: middle;"><?php echo date('d M Y', strtotime($contacto['fechaini'])); ?></td>
                    <td style="text-align: right; vertical-align: middle;">
                    <form action="enviar_correo.php" method="post">
    <div class="form-group">
        <!-- Agrega un campo oculto para almacenar la ID de la fila -->
        <input type="hidden" name="id" value="<?php echo $contacto['id']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
                        <a href="edit.php?id=<?php echo $contacto['id']; ?>" class="btn btn-warning">Editar</a> <!-- Botón para editar un contacto -->
                        <a href="#" class="btn btn-danger delete-button" data-id="<?php echo $contacto['id']; ?>" data-toggle="modal" data-target="#deleteConfirmationModal">Eliminar</a> <!-- Botón para eliminar un contacto con confirmación -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal de Confirmación de Eliminación -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Eliminar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a id="confirmDeleteButton" href="#" class="btn btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
</div>

<script>
    // Obtén todos los botones de eliminación por su clase
    const deleteButtons = document.querySelectorAll('.delete-button');

    // Agrega un manejador de eventos a cada botón de eliminación
    deleteButtons.forEach((button) => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');

            // Configura el botón de confirmación para eliminar el registro
            document.getElementById('confirmDeleteButton').setAttribute('href', `index.php?id=${id}`);
        });
    });
</script>

<?php include("../../template/footer.php"); ?>