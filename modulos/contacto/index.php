<!-- index.php -->
<?php include("../../template/header.php"); // Incluye el encabezado del sitio web 
?>
<?php include("buscar.php"); // Incluye el encabezado del sitio web 
?>

<script src="buscar.js"></script>

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
    echo '<script>window.location.href = "index.php";</script>';
    exit(); // Asegura que el script se detenga después de la redirección
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                Nuevo <!-- Botón para mostrar un formulario de creación de nuevo contacto -->
            </button>

            <?php include("create.php"); // Incluye el formulario de creación de nuevo contacto 
            ?>

            <!-- Agrega un campo de búsqueda -->
            <div style="text-align: right;">
                <input type="text" id="terminoDeBusqueda" placeholder="Buscar">
            </div>

            <!-- Contenedor para mostrar los resultados de búsqueda en tiempo real -->
            <div id="resultados"></div>

            <style>
                /* Estilo para los encabezados de la tabla */
                .table.table-light thead th {
                    color: black;
                    /* Color del texto */
                    text-align: center;
                    /* Alineación del texto en el centro */
                    vertical-align: top;
                    /* Alineación vertical en la parte superior */
                    border: 1px solid #F1FAFE;
                    /* Borde con color personalizado */
                    padding: 10px;
                    /* Espaciado alrededor del contenido de la celda */
                    background-color: #DFE8F5;
                    /* Color de fondo del encabezado */
                    margin: 10px;
                    /* Margen alrededor del encabezado */
                    font-size: 11px;
                    /* Tamaño de texto */
                }

                /* Estilo para las celdas del cuerpo de la tabla */
                .table-light tbody td {
                    font-size: 12px;
                    /* Tamaño de texto */
                    text-align: center;
                    /* Alineación del texto en el centro */
                    vertical-align: middle;
                    /* Alineación vertical en el centro */
                    max-width: 200px;
                    /* Ancho máximo de la celda */
                    overflow: hidden;
                    /* Oculta el contenido que desborda */
                    text-overflow: ellipsis;
                    /* Muestra puntos suspensivos (...) si el texto es demasiado largo */
                    white-space: normal;
                    /* No permite saltos de línea en el texto */
                }

                .btn-danger {
                    border: 1px solid #F1FAFE;
                    /* Borde con color personalizado */
                    background-color: pink;
                    color: black;

                }

                .btn-warning {
                    background-color: #FAD899;
                    border: 1px solid #F1FAFE;
                    /* Borde con color personalizado */
                    color: white;
                }

                .btn-primary {
                    border: 1px solid #F1FAFE;
                    /* Borde con color personalizado */
                    background-color: #E0E7F4;
                    color: black;
                }

                .btn-secondary {

                    /* Borde con color personalizado */
                    background-color: #ECEDEE;
                    color: black;
                }

                /* Cambiar el estilo  del botón de cierre */
                .modal-header .close {

                    background: url('../../assets/me/iconocerrar.svg') center center no-repeat;
                    /* Ruta a tu ícono personalizado */
                    background-size: contain;
                    /* Ajusta el tamaño del fondo */
                    width: 30px;
                    /* Ancho del botón */
                    height: 30px;
                    /* Altura del botón */
                    opacity: 1;
                    /* Opacidad del botón */
                    border-radius: 10%;
                    /* Agrega esto para hacer que el botón sea circular */
                }

                .modal-header .close span {
                    visibility: hidden;
                    /* Oculta el contenido del botón */
                }
            </style>

            <div class="table-responsive">
                <table class="table table-light table-sm table-striped">
                    <br>
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
                                <td style="text-align: center; vertical-align: middle;"><?php echo implode(' ', [$contacto['apaterno'], $contacto['amaterno'], $contacto['nombre']]); ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?php echo $contacto['email']; ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?php echo implode(' ', [$contacto['campus'], $contacto['servidor']]); ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?php echo $contacto['perfil']; ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?php echo $contacto['caja'] . "<br> PASS: <span style='color: green;'>{$contacto['cajaclave']}</span>"; ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?php echo $contacto['uescritorio'] . "<br> PASS: <span style='color: green;'>{$contacto['uescritorioclave']}</span>"; ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?php echo $contacto['uservo'] . "<br> PASS: <span style='color: green;'>{$contacto['uservoclave']}</span>"; ?></td>
                                <td style="text-align: center; vertical-align: middle; font-size: 14px; "><?php echo date('d M Y', strtotime($contacto['fechaini'])); ?></td>
                                <td style="text-align: right; vertical-align: top;">
                                    <form action="enviar_correo.php" method="post">
                                        <div class=" form-group">
                                            <!-- Agrega un campo oculto para almacenar la ID de la fila -->
                                            <input type="hidden" name="id" value="<?php echo $contacto['id']; ?>">
                                        </div>
                                        <!-- Enviar -->
                                        <button type="submit" class="btn btn-primary btn-sm">Enviar
                                            <img src="../../assets/me/envelope-arrow-up.svg" alt="Enviar" width="16" height="16">
                                        </button>
                                        <!-- Editar -->
                                        <a href="edit.php?id=<?php echo $contacto['id']; ?>" class="btn btn-warning btn-sm">
                                            <img src="../../assets/me/pencil.svg" alt="Editar" width="16" height="16">
                                        </a>
                                        <!-- Eliminar con confirmación -->
                                        <a href="#" class="btn btn-danger delete-button btn-sm" data-id="<?php echo $contacto['id']; ?>" data-toggle="modal" data-target="#deleteConfirmationModal">
                                            <img src="../../assets/me/trash3.svg" alt="Eliminar" width="16" height="16">
                                        </a>
                                    </form>
            </div>
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