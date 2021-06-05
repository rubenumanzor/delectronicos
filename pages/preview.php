<?PHP header('Content-Type: text/html; charset=UTF-8');
      include('componentes/header_2.html'); 
      require('../config/conexion.php');
      ?>

    <div class="container mt-4">
    <h3>Empieza la lectura ahora! <span class="badge badge-secondary">New</span></h3>
    <hr>
</div>

<div id="resultado" class="container mt-5 mb-5" style="display:block; width:70%;">
<?PHP $id_doc = $_GET['id'];
    $query = "select * from documentos inner join autores on documentos.id_autor = autores.id_autor inner join categorias on documentos.id_categoria = categorias.id_categoria where id_documento='$id_doc'";
     $res = mysqli_query($conexion,$query);
     while($data = mysqli_fetch_array($res)){
?> 
<div class="row">
 <div class="col-md-3 mb-3">
    <div class="card">
    <img class='img-fluid mx-auto d-block' src="../resources/images/<?PHP echo trim($data['ruta_image']);?>" style='height: 300px; width:300px;'>
    </div>
  </div>
<div class="col">
    <div class="alert alert-warning" role="alert">
       <h4><b><?PHP echo $data['nombre'];?></b></h4>
    </div>
   <div class="ml-3">
       <label><b class="text-info">Tipo: </b><label class="text-capitalize"><?PHP echo $data['tipo'];?></label></label><br>
       <label><b class="text-info">Idioma: </b><label class="text-capitalize"><?PHP echo $data['idioma'];?></label></label><br>
       <label><b class="text-info">Autor: </b><label class="text-capitalize"><?PHP echo $data['autor_name'];?></label></label><br>
       <label><b class="text-info">Categoria: </b><label class="text-capitalize"><?PHP echo $data['categoria'];?></label></label><br>
       <label><b class="text-info">Editorial: </b><label class="text-capitalize"><?PHP echo $data['editorial'];?></label></label><br>
       <a class="link_edit" href="view.php?id=<?php echo $data['id_documento'] ?>"><button class="btn btn-info" >Ver ahora</button></a>
   </div>
</div>
</div>

<?PHP }?>
</div>

<?PHP include 'componentes/footer_2.html';?>