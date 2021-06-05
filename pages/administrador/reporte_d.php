<?PHP
session_start();
if (!isset($_SESSION['vsID'])) {
    header('location:../../pages/404.php');
}

if ($_SESSION['vsTipoU'] != '1') {
    header('location:../../pages/404.php');
}
?>
<?PHP header('Content-Type: text/html; charset=UTF-8');
include('../componentes/header_a.html'); 
require('../../config/conexion.php');
?>

<div class="container mt-5 mb-5" style="width: 80%;">
    <h3>Reporte de documentos</h3>
    <hr>
    <form action="">
        <div class="row" method="POST">
            <div class="col">
                <div class="form-group">
                    <label for="example1">Tipo</label>
                    <select class="custom-select" id="tipo" name="tipo">
                        <option value="">Elegir...</option>
                        <option value="libro">Libro</option>
                        <option value="documento">Documento</option>
                        <option value="revista">Revista</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Idioma</label>
                    <select class="custom-select" id="idioma" name="idioma">
                        <option value="">Elegir...</option>
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
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Categoria</label>
                    <select class="custom-select" id="categoria" name="categoria">
                        <option value="">Elegir...</option>
                        <?PHP 
                            $qry = "select * from categorias";
                            $cons = mysqli_query($conexion,$qry);
                            $res = mysqli_num_rows($cons);
                            if($res>0){
                                while($data=mysqli_fetch_array($cons)){ ?>
                                 <option value="<?PHP echo $data['id_categoria'];?>"><?PHP echo $data['categoria'];?></option>
                        <?PHP        }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col"></div>
        </div>

        <div class="row">
            <div class="col">
                <button type="button" id="consultar" class="btn btn-info">Consultar</button>
                <input type="button" class="btn btn-dark" value="Recargar" onclick="javascript:window.location.reload();"/>
            </div>
        </div>
    </form>
   
    <div class="tabla_reporte d-block mt-3">
    <table class="table table-sm">
  <thead>
    <tr class="bg-info text-light">
      <th scope="col">ID</th>
      <th scope="col">Titulo</th>
      <th scope="col">Tipo</th>
      <th scope="col">Idioma</th>
      <th scope="col">Fecha ingreso</th>
      <th scope="col">Editorial</th>
      <th scope="col">Categoria</th>
      <th scope="col">Autor</th>
    </tr>
  </thead>
  <tbody id="tbody2">
  </tbody>
  <tbody id="tbody3">
  </tbody>
</table>
        <button type="button" class="btn btn-success" onclick="imprimir();">Imprimir</button>  
    </div>

</div>

<?PHP include '../componentes/footer_2.html'; ?>
<script>
$(document).ready(function(){
   fetch();
   //Consulta
   $('#consultar').click(function(){
       var tipo = $('#tipo').val();
       var idioma = $('#idioma').val();
       var categoria = $('#categoria').val();

       $.ajax({
            type: "POST",
            url: "js/fetch_d_filtra.php",
            data: {tipo:tipo,idioma:idioma,categoria:categoria},
            success: function(response){
                $('#tbody3').html(response);
                $('#tbody2').hide();
                $('#tbody3').show();
            }
        });

    });
});

function fetch(){
	$.ajax({
        method: 'POST',
        url: 'js/fetch_d.php',
        success: function(response){
            $('#tbody2').html(response);
        }
    });
}

function imprimir() {
    window.print();
}

</script>