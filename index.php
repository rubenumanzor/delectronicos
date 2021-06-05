<?PHP header('Content-Type: text/html; charset=UTF-8');
      include('pages/componentes/header.html'); 
      require('config/conexion.php');
      ?>

<!--Jumbotron-->
    <div class="jumbotron jumbotron-fluid" >
            <div class="container">
                <h2>Desde aventuras hasta conocimiento!</h2>
            <p class="lead">Entretenimiento y conocimiento sin fin. Lea en cualquier momento, en cualquier lugar.</p>
            <hr class="my-4">
             <!-- Button trigger modal -->
             <a href="pages/login.php"><button type="button" class="btn btn-outline-primary btn-sm text-decoration-none" data-toggle="modal">
                  Inicia sesión
             </button></a>
</div>
</div>

<!--Carousel-->
<script type="text/javascript" src="assets/js/app.js"></script>
<div class="container mb-5">
    
    <div class="row">
        <div class="col text-center">
            <h3 class="mb-3">Agregado recientemente!</h3>
        </div>
        <div class="col-12">
            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

<div class="carousel-inner">
                <!-- Primer carousel-->
    <div class="carousel-item active">
        <div class="row">
             <?PHP      
                $qry = "select *from documentos order by fecha_ingreso desc limit 4";
                $cons = mysqli_query($conexion,$qry);
                while($data = mysqli_fetch_array($cons)){
             ?>
                    <div class='col-md-3 mb-3'>
                        <div class='card'>
                        <a href="pages/preview.php?id=<?php echo $data['id_documento'] ?>"><img class='img-fluid mx-auto d-block' src="resources/images/<?PHP echo trim($data['ruta_image']);?>" style='height: 300px; width:260px;'></a>
                        </div>
                    </div>
                    <?PHP   }?> 
        </div>
                <!-- Fin carousel-->
    </div>
    <div class="carousel-item">
<div class="row">
            <?PHP      
                $qry = "select *from documentos order by fecha_ingreso desc limit 4 offset 4";
                $cons = mysqli_query($conexion,$qry);
                while($data = mysqli_fetch_array($cons)){
             ?>
<div class="col-md-3 mb-3">
    <div class="card">  
    <a href="pages/preview.php?id=<?php echo $data['id_documento'] ?>"><img class='img-fluid mx-auto d-block' src="resources/images/<?PHP echo trim($data['ruta_image']);?>" style='height: 300px; width:260px;'></a>
    </div>
</div>
<?PHP   }?> 
</div>
</div>


</div>
</div>
</div>
</div>
</div>
    
<?PHP include 'pages/componentes/footer.html';?>