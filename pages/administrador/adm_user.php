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
?>
   <div class="container mt-5 mb-5">
       <h3>Administración de cuentas</h3><br>
       <table class="table table-bordered ">
  <thead>
    <tr class="bg-dark text-light">
      <th scope="col">ID</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Nickname</th>
      <th scope="col">Email</th>
      <th scope="col">Tipo</th>
      <th colspan="2" scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?PHP 
    $sql = "select * from usuarios";
    $cons = mysqli_query($conexion,$sql);
    $res = mysqli_num_rows($cons);
    while($data = mysqli_fetch_array($cons)){
?>  
    <tr>  
      <th scope="row"><?php echo $data["id_usuario"] ?></th>
      <td><?php echo $data["nombres"];?></td>
      <td><?php echo $data["apellidos"];?></td>
      <td><?php echo $data["nickname"];?></td>
      <td><?php echo $data["email"];?></td>
      <td><?PHP if($data['id_rol']==1){
             echo "<label class='text-primary'><b>Administrador</b></label>";
         }else{
             echo "<label class='text-warning'><b>Normal</b></label>";
         }?></td>
      <td><button class="btn btn-info" onclick="modificar('<?php echo $data['id_usuario']; ?>');">Modificar</button></td>
      <td><button class="btn btn-danger" onclick="confirmar('<?php echo $data['id_usuario']; ?>','<?php echo $data['nombres']; ?>');">Eliminar</button></td>
     
    </tr>
   <?PHP }?>
  </tbody>
</table>
   </div> 
   <script type="text/javascript">
	function confirmar(id,nombre){
		var mensaje = confirm('¿En Realidad desea borrar el usuario con la informacion?\n Nombre: '+nombre+'\n Para borrar presione Aceptar, en caso contrario presione Cancelar');
		if (mensaje) {
			window.location.href='../mantenimiento/eliminar_ad_user.php?id_usuarios='+id;
		}
		else{
			//alert("No Eliminado");
			return false;
		}
	}

	function modificar(id){
		var myWindow=window.open('../mantenimiento/modificar_ad_user.php?id_usuarios='+id);
	}

</script>
<?PHP include '../componentes/footer_2.html';?>