<?PHP
     session_start();
     if(!isset($_SESSION['vsID'])){
          header('location:../../pages/404.php');
     }
     if($_SESSION['vsTipoU']!='1'){
         header('location:../../pages/404.php');
     }
     header('Content-Type: text/html; charset=UTF-8');
     include('../componentes/header_a.html'); 
     require('../../config/conexion.php');
     $id = $_GET['id_usuarios'];
?>
<div class="container mt-4">
     <h3 class="text-center">Modificar usuario</h3>
    <hr>
    <div class="container mt-5 mb-5" style="width: 70%;">
    <?PHP
        $sql = "select * from usuarios where id_usuario='$id'";
        $cons = mysqli_query($conexion,$sql);
        $fila = mysqli_fetch_array($cons);
    ?>
    <form action="actualizar_ad_user.php?id_usuarios=<?PHP echo $fila['id_usuario'];?>" method="POST">
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
    <label for="exampleInputEmail1">Tipo</label>
<select class="custom-select" id="tipo" name="tipo">
<?PHP if($fila['id_rol']==1){
             echo "<option value='1'>Administrador</option>";
             echo "<option value='2'>Normal</option>";
         }else{
            echo "<option value='2'>Normal</option>";
            echo "<option value='1'>Administrador</option>";
         }?> 
  </select>
</div>
</div>
          <div class="col"><div class="form-group">
    <label for="exampleInputEmail1">Contraseña</label>
    <input type="text" class="form-control" name="contra" id="contra" aria-describedby="emailHelp"  autocomplete="off" value="<?PHP echo $fila['contra'];?>" placeholder="Ingresa tu nueva contraseña">

  </div></div>
    </div>
    <div class="row mt-4">
       <div class="col">
       
       <button type="submit" class="btn btn-info">Modificar</button>
       <button class="btn btn-dark" onclick="cerrar()">Cancelar</a>
       
       </div>
      </div>
      </form>
     </div>
     </div>
     <script type="text/javascript">
function cerrar(){
		window.close();
	}
</script>
<?PHP include('../componentes/footer_2.html'); ?>