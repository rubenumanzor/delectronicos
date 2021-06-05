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
      include("../../config/conexion.php"); 
      ?>

<?php

if(!empty($_POST))
{
  $alert='';
  if(empty($_POST['nombre']) || empty($_POST['tipo']) || empty($_POST['idioma']) || empty($_POST['fecha_ingreso']) || empty($_POST['Descripcion']) || empty($_POST['editorial']))
  {
    echo "<script type='text/javascript'>alert('Uno o mas  campos estan vacios');
          window.location='../administrador/adm_doc.php' </script>";
   }else{
   
      $iddocumento = $_POST["iddocumento"];
      $nombre = $_POST['nombre'];
      $tipo = $_POST["tipo"] ;
      $idioma = $_POST["idioma"];

      $autor = $_POST["nombrea"];

      $fecha = $_POST["fecha_ingreso"];
      $descripcion = $_POST["Descripcion"];

      $categoria = $_POST["categorias"];

      $editorial = $_POST["editorial"];

        //Comprobar duplicados autores
        $dupa = "select * from autores where autor_name='$autor'";
        $dupa_qry = mysqli_query($conexion,$dupa);
        $fila = mysqli_fetch_array($dupa_qry);
        if($fila['autor_name']==$autor){
            $id_autor = $fila['id_autor'];
        }else{
          //Insertar autores
          $sql_autor = "insert into autores(autor_name) values('$autor');";
          $qry_autor = mysqli_query($conexion,$sql_autor);
          $id_autor = mysqli_insert_id($conexion);
        }
        //Comprobar duplicados categoria
        $ducat = "select * from categorias where categoria='$categoria'";
        $ducat_qry = mysqli_query($conexion,$ducat);
        $fila2 = mysqli_fetch_array($ducat_qry);
        if($fila2['categoria']==$categoria){
          $id_categoria = $fila2['id_categoria'];
        }else{
        //Insertar categoria
        $sql_categoria = "insert into categorias(categoria) values('$categoria');";
        $qry_categoria = mysqli_query($conexion,$sql_categoria);
        $id_categoria = mysqli_insert_id($conexion);
        }

      $sql_update = mysqli_query($conexion, "UPDATE documentos
                                                SET nombre = '$nombre' ,tipo = '$tipo', idioma = '$idioma', id_autor = '$id_autor' ,fecha_ingreso = '$fecha', Descripcion = '$descripcion',id_categoria = '$id_categoria', editorial= '$editorial'
                                                WHERE id_documento = $iddocumento ");

        if($sql_update){
        echo "<script type='text/javascript'>alert('Se ha Actualizado con exito');
         window.location='../administrador/adm_doc.php' </script>";
        }else{
        echo "<script type='text/javascript'>alert('Eror al Actualizar');
         window.location='../administrador/adm_doc.php' </script>";
        }
    }

}
//===============================================================================================================
     if (empty($_GET['id']))
     {
     header('location: ../pages/administrador/adm_doc.php');
      }
      $iddocumento = $_GET['id'];
      $consulta = mysqli_query($conexion,"SELECT * FROM documentos INNER JOIN autores ON documentos.id_autor = autores.id_autor INNER JOIN categorias ON documentos.id_categoria = categorias.id_categoria WHERE id_documento = $iddocumento");
                                       
     $result_sql = mysqli_num_rows($consulta);
   
     if($result_sql == 0){
      header('location: ../pages/administrador/adm_doc.php');
     }else{
       $option = '';
         while($data = mysqli_fetch_array($consulta)) {

            $iddocumento = $data["id_documento"];
            $nombre = $data["nombre"];
            $tipo = $data["tipo"] ;
            $idioma = $data["idioma"];
            $id_autor = $data["autor_name"];
            $fecha = $data["fecha_ingreso"];
            $descripcion = $data["Descripcion"];
            $id_categoria = $data["categoria"];
            $editorial = $data["editorial"];

       }
     }
?>
<div class="container mt-5 mb-5" style="width: 70%;">
   <form action="" method="POST" enctype="multipart/form-data">
      <div class="row">
      <input type="hidden" name="iddocumento" value="<?php echo $iddocumento;?>">
         <div class="col text-center">
         <img src="../../resources/images/upload-cloud.png" width="250px" class="img-fluid" alt="Responsive image"><br><br>
         <h4>Modificar documento</h4>
         </div>
      </div>
      <div class="row">
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Titulo</label>
    <input type="text" value="<?php echo $nombre;?>" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp"  autocomplete="off" placeholder="Ingresa el titulo del documento" >

  </div>
        </div> 
        <div class="col">
        <div class="form-group">
        <label for="exampleInputEmail1">Tipo de documento</label>
    <input readonly type="text" value="<?php echo $tipo;?>" class="form-control" name="tipo" id="tipo" aria-describedby="emailHelp" autocomplete="off">
  </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
        <div class="form-group">
        <label for="exampleInputEmail1">Idioma</label>
    <input type="text" value="<?php echo $idioma;?>" class="form-control" name="idioma" id="idioma"  aria-describedby="emailHelp" autocomplete="off">
  </div>
        </div>
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Autor</label>
    <input type="text" value="<?php echo $id_autor;?>" class="form-control" name="nombrea" id="nombrea" aria-describedby="emailHelp" autocomplete="off">
  </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Fecha de publicación</label>
    <input type="date" value="<?php echo $fecha;?>" class="form-control" name="fecha_ingreso" id="fecha_ingreso" aria-describedby="emailHelp">
  </div>
        </div>
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Categoría</label>
    <input readonly type="text" value="<?php echo $id_categoria;?>" class="form-control" name="categorias" id="categorias"aria-describedby="emailHelp">
    
  </div>
        </div>
      </div>
      <div class="row">
          <div class="col">
          <label for="exampleInputEmail1">Editorial</label>
              <input type="text" value="<?php echo $editorial;?>" class="form-control" name="editorial" id="editorial" aria-describedby="emailHelp">
          </div>
          <div class="col"></div>
      </div>
      <br>
      <div class="row">
          <div class="col">
          </div>
      </div>
      <div class="row">
<div class="col">
    <label for="">Descripción del documento</label>
    <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3"><?php echo $descripcion;?></textarea>
</div>

      </div >     
      <div class="row mt-4" align="center">
       <div class="col">
       
       <button type="submit" name="subir" value="subir" class="btn btn-info">Actualizar</button>
       <button type="reset" onclick="location.href='../administrador/adm_doc.php'"class="btn btn-dark">Regresar</button>
       
       </div>
      </div>
      </form>
   </div>