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

     <div class="row text-center">
           <div class="col">
            <img src="../../resources/administrador/Numero de personas.png" width="150px" class="img-fluid" alt="Responsive image">
           <h3>Numero de personas registradas</h3><h4 class="text-center text-primary"><?PHP $sql = "SELECT COUNT(*) total FROM usuarios";
    $result = mysqli_query($conexion,$sql);
    $fila = mysqli_fetch_assoc($result);
    echo $fila['total'];?></h4>
           </div>
           <div class="col mt-4">
           <img src="../../resources/administrador/cantidad de documentos.png" width="110px" class="img-fluid mb-3" alt="Responsive image">
           <h3>Cantidad de documentos registrados</h3><h4 class="text-center text-primary"><?PHP  $sql = "SELECT COUNT(*) total FROM documentos";
    $result = mysqli_query($conexion,$sql);
    $fila = mysqli_fetch_assoc($result);
    echo $fila['total'];?></h4>
                 </div>
                 <div class="col">
                 <img src="../../resources/administrador/vistas al sitio web.png" width="150px" class="img-fluid" alt="Responsive image">
                 <h3>Identificador de dirección IP que usa</h3><h4 class="text-center text-primary"><?PHP echo $_SERVER['REMOTE_ADDR'];?></h4>
                 </div>
             </div>

     <div class="container mt-5">
     <div class="row text-center">
           <div class="col">
           <img src="../../resources/administrador/uso del servidor.png" width="150px" class="img-fluid" alt="Responsive image">
           <p class="text-center text-primary"><b> <?php echo php_uname();?><br>OS Server: <?PHP
echo PHP_OS;?><br>PHP version: <?PHP echo phpversion();?></b></p>
           </div>
           <div class="col">
           <img src="../../resources/administrador/msj.png" width="250px" class="img-fluid" alt="Responsive image">
           <h3>Cantidad de comentarios total</h3><h4 class="text-center text-primary">Undefine</h4>
                 </div>
                 <div class="col">
                 <img src="../../resources/administrador/db.png" width="150px" class="img-fluid" alt="Responsive image">
                 <h3>Tamaño de la base de datos</h3><h4 class="text-center text-primary">9.26 MB</h4>
                 </div>
     </div>
     </div>
     </div>

<?PHP include '../componentes/footer_2.html';?>