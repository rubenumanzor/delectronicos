<?PHP
     session_start();
     if(!isset($_SESSION['vsID'])){
          header('location:../../pages/404.php');
     }

     if($_SESSION['vsTipoU']!='1'){
         header('location:../../pages/404.php');
     }
     require('../../config/conexion.php');
     $id = $_GET['id_usuarios'];
     
     $qry = "delete from usuarios where id_usuario='$id'";
     $res = mysqli_query($conexion,$qry);
     if($res){
        echo "<script type='text/javascript'>alert('Exito al eliminar el usuario');</script>";
        header('location:../administrador/adm_user.php');
     }else
     {
        echo "<script type='text/javascript'>alert('Error al eliminar el usuario');</script>";
        header('location:../administrador/adm_user.php');
     }
?>