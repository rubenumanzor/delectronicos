<?PHP header('Content-Type: text/html; charset=UTF-8');
      include('componentes/header_2.html'); 
      require('../config/conexion.php');
      ?>

    <div class="container mt-4">
    <h3>Explora según tu interés <span class="badge badge-secondary">New</span></h3>
    <hr>
</div>

<div id="opciones" class="container" style="display: block;">
<div class="row">
<div class="col">
      <?PHP      
                $qry = "select * from categorias limit 4";
                $cons = mysqli_query($conexion,$qry);
                while($data = mysqli_fetch_array($cons)){
       ?>
       <a class="text-decoration-none" href="../pages/busqueda.php?id=<?php echo $data['id_categoria'];?>&categoria=<?php echo $data['categoria'];?>"><h5 class="text-primary"><?PHP echo $data['categoria']?></h5></a><br>
     <?PHP }?>
</div>
<div class="col">
      <?PHP      
                $qry = "select * from categorias limit 4 offset 4";
                $cons = mysqli_query($conexion,$qry);
                while($data = mysqli_fetch_array($cons)){
       ?>
       <a class="text-decoration-none" href="../pages/busqueda.php?id=<?php echo $data['id_categoria'];?>&categoria=<?php echo $data['categoria'];?>"><h5 class="text-primary"><?PHP echo $data['categoria']?></h5></a><br>
     <?PHP }?>
</div>
<div class="col">
      <?PHP      
                $qry = "select * from categorias limit 4 offset 8";
                $cons = mysqli_query($conexion,$qry);
                while($data = mysqli_fetch_array($cons)){
       ?>
       <a class="text-decoration-none" href="../pages/busqueda.php?id=<?php echo $data['id_categoria'];?>&categoria=<?php echo $data['categoria'];?>"><h5 class="text-primary"><?PHP echo $data['categoria']?></h5></a><br>
     <?PHP }?>
</div>
</div>
</div>

<?PHP include 'componentes/footer_2.html';?>