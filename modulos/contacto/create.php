<?php
ob_start(); // Inicia el búfer de salida para manejar redirecciones y encabezados

// Sección condicional: verifica si se ha enviado el formulario ($_POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Incluye la configuración de tu conexión a la base de datos (reemplaza con tus detalles)
  include("../../conexion.php");


  // Se obtienen los valores del formulario ($_POST) o se establecen en cadena vacía si no están definidos
  $apaterno = (isset($_POST['apaterno']) ? $_POST['apaterno'] : "");
  $amaterno = (isset($_POST['amaterno']) ? $_POST['amaterno'] : "");
  $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
  $email = (isset($_POST['email']) ? $_POST['email'] : "");

  $perfil = (isset($_POST['perfil']) ? $_POST['perfil'] : "");
  $servidor = (isset($_POST['servidor']) ? $_POST['servidor'] : "");
  $campus = (isset($_POST['campus']) ? $_POST['campus'] : "");

  $caja = (isset($_POST['caja']) ? $_POST['caja'] : "");
  $cajaclave = (isset($_POST['cajaclave']) ? $_POST['cajaclave'] : "");
  $uescritorio = (isset($_POST['uescritorio']) ? $_POST['uescritorio'] : "");
  $uescritorioclave = (isset($_POST['uescritorioclave']) ? $_POST['uescritorioclave'] : "");
  $uservo = (isset($_POST['uservo']) ? $_POST['uservo'] : "");
  $uservoclave = (isset($_POST['uservoclave']) ? $_POST['uservoclave'] : "");
  $fechaini = (isset($_POST['fechaini']) ? $_POST['fechaini'] : "");


  // Se prepara una sentencia SQL para la inserción de datos en la base de datos
  $stm = $conexion->prepare("INSERT INTO contactos(id, apaterno, amaterno, nombre, email, perfil, servidor, campus, caja, cajaclave, uescritorio, uescritorioclave, uservo, uservoclave, fechaini) 
VALUES (null, :apaterno, :amaterno, :nombre, :email, :perfil, :servidor, :campus, :caja, :cajaclave, :uescritorio, :uescritorioclave, :uservo, :uservoclave, :fechaini)");

  // Se enlazan los valores a los marcadores de posición en la sentencia SQL
  $stm->bindParam(":apaterno", $apaterno);
  $stm->bindParam(":amaterno", $amaterno);
  $stm->bindParam(":nombre", $nombre);
  $stm->bindParam(":email", $email);

  $stm->bindParam(":perfil", $perfil);
  $stm->bindParam(":servidor", $servidor);
  $stm->bindParam(":campus", $campus);

  $stm->bindParam(":caja", $caja);
  $stm->bindParam(":cajaclave", $cajaclave);
  $stm->bindParam(":uescritorio", $uescritorio);
  $stm->bindParam(":uescritorioclave", $uescritorioclave);
  $stm->bindParam(":uservo", $uservo);
  $stm->bindParam(":uservoclave", $uservoclave);
  $stm->bindParam(":fechaini", $fechaini);


  // Se ejecuta la sentencia SQL para insertar en la base de datos
  $stm->execute();

  header("Location: " . $_SERVER['REQUEST_URI']); // Se redirige a la página actual después de la inserción en la base de datos
  exit(); // Se sale del script
}
ob_end_clean(); // Limpia el búfer de salida
?>


<!-- Modal Create: Modal Bootstrap para agregar un usuario -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post"> <!-- Formulario de inserción de datos -->
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <!-- Campos de entrada para recopilar información del usuario -->
                <div class="form-group">
                  <label for="apaterno">Apellido Paterno</label>
                  <input type="text" class="form-control" name="apaterno" value="" id="apaterno" placeholder="">
                </div>
                <div class="form-group">
                  <label for="amaterno">Apellido Materno</label>
                  <input type="text" class="form-control" name="amaterno" value="" id="amaterno" placeholder="">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre(s)</label>
                  <input type="text" class="form-control" name="nombre" value="" id="nombre" placeholder="">
                </div>
                <div class="form-group">
                  <label for="email">Correo Electrónico</label>
                  <input type="text" class="form-control" name="email" value="@uva.edu.mx" id="email" placeholder="">
                </div>
              </div>
            </div>
            <hr>
            <!-- Campos adicionales -->
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="perfil">Perfil</label>
                  <select class="form-control" name="perfil" id="perfil">
                    <option value="SUPERVISOR">SUPERVISOR</option>
                    <option value="SISTEMAS">SISTEMAS</option>
                    <option value="FINANCIERO">FINANCIERO</option>
                    <option value="BECAS">BECAS</option>
                    <option value="ESCOLARES">ESCOLARES</option>
                    <option value="CAJERO">CAJERO</option>
                    <option value="AUDITORIA">AUDITORIA</option>
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="campus">Campus</label>
                  <select class="form-control" name="campus" id="campus">
                    <option value="ACUÑA">ACUÑA</option>
                    <option value="CAMPECHE">CAMPECHE</option>
                    <option value="CHETUMAL">CHETUMAL</option>
                    <option value="COLIMA">COLIMA</option>
                    <option value="DELICIAS">DELICIAS</option>
                    <option value="DURANGO">DURANGO</option>
                    <option value="ENSENADA">ENSENADA</option>
                    <option value="GUAYMAS">GUAYMAS</option>
                    <option value="HERMOSILLO">HERMOSILLO</option>
                    <option value="LÁZARO CÁRDENAS">LÁZARO CÁRDENAS</option>
                    <option value="MANZANILLO">MANZANILLO</option>
                    <option value="MEXICALI">MEXICALI</option>
                    <option value="MONCLOVA">MONCLOVA</option>
                    <option value="MORELIA">MORELIA</option>
                    <option value="NAVOJOA">NAVOJOA</option>
                    <option value="OBREGÓN">OBREGÓN</option>
                    <option value="PIEDRAS NEGRAS">PIEDRAS NEGRAS</option>
                    <option value="PLAYA DEL CARMEN">PLAYA DEL CARMEN</option>
                    <option value="PUERTO VALLARTA">PUERTO VALLARTA</option>
                    <option value="SALINA CRUZ">SALINA CRUZ</option>
                    <option value="SALTILLO">SALTILLO</option>
                    <option value="SAN LUIS RÍO COLORADO">SAN LUIS RÍO COLORADO</option>
                    <option value="TEPIC">TEPIC</option>
                    <option value="TIJUANA">TIJUANA</option>
                    <option value="TORREÓN">TORREÓN</option>
                    <option value="TULANCINGO">TULANCINGO</option>
                    <option value="URUAPAN">URUAPAN</option>
                    <option value="VICTORIA">VICTORIA</option>
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="servidor">Servidor</label>
                  <select class="form-control" name="servidor" id="servidor">
                    <option value="187.210.117.201">187.210.117.201</option>
                    <option value="187.210.117.202">187.210.117.202</option>
                    <option value="187.210.117.203">187.210.117.203</option>
                  </select>
                </div>
              </div>
            </div>

            <hr>

            <!-- Más campos de entrada -->
            <div class="row">
              <!-- Añade un identificador único al campo de entrada de caja -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="caja">Caja (01-30)</label>
                  <input type="number" class="form-control" name="caja" id="caja" placeholder="Número de Caja" min="1" max="30">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="cajaclave">Contraseña Caja</label>
                  <input type="password" class="form-control" name="cajaclave" value="" id="cajaclave" placeholder="Contraseña de la Caja">

                </div>
              </div>
            </div>

            <!-- Más campos de entrada -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="uescritorio">Usuario Escritorio</label>
                  <input type="text" class="form-control" name="uescritorio" value=" " id="uescritorio" placeholder="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="uescritorioclave">Contraseña Usuario Escritorio</label>
                  <input type="password" class="form-control" name="uescritorioclave" value="" id="uescritorioclave" placeholder="Contraseña de Escritorio Remoto">
                </div>
              </div>
            </div>

            <!-- Más campos de entrada -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="uservo">Usuario Servo</label>
                  <input type="text" class="form-control" name="uservo" value="  " id="uservo" placeholder="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="uservoclave">Contraseña Usuario Servo</label>
                  <input type="password" class="form-control" name="uservoclave" value="" id="uservoclave" placeholder="Contraseña de Servo">
                </div>
              </div>
            </div>

            <hr>

            <!-- Campos de fechas -->
            <div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="fechaini">Fecha Hoy</label>
      <input type="date" class="form-control" name="fechaini" value="" id="fechaini" readonly>
    </div>
  </div>
</div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  // JavaScript para establecer la fecha de hoy como valor predeterminado para fechaini
  document.addEventListener("DOMContentLoaded", function() {
    const today = new Date().toISOString().split("T")[0];
    document.getElementById("fechaini").value = today;


  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Obtén una referencia al elemento de selección del campus
    const campusSelect = document.getElementById("campus");

    // Obtén una referencia al elemento de selección del servidor
    const servidorSelect = document.getElementById("servidor");

    // Define un objeto que mapea cada campus a su servidor correspondiente
    const campusServidorMap = {
      "DURANGO": "187.210.117.202",
      "MANZANILLO": "187.210.117.202",
      "MEXICALI": "187.210.117.202",
      "MONCLOVA": "187.210.117.202",
      "MORELIA": "187.210.117.202",
      "NAVOJOA": "187.210.117.202",
      "OBREGÓN": "187.210.117.202",
      "PLAYA DEL CARMEN": "187.210.117.202",
      "PUERTO VALLARTA": "187.210.117.202",
      "TEPIC": "187.210.117.202",
      "TULANCINGO": "187.210.117.202",

      "ACUÑA": "187.210.117.201",
      "CAMPECHE": "187.210.117.201",
      "DELICIAS": "187.210.117.201",
      "PIEDRAS NEGRAS": "187.210.117.201",
      "SALTILLO": "187.210.117.201",

      "CHETUMAL": "187.210.117.203",
      "COLIMA": "187.210.117.203",
      "ENSENADA": "187.210.117.203",
      "GUAYMAS": "187.210.117.203",
      "HERMOSILLO": "187.210.117.203",
      "LÁZARO CÁRDENAS": "187.210.117.203",
      "SALINA CRUZ": "187.210.117.203",
      "SAN LUIS RÍO COLORADO": "187.210.117.203",
      "TIJUANA": "187.210.117.203",
      "TORREÓN": "187.210.117.203",
      "URUAPAN": "187.210.117.203",
      "VICTORIA": "187.210.117.203", 
      "N/L": "", // Deja este en blanco o establece un valor predeterminado
    };


    // Agrega un evento de cambio al elemento de selección del campus
    campusSelect.addEventListener("change", function() {
      // Obtiene el campus seleccionado
      const selectedCampus = campusSelect.value;

      // Verifica si hay un mapeo de servidor para el campus seleccionado
      if (campusServidorMap[selectedCampus]) {
        // Actualiza el valor del servidor en el elemento de selección del servidor
        servidorSelect.value = campusServidorMap[selectedCampus];
      } else {
        // Si el campus no tiene un servidor asociado, puedes dejarlo en blanco o establecer un valor predeterminado
        servidorSelect.value = "";
      }
    });
  });
</script>

<!-- JavaScript para generar contraseñas automáticas -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Obtiene una referencia a los elementos de las casillas de contraseñas
    const cajaclaveInput = document.getElementById("cajaclave");
    const uescritorioclaveInput = document.getElementById("uescritorioclave");
    const uservoclaveInput = document.getElementById("uservoclave");

    // Agrega eventos de clic a las casillas de contraseñas
    cajaclaveInput.addEventListener("click", function() {
      const generatedPassword = generatePassword();
      cajaclaveInput.value = generatedPassword;
    });

    uescritorioclaveInput.addEventListener("click", function() {
      const generatedPassword = generatePassword();
      uescritorioclaveInput.value = generatedPassword;
    });

    uservoclaveInput.addEventListener("click", function() {
      const generatedPassword = generatePassword();
      uservoclaveInput.value = generatedPassword;
    });

    // Función para generar una contraseña aleatoria
    function generatePassword() {
      const characters = "ABCDEFGHJKMNPQRSTWXYZacdefghjkmnpqrstvwxyz123456789";
      const passwordLength = 6;
      let password = "";

      for (let i = 0; i < passwordLength; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        password += characters.charAt(randomIndex);
      }

      return password;
    }
  });
</script>

<script>
  // JavaScript para formatear el valor del campo 'caja'
  document.addEventListener("DOMContentLoaded", function() {
    const cajaInput = document.getElementById("caja");

    // Agrega un evento al formulario para escuchar cuando se envía
    document.querySelector("form").addEventListener("submit", function(event) {
      const cajaValue = cajaInput.value.trim();

      // Formatea el valor de 'caja' agregando un cero antes si es un número de un solo dígito
      if (/^\d$/.test(cajaValue)) {
        cajaInput.value = cajaValue.padStart(2, '0');
      }
    });
  });
</script>

<!-- JavaScript para convertir a mayúsculas los campos de entrada -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Obtén referencias a los campos de entrada relevantes
    const apaternoInput = document.getElementById("apaterno");
    const amaternoInput = document.getElementById("amaterno");
    const nombreInput = document.getElementById("nombre");
    const uescritorioInput = document.getElementById("uescritorio");
    const uservoInput = document.getElementById("uservo");

    // Agrega eventos de cambio a los campos de entrada
    apaternoInput.addEventListener("input", function() {
      this.value = this.value.toUpperCase();
    });

    amaternoInput.addEventListener("input", function() {
      this.value = this.value.toUpperCase();
    });

    nombreInput.addEventListener("input", function() {
      this.value = this.value.toUpperCase();
    });

    uescritorioInput.addEventListener("input", function() {
      this.value = this.value.toUpperCase();
    });

    uservoInput.addEventListener("input", function() {
      this.value = this.value.toUpperCase();
    });
  });
</script>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Obtén referencias a los campos de entrada relevantes
    const cajaInput = document.getElementById("caja");
    const cajaclaveInput = document.getElementById("cajaclave");
    const uescritorioclaveInput = document.getElementById("uescritorioclave");
    const uservoclaveInput = document.getElementById("uservoclave");

    // Agrega un evento al campo 'caja' para escuchar cuando cambie
    cajaInput.addEventListener("change", function() {
      // Obtén el valor del campo 'caja'
      const cajaValue = this.value;

      // Genera contraseñas automáticamente
      const generatedPassword = generatePassword();

      // Rellena los campos correspondientes con los valores generados

      cajaclaveInput.value = generatedPassword;
      uescritorioclaveInput.value = generatedPassword;
      uservoclaveInput.value = generatedPassword;
    });

    // Función para generar una contraseña aleatoria
    function generatePassword() {
      const characters = "ABCDEFGHJKMNPQRSTWXYZacdefghjkmnpqrstvwxyz123456789";
      const passwordLength = 6;
      let password = "";

      for (let i = 0; i < passwordLength; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        password += characters.charAt(randomIndex);
      }

      return password;
    }
  });
</script>
<script>
  // Generar usuario escritorio remoto y usuario Servo
  document.addEventListener("DOMContentLoaded", function() {
    // Obtén referencias a los campos de entrada
    const apaternoInput = document.getElementById("apaterno");
    const amaternoInput = document.getElementById("amaterno");
    const nombreInput = document.getElementById("nombre");
    const uescritorioInput = document.getElementById("uescritorio");
    const uservoInput = document.getElementById("uservo");
    const cajaInput = document.getElementById("caja"); // Agrega referencia al campo "caja"

    // Función para generar el nombre de usuario
    function generarUsuario() {
      const apaternoValue = apaternoInput.value.trim();
      const amaternoValue = amaternoInput.value.trim();
      const nombreValue = nombreInput.value.trim();

      // Verifica si hay valores en apaterno, amaterno y nombre
      if (apaternoValue !== "" && amaternoValue !== "" && nombreValue !== "") {
        // Genera el nombre de usuario según Inicial del primer apellido, nombre y última letra de apellido materno
        const primeraLetraApaterno = apaternoValue.charAt(0);
        const ultimaLetraAmaterno = amaternoValue.charAt(amaternoValue.length - 1);
        const nombreUsuario = primeraLetraApaterno + nombreValue + ultimaLetraAmaterno;

        // Establece el nombre de usuario en los campos 'uescritorio' y 'uservo'
        uescritorioInput.value = nombreUsuario;
        uservoInput.value = nombreUsuario;
      } else {
        // Si falta información, muestra un mensaje de error.
        alert("Por favor, complete los campos 'Apellido Paterno', 'Apellido Materno' y 'Nombre' antes de generar el usuario.");
      }
    }

    // Agrega un evento al campo 'caja' para escuchar cuando cambie
    cajaInput.addEventListener("change", generarUsuario);
  });
</script>
