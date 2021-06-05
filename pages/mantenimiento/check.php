<?PHP
     session_start();
     require('../../config/conexion.php');

     $correo = $_POST['correo'];
     $clave = $_POST['clave'];

     $qry = "select * from usuarios where email = '$correo' and contra = '$clave'";
     $res = mysqli_query($conexion,$qry);

     $existe = mysqli_num_rows($res);

     if($existe>0){
           $usuario = mysqli_fetch_array($res);

           $_SESSION['vsID'] = $usuario['id_usuario'];
           $_SESSION['vsNombres'] = $usuario['nombres'];
           $_SESSION['vsApellidos'] = $usuario['apellidos'];
           $_SESSION['vsNickname'] = $usuario['nickname'];
           $_SESSION['vsCorreo'] = $usuario['email'];
           $_SESSION['vsTipoU'] = $usuario['id_rol'];

           if($usuario['id_rol']=='1'){
                header('location:../administrador/index.php');
           }
           else{
                header('location:../usuario/index.php');
           }

     }
     else{
        echo "<script type='text/javascript'>alert('Correo o clave incorrectos!');
                 window.location='../login.php' </script>";
     }
?>
