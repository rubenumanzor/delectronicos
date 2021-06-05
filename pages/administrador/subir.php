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
<?PHP
if (isset($_POST['subir'])) {
  $nombre = $_FILES['archivo']['name'];
  $tipo = $_FILES['archivo']['type'];
  $tamanio = $_FILES['archivo']['size'];
  $ruta = $_FILES['archivo']['tmp_name'];
  $destino = "../../resources/library/" . $nombre;
  $foto=$_FILES['imagen']["name"];
  $rut=$_FILES['imagen']["tmp_name"];
  $dest = "../../resources/images/".$foto;

  if ($nombre != "") {
      if (copy($ruta, $destino)) {
          copy($rut,$dest);
          $titulo= $_POST['titulo'];
          $tipo= $_POST['tipo'];
          $idioma= $_POST['idioma'];
          $autor= $_POST['autor'];
          $fecha_p= $_POST['fecha_p'];
          $descri= $_POST['descripcion'];
          $categoria= $_POST['categoria'];
          $editorial= $_POST['editorial'];   
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
            //Insercion en la tabla documentos
          $sql = "INSERT INTO documentos(nombre,tipo,idioma,id_autor,fecha_ingreso,Descripcion,id_categoria,editorial,tamano,tipo_doc,nom_doc,ruta_image) VALUES('$titulo','$tipo','$idioma','$id_autor','$fecha_p','$descri','$id_categoria','$editorial','$tamanio','$tipo','$nombre',' $foto')";
          $query = mysqli_query($conexion, $sql);  
          if($query){
              echo "<script type='text/javascript'>alert('Exito al subir el documento');</script>";
          }
      } else {
          echo "<script type='text/javascript'>alert('Error al subir el documento');</script>";
      }
  }
}

?>

<div class="container mt-5 mb-5" style="width: 70%;">
   <form action="" method="POST" enctype="multipart/form-data">
      <div class="row">
         <div class="col text-center">
         <img src="../../resources/images/upload-cloud.png" width="250px" class="img-fluid" alt="Responsive image"><br><br>
         <h4>Subir documento</h4>
         </div>
      </div>
      <div class="row">
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Titulo</label>
    <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="emailHelp"  autocomplete="off" placeholder="Ingresa el titulo del documento" >

  </div>
        </div>
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Tipo de documento</label>
    <select class="custom-select" id="tipo" name="tipo">
    <option selected>Elegir...</option>
    <option value="libro">Libro</option>
    <option value="documento">Documento</option>
    <option value="revista">Revista</option>
  </select>
  </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Idioma</label>
    <select class="custom-select" id="idioma" name="idioma">
    <option selected>Elegir...</option>
    <option value="ingles">Inglés</option>
    <option value="español">Español</option>
    <option value="portugues">Portugues</option>
    <option value="frances">Francés</option>
    <option value="ruso">Ruso</option>
    <option value="mandarin">Mandarín</option>
    <option value="japones">Japonés</option>
  </select>
    
  </div>
        </div>
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Autor</label>
    <input type="text" class="form-control" name="autor" id="autor" placeholder="Ingresa el autor/autores del documento" aria-describedby="emailHelp" autocomplete="off">
  </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Fecha de publicación</label>
    <input type="date" class="form-control" name="fecha_p" id="fecha_p" aria-describedby="emailHelp">
  </div>
        </div>
        <div class="col">
        <div class="form-group">
    <label for="exampleInputEmail1">Categoría</label>
    <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Especifica la categoria del documento" aria-describedby="emailHelp">
    
  </div>
        </div>
      </div>
      <div class="row">
          <div class="col">
          <label for="exampleInputEmail1">Editorial</label>
              <input type="text" class="form-control" name="editorial" id="editorial" placeholder="Especifica la editorial del documento" aria-describedby="emailHelp">
          </div>
          <div class="col"></div>
      </div>
      <br>
      <div class="row">
          <div class="col">
              <label for="">Ruta del documento</label>
              <input type="file" class="form-control" id="ruta" name="archivo">
          </div>
      </div>
      <div class="row mt-3">
          <div class="col">
              <label for="">Sube la imagen de portada</label>
              <input type="file" class="form-control" id="imagen" name="imagen">
          </div>
      </div>
      <div class="row mt-3">
<div class="col">
    <label for="">Descripción del documento</label>
    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
</div>

      </div>     
      <div class="row mt-4">
       <div class="col">
       
       <button type="submit" name="subir" value="subir" class="btn btn-info">Enviar</button>
       <button type="reset" class="btn btn-dark">Cancelar</button>
       
       </div>
      </div>
      </form>
   </div>
<?PHP include '../componentes/footer_2.html';?>