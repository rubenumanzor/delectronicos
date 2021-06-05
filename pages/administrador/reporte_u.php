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
include('../componentes/header_a.html'); ?>

<div class="container mt-5 mb-5" style="width: 80%;">
    <h3>Reporte de usuarios</h3>
    <hr>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tipo de usuario</label>
                    <select class="custom-select" id="tipo" name="tipo">
                        <option value="" selected>Elegir...</option>
                        <option value="1">Administrador</option>
                        <option value="2">Normal</option>
                    </select>

                </div>
            </div>
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
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Nick</th>
      <th scope="col">Correo</th>
      <th scope="col">Tipo</th>
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
       var valor = $('#tipo').val();

       $.ajax({
            type: "POST",
            url: "js/fetch_u_filtra.php",
            data: {valor:valor},
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
        url: 'js/fetch_u.php',
        success: function(response){
            $('#tbody2').html(response);
        }
    });
}

function imprimir() {
    window.print();
}

</script>