<?PHP
     session_start();
     if(!isset($_SESSION['vsID'])){
          header('location:../../pages/404.php');
     }

     if($_SESSION['vsTipoU']!='2'){
         header('location:../../pages/404.php');
     }
?>
<?PHP header('Content-Type: text/html; charset=UTF-8');
      include('../componentes/header_u.html');
      require('../../config/conexion.php');
      ?>

<div class="container mt-5 mb-5">
<?PHP $id_doc = $_GET['id'];
    $query = "select * from documentos inner join autores on documentos.id_autor = autores.id_autor inner join categorias on documentos.id_categoria = categorias.id_categoria where id_documento='$id_doc'";
     $res = mysqli_query($conexion,$query);
     while($data = mysqli_fetch_array($res)){
?> 
<embed src="../../resources//library/<?PHP echo trim($data['nom_doc']);?>" width="100%" height="600" alt="pdf" >
</div>
<?PHP }?>

<?PHP include '../componentes/footer_2.html';?>