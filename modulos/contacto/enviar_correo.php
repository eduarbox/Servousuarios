<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../PHPmailer/Exception.php';
require '../../PHPmailer/SMTP.php';
require '../../PHPmailer/PHPMailer.php';

// Configurar el servidor SMTP
$mail = new PHPMailer(true);
$mail->SMTPDebug = 0; // Habilitar el registro del correo electrónico
$mail->isSMTP(); // Enviar correo electrónico a través del servidor SMTP
$mail->Host = 'smtp.gmail.com'; // Nombre de host del servidor SMTP
$mail->SMTPAuth = true; // Habilitar la autenticación SMTP
$mail->Username = 'edogary@gmail.com'; // Dirección de correo electrónico del remitente
$mail->Password = 'ompv ihpd wjtb oszu'; // Contraseña del correo electrónico del remitente
$mail->SMTPSecure = 'ssl'; // Usar SSL para cifrar el correo electrónico
$mail->Port = 465; // Puerto seguro del servidor SMTP
$mail->CharSet = 'UTF-8'; // Utilizar UTF-8 para admitir caracteres especiales

// Configuración adicional (nombre del remitente, dirección de respuesta, etc.)
$mail->setFrom('edogary@gmail.com', 'Patronato Cultural Vizcaya.');

// Agregar una copia (CC) al correo electrónico almacenado en la variable $contacto['email']
//$mail->addCC(usuario@dominio.com);

//$mail->addReplyTo('edogary@gmail.com', 'Patronato Cultural Vizcaya.');
$mail->isHTML(true);

$servidor = "localhost";
$db = "phpcrud";
$username = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$db", $username, $password);
} catch (Exception $e) {
    echo $e->getMessage();
}
// Verificar la conexión
if ($conexion) {
    // Verificar si se ha enviado un ID desde el formulario
    if (isset($_POST['id'])) {
        // Obtén el ID de la fila desde $_POST
        $id = $_POST['id'];
        //$email = $_POST['email'];

        // Consulta SQL para obtener los datos del formulario desde la base de datos
        $sql = "SELECT apaterno, amaterno, nombre, email, perfil, servidor, campus, caja, cajaclave, uescritorio, uescritorioclave, uservo, uservoclave, fechaini FROM contactos WHERE id=:id";
        $stm = $conexion->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $contacto = $stm->fetch(PDO::FETCH_ASSOC);

        // Verifica si se encontró la fila
        if ($contacto) {

            $emailsend = $contacto['email']; // Asignar el valor de $contacto['email'] a la variable $emailsend

            // Configuración del mensaje
            $mail->Subject = 'Credenciales para Servo Escolar';
            // Construir el cuerpo del correo con estilos de color
            $body = '
            <html>
            <head>
            <title>Información de Acceso (Credenciales para Servo Escolar)</title>
            <style>
                /* Estilos de color */
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f0f0f0; /* Color de fondo del correo */
                    margin: 0;
                    padding: 0;
                    
                }
                .container {
                    background-color: #ffffff; /* Color de fondo del contenido */
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    
                }
                h1 {
                    color: #333333; /* Color del encabezado */
                }
                p {
                    color: #666666; /* Color del texto principal */
                }
                ul {
                    list-style-type: none;
                    padding: 0;
                }
                li {
                    margin-bottom: 5px;
                }
            </style>
            </head>
            <body>
            <div class="container">
            <h1>Asunto: Credenciales para Servo Escolar</h1>
            <p>Estimado usuario ' . $contacto['nombre'] . ' ' . $contacto['apaterno'] . ' ' . $contacto['amaterno'] . ',</p>
            <p>Es un placer darle la bienvenida al sistema Servo Escolar y compartir con usted sus credenciales de acceso. Le recordamos que el buen uso de estas credenciales es fundamental y recae en su responsabilidad.</p>
            <ul>
            <li>Apellido Paterno: ' . $contacto['apaterno'] . '</li>
            <li>Apellido Materno: ' . $contacto['amaterno'] . '</li>
            <li>Nombre: ' . $contacto['nombre'] . '</li>
            <li>Email: ' . $contacto['email'] . '</li>
            <br>
            <li>Perfil: ' . $contacto['perfil'] . '</li>
            <li>Servidor: ' . $contacto['servidor'] . '</li>
            <li>Campus: ' . $contacto['campus'] . '</li>
            <br>
            <li>Escritorio Remoto Usuario: ' . $contacto['uescritorio'] . '</li>
            <li>Escritorio Remoto Clave: ' . $contacto['uescritorioclave'] . '</li>
            <br>
            <li>Servo Escolar Usuario: ' . $contacto['uservo'] . '</li>
            <li>Servo Escolar Clave: ' . $contacto['uservoclave'] . '</li>
            <br>
            <li>Fecha de Creación: ' . date('d M Y', strtotime($contacto['fechaini'])) . '</li>
            <br>
            </ul>
            <p>Saludos,</p>
            <p>Sistemas Corporativo</p>
            <p>Patronato Cultural Vizcaya.</p>
            </div>
            </body>
            </html>
            ';

            $mail->Body = $body;

            // Agregar la dirección al correo electrónico
            $mail->addAddress($emailsend);

            // Enviar el correo electrónico
            if ($mail->send()) {
                include("../../template/header.php"); // Incluye el encabezado del sitio web
                echo 'Se ha enviado con éxito el correo con el siguiente contenido:';
                echo $body; // Incluye el cuerpo del correo enviado.
                echo '<br><a href="javascript:history.back()">Atrás</a>';   // Botón para volver atrás
                include("../../template/footer.php"); // Incluye el encabezado del sitio web

            } else {
                echo "No se pudo enviar el correo Error: {$mail->ErrorInfo}";
                
                echo '<br><a href="javascript:history.back()">Atrás</a>'; // Botón para volver atrás
            }
        } else {
            // Maneja la situación en la que no se encontró la fila por el ID
            echo "No se encontró la fila con el ID proporcionado.";
            echo '<br><a href="javascript:history.back()">Atrás</a>'; // Botón para volver atrás
        }
    } else {
        // Maneja la situación en la que no se proporcionó un ID válido
        echo "ID no válido.";
        echo '<br><a href="javascript:history.back()">Atrás</a>'; // Botón para volver atrás
    }
} else {
    echo "Error de conexión a la base de datos.";
    echo '<br><a href="javascript:history.back()">Atrás</a>';     // Botón para volver atrás
}
