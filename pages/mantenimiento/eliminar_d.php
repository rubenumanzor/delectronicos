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
       

       $iddocumento = $_GET['id'];
       $query_delete = mysqli_query($conexion, "DELETE FROM documentos WHERE id_documento = '$iddocumento' ");

       if($query_delete){
                 echo "<script type='text/javascript'>alert('se ha Eliminado con Exito');
                 window.location='../administrador/adm_doc.php' </script>";

       }else{
                 echo "<script type='text/javascript'>alert('Error al Eliminar');
                 window.location='../administrador/adm_doc.php' </script>";
       }
?>
