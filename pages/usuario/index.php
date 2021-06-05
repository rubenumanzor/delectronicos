<?PHP
session_start();
if (!isset($_SESSION['vsID'])) {
    header('location:../../pages/404.php');
}

if ($_SESSION['vsTipoU'] != '2') {
    header('location:../../pages/404.php');
}
?>
<?PHP header('Content-Type: text/html; charset=UTF-8');
include('../componentes/header_u.html');
require('../../config/conexion.php');
?>

<script type="text/javascript" src="../../assets/js/app.js"></script>
<div class="container mt-5 mb-5">
    <br>
    <div class="row">
        <div class="col text-center">
            <h3 class="mb-3">Disfruta de lo más nuevo <?PHP echo  $_SESSION['vsNombres']; ?></h3><br><br>
        </div>
        <div class="col-12">
            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <!-- Primer carousel-->
                    <div class="carousel-item active">
                        <div class="row">
                            <?PHP
                            $qry = "select *from documentos limit 4";
                            $cons = mysqli_query($conexion, $qry);
                            while ($data = mysqli_fetch_array($cons)) {
                            ?>
                                <div class='col-md-3 mb-3'>
                                    <div class='card'>
                                        <a href="preview.php?id=<?php echo $data['id_documento'] ?>"><img class='img-fluid mx-auto d-block' src="../../resources/images/<?PHP echo trim($data['ruta_image']); ?>" style='height: 300px; width:260px;'></a>
                                    </div>
                                </div>
                            <?PHP   } ?>
                        </div>
                        <!-- Fin carousel-->
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <?PHP
                            $qry = "select *from documentos limit 4 offset 4";
                            $cons = mysqli_query($conexion, $qry);
                            while ($data = mysqli_fetch_array($cons)) {
                            ?>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <a href="preview.php?id=<?php echo $data['id_documento'] ?>"><img class='img-fluid mx-auto d-block' src="../../resources/images/<?PHP echo trim($data['ruta_image']); ?>" style='height: 300px; width:260px;'></a>
                                    </div>
                                </div>
                            <?PHP   } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?PHP include '../componentes/footer_2.html'; ?>