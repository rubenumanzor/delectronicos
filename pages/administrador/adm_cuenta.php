<?PHP
     session_start();
     require('../../config/conexion.php');
     if(!isset($_SESSION['vsID'])){
          header('location:../../pages/404.php');
     }

     if($_SESSION['vsTipoU']!='1'){
         header('location:../../pages/404.php');
     }
?>
<?PHP header('Content-Type: text/html; charset=UTF-8');
      include('../componentes/header_a.html'); ?>

<div class="container mt-4">
     <h3>Administra tu cuenta</h3>
    <hr>
    <div class="container mt-5 mb-5" style="width: 70%;">
<?PHP $id_user = $_SESSION['vsID'];
     $qry = "select * from usuarios where id_usuario='$id_user'";
     $res = mysqli_query($conexion,$qry);
     while($fila = mysqli_fetch_array($res)){
?>  
   <form action="../mantenimiento/actualizar_perfil_adm.php?id_usuarios=<?PHP echo $fila['id_usuario'];?>" method="POST">
    <div class="row">
         <div class="col text-center">
         <img src="../../resources/images/login.png" width="150px" class="img-fluid" alt="Responsive image"><br><br>

         </div>
      </div>
    <div class="row">
          <div class="col">
          <div class="form-group">
    <label for="exampleInputEmail1">Nombres</label>
    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp"  autocomplete="off" value="<?PHP echo $fila['nombres'];?>" placeholder="Ingresa el nombre a cambiar" required oninvalid="setCustomValidity('Campo requerido')">

  </div>
          </div>
          <div class="col">
          <div class="form-group">
    <label for="exampleInputEmail1">Apellidos</label>
    <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="emailHelp"  autocomplete="off" value="<?PHP echo $fila['apellidos'];?>" placeholder="Ingresa el apellido a cambiar" required oninvalid="setCustomValidity('Campo requerido')">

  </div>
          </div>
    </div>
    <div class="row">
          <div class="col"><div class="form-group">
    <label for="exampleInputEmail1">Nickname</label>
    <input type="text" class="form-control" name="nickname" id="nickname" aria-describedby="emailHelp"  autocomplete="off" value="<?PHP echo $fila['nickname'];?>" placeholder="Ingresa el nuevo nickname" required oninvalid="setCustomValidity('Campo requerido')">
</div>
</div>
          <div class="col"><div class="form-group">
    <label for="exampleInputEmail1">Correo</label>
    <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp"  autocomplete="off" value="<?PHP echo $fila['email'];?>" placeholder="Ingresa el nuevo correo" required oninvalid="setCustomValidity('Campo requerido')">

  </div></div>
    </div>
    <div class="row">
          <div class="col"><div class="form-group">
    <label for="exampleInputEmail1">Contraseña</label>
    <input type="text" class="form-control" name="contra" id="contra" aria-describedby="emailHelp"  autocomplete="off" value="<?PHP echo $fila['contra'];?>" placeholder="Ingresa tu nueva contraseña" required oninvalid="setCustomValidity('Campo requerido')">
</div>
</div>
          <div class="col"><div class="form-group">
    <label for="exampleInputEmail1">Confirmar contraseña</label>
    <input type="text" class="form-control" name="contra2" id="contra2" aria-describedby="emailHelp"  autocomplete="off" value="<?PHP echo $fila['contra'];?>" placeholder="Confirma tu nueva contraseña" required oninvalid="setCustomValidity('Campo requerido')">

  </div></div>
    </div>
    <div class="row mt-4">
       <div class="col">
       
       <button type="submit" class="btn btn-info">Modificar</button>
       <button type="reset" class="btn btn-dark">Cancelar</button>
       </div>
      </div>
  <?PHP }?>    
      </form>


     </div>
     </div>

     <?PHP include '../componentes/footer_2.html';?>