<?PHP header('Content-Type: text/html; charset=UTF-8');
      include('componentes/header_2.html'); ?>

   <div class="container mb-5" style="width: 70%;">
   <form action="mantenimiento/registro_c.php" method="POST">
      <div class="row">
         <div class="col text-center">
         <img src="../resources/images/registro.png" width="250px" class="img-fluid" alt="Responsive image">
         <h4>Regístrate con tu correo</h4>
         </div>
      </div>
      <div class="row">
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp"  autocomplete="off" required oninvalid="setCustomValidity('Campo requerido')">
    <small id="nombre" class="form-text text-muted">Digita tus nombres.</small>
  </div>
        </div>
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Apellidos</label>
    <input type="text" class="form-control" name="apellidos" id="apellidos" aria-describedby="emailHelp" autocomplete="off">
    <small id="apellidos" class="form-text text-muted">Digita tus apellidos.</small>
  </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Nickname o usuario</label>
    <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="emailHelp" autocomplete="off">
    <small id="usuario" class="form-text text-muted">Especifica tu usuario, podras ingresar con el.</small>
  </div>
        </div>
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Correo electronico</label>
    <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp" autocomplete="off">
    <small id="correo" class="form-text text-muted">Digita tu correo electronico para registrarte.</small>
  </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Contraseña</label>
    <input type="password" class="form-control" name="contra" id="contra" aria-describedby="emailHelp">
    <small id="contra" class="form-text text-muted">Define una contraseña.</small>
  </div>
        </div>
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Confirmar contraseña</label>
    <input type="password" class="form-control" name="contra2" id="contra2" aria-describedby="emailHelp">
    <small id="contra2" class="form-text text-muted">Vuelve a digitar tu contraseña.</small>
  </div>
        </div>
      </div>
      <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" required oninvalid="setCustomValidity('Debes aceptar los terminos y condiciones')"> 
  <label class="form-check-label" for="inlineCheckbox1">Acepto la <a href="">política y privacidad</a></label>
</div>
      <div class="row mt-4">
       <div class="col">
       
       <button type="submit" class="btn btn-info">Registrarse</button>
       <button type="reset" class="btn btn-dark">Cancelar</button>
       
       </div>
      </div>
      </form>
   </div>

   <?PHP include 'componentes/footer_2.html';?>