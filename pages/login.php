<?PHP header('Content-Type: text/html; charset=UTF-8');
      include('componentes/header_2.html'); ?>
    
    <div class="container mb-5 mt-5" style="width: 60%;">
    <div class="card">
  <h5 class="card-header"><b>StrokeDOC</b></h5>
  <div class="card-body">
    
    <div class="col text-center">
         <img src="../resources/images/deal.png" width="170px" class="img-fluid" alt="Responsive image">
         
         <h5 class="card-title text-primary"><b>Inicia sesión en StrokeDOC</b></h5>
         </div>
    <form action="mantenimiento/check.php" method="POST">
  <div class="form-group">
    <label for="correo">Dirección de correo electrónico</label>
    <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp" autocomplete="off" required>
    <small id="emailHelp" class="form-text text-muted">Ingresa tu correo electrónico.</small>
  </div>
  <div class="form-group">
    <label for="clave">Clave de acceso</label>
    <input type="password" class="form-control" id="clave" name="clave" aria-describedby="emailHelp2" required>
    <small id="emailHelp2" class="form-text text-muted">Ingresa tu clave de acceso.</small>
  </div>
  <div class="form-group ">
  <a class="text-center" href="../pages/registro.php">¿Aún no estas registrado?</a>
  </div>
  <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
</form>
   
  </div>
</div>
    </div>

<?PHP include 'componentes/footer_2.html';?>