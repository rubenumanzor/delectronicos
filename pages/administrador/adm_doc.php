<?PHP
     session_start();
     if(!isset($_SESSION['vsID'])){
          header('location:../../pages/404.php');
     }

     if($_SESSION['vsTipoU']!='1'){
         header('location:../../pages/404.php');
     }
?>
<?PHP header('Content-Type: text/html; charset=UTF-8');
      include('../componentes/header_a.html');
      require('../../config/conexion.php');
      ?>

   <div class="container mt-5 mb-5">
       <h3>Administración de archivos</h3><br>
       <table class="table table-bordered table-sm">
  <thead>
    <tr class="bg-dark text-light">
      <th scope="col">ID</th>
      <th scope="col">Titulo</th>
      <th scope="col">Tipo</th>
      <th scope="col">Idioma</th>
      <th scope="col">Autor</th>
      <th scope="col">Fecha de ingreso</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Categoria</th>
      <th scope="col">Editorial</th>
      <th scope="col">Portada</th>
      <th colspan="2" scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?PHP 
         $qry = "SELECT * FROM documentos INNER JOIN autores ON documentos.id_autor = autores.id_autor INNER JOIN categorias ON documentos.id_categoria = categorias.id_categoria";
         $cons = mysqli_query($conexion,$qry);
         $res = mysqli_num_rows($cons);
         if($res>0){
           while($data=mysqli_fetch_array($cons)){
  ?>
    <tr>
      <th scope="row"><?PHP echo $data['id_documento'];?></th>
      <td><?PHP echo $data['nombre'];?></td>
      <td><label class="text-capitalize"><?PHP echo $data['tipo'];?></label></td>
      <td><label class="text-capitalize"><?PHP echo $data['idioma'];?></label></td>
      <td><?PHP echo $data['autor_name'];?></td>
      <td><?PHP echo $data['fecha_ingreso'];?></td>
      <td><?PHP echo $data['Descripcion'];?></td>
      <td><?PHP echo $data['categoria'];?></td>
      <td><?PHP echo $data['editorial'];?></td>
      <td><img src="../../resources/images/<?PHP echo trim($data['ruta_image']);?>" style="height: 100px; width:80px;"></td>
      <td><a class="link_edit" href="../mantenimiento/actualizar_d.php?id=<?php echo $data['id_documento'] ?>"><button class="btn btn-info" >Modificar</button></a></td>
      <td><a class="link_eliminar btn-danger" href="../mantenimiento/eliminar_d.php?id=<?php echo $data['id_documento'] ?>"><button class="btn btn-danger" >Eliminar</button></a></td>
    </tr>
<?PHP 
      }
    }
?>
  </tbody>
</table>
   </div> 

<?PHP include '../componentes/footer_2.html';?>