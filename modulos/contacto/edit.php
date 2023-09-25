<?php include("../../template/header.php"); ?>
<?php include("../../conexion.php");

if (isset($_GET['id'])) {
  $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
  $stm = $conexion->prepare("SELECT * FROM contactos WHERE id=:txtid");
  $stm->bindParam(":txtid", $txtid);
  $stm->execute();
  $registro = $stm->fetch(PDO::FETCH_LAZY);
  $apaterno = $registro['apaterno'];
  $amaterno = $registro['amaterno'];
  $nombre = $registro['nombre'];
  $email = $registro['email'];
  $perfil = $registro['perfil'];
  $campus = $registro['campus'];
  $servidor = $registro['servidor'];
  $caja = $registro['caja'];
  $cajaclave = $registro['cajaclave'];
  $uescritorio = $registro['uescritorio'];
  $uescritorioclave = $registro['uescritorioclave'];
  $uservo = $registro['uservo'];
  $uservoclave = $registro['uservoclave'];
  $fechaini = $registro['fechaini'];
}

if ($_POST) {

  $txtid = (isset($_POST['txtid']) ? $_POST['txtid'] : "");
  $apaterno = (isset($_POST['apaterno']) ? $_POST['apaterno'] : "");
  $amaterno = (isset($_POST['amaterno']) ? $_POST['amaterno'] : "");
  $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
  $email = (isset($_POST['email']) ? $_POST['email'] : "");
  $caja = (isset($_POST['caja']) ? $_POST['caja'] : "");
  $perfil = (isset($_POST['perfil']) ? $_POST['perfil'] : "");
  $campus = (isset($_POST['campus']) ? $_POST['campus'] : "");
  $servidor = (isset($_POST['servidor']) ? $_POST['servidor'] : "");
  $cajaclave = (isset($_POST['cajaclave']) ? $_POST['cajaclave'] : "");
  $uescritorio = (isset($_POST['uescritorio']) ? $_POST['uescritorio'] : "");
  $uescritorioclave = (isset($_POST['uescritorioclave']) ? $_POST['uescritorioclave'] : "");
  $uservo = (isset($_POST['uservo']) ? $_POST['uservo'] : "");
  $uservoclave = (isset($_POST['uservoclave']) ? $_POST['uservoclave'] : "");
  $fechaini = (isset($_POST['fechaini']) ? $_POST['fechaini'] : "");

  $stm = $conexion->prepare("UPDATE contactos SET apaterno=:apaterno, amaterno=:amaterno, nombre=:nombre, email=:email, perfil=:perfil, servidor=:servidor, campus=:campus, caja=:caja, cajaclave=:cajaclave, uescritorio=:uescritorio, uescritorioclave=:uescritorioclave, uservo=:uservo, uservoclave=:uservoclave, fechaini=:fechaini WHERE id=:txtid");
  $stm->bindParam(":apaterno", $apaterno);
  $stm->bindParam(":amaterno", $amaterno);
  $stm->bindParam(":nombre", $nombre);
  $stm->bindParam(":email", $email);
  $stm->bindParam(":perfil", $perfil);
  $stm->bindParam(":campus", $campus);
  $stm->bindParam(":servidor", $servidor);
  $stm->bindParam(":caja", $caja);
  $stm->bindParam(":cajaclave", $cajaclave);
  $stm->bindParam(":uescritorio", $uescritorio);
  $stm->bindParam(":uescritorioclave", $uescritorioclave);
  $stm->bindParam(":uservo", $uservo);
  $stm->bindParam(":uservoclave", $uservoclave);
  $stm->bindParam(":fechaini", $fechaini);

  $stm->bindParam(":txtid", $txtid);
  $stm->execute();

  header("location:index.php");
}
?>
<form action="" method="post">
  <input type="hidden" class="form-control" name="txtid" value="<?php echo $txtid; ?>" placeholder="hidden">

  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="apaterno">Apellido Paterno</label>
        <input type="text" class="form-control" name="apaterno" value="<?php echo $apaterno; ?>" id="apaterno" placeholder="Apellido Paterno">
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="amaterno">Apellido Materno</label>
        <input type="text" class="form-control" name="amaterno" value="<?php echo $amaterno; ?>" id="amaterno" placeholder="Apellido Materno">
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" id="nombre" placeholder="Nombre(s)">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="email">Correo Electrónico</label>
        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" id="email" placeholder="Correo Electrónico">
      </div>
    </div>
  </div>

  <hr>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="perfil">Perfil</label>
            <input type="text" class="form-control" name="perfil" value="<?php echo $perfil; ?>" id="perfil" placeholder="Perfil">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="servidor">Servidor</label>
            <input type="text" class="form-control" name="servidor" value="<?php echo $servidor; ?>" id="servidor" placeholder="Servidor">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="campus">Campus</label>
            <input type="text" class="form-control" name="campus" value="<?php echo $campus; ?>" id="campus" placeholder="Campus">
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="caja">Caja</label>
            <input type="text" class="form-control" name="caja" value="<?php echo $caja; ?>" id="caja" placeholder="No. Caja">
        </div>
    </div>

    <div class="col-md-6">
        <!-- Contraseña Caja -->
        <div class="form-group">
            <label for="cajaclave">Contraseña Caja</label>
            <input type="text" class="form-control" name="cajaclave" value="<?php echo $cajaclave; ?>" id="cajaclave" placeholder="Contraseña Caja">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="uescritorio">Usuario Escritorio</label>
            <input type="text" class="form-control" name="uescritorio" value="<?php echo $uescritorio; ?>" id="uescritorio" placeholder="Usuario Escritorio">
        </div>
    </div>

    <div class="col-md-6">
        <!-- Contraseña Escritorio -->
        <div class="form-group">
            <label for="uescritorioclave">Contraseña Escritorio</label>
            <input type="text" class="form-control" name="uescritorioclave" value="<?php echo $uescritorioclave; ?>" id="uescritorioclave" placeholder="Contraseña Escritorio">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="uservo">Usuario Servo</label>
            <input type="text" class="form-control" name="uservo" value="<?php echo $uservo; ?>" id="uservo" placeholder="Usuario Servo">
        </div>
    </div>

    <div class="col-md-6">
        <!-- Contraseña Servo Escolar -->
        <div class="form-group">
            <label for="uservoclave">Contraseña Servo Escolar</label>
            <input type="text" class="form-control" name="uservoclave" value="<?php echo $uservoclave; ?>" id="uservoclave" placeholder="Contraseña Servo Escolar">
        </div>
    </div>
</div>



  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="fechaini">Fecha Inicio</label>
        <input type="date" class="form-control" name="fechaini" value="<?php echo $fechaini; ?>" id="fechaini">
      </div>
    </div>

  <br>

  <div class="modal-footer">
    <a href="index.php" class="btn btn-danger">Cancelar</a>
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>

<script>
  // Función para cambiar el tipo de entrada de contraseña
  function togglePassword(targetId) {
    const passwordInput = document.getElementById(targetId);
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
    } else {
      passwordInput.type = 'password';
    }
  }

  // Agregar evento click a los botones para mostrar/ocultar contraseñas
  const toggleButtons = document.querySelectorAll('.toggle-password-button');
  toggleButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      const targetId = this.getAttribute('data-target');
      togglePassword(targetId);
    });
  });
</script>