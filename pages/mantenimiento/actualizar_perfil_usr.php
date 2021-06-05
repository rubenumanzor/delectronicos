<?PHP
    require('../../config/conexion.php');
    $id = $_GET['id_usuarios'];
    $nom = $_POST['nombre'];
    $ape = $_POST['apellido'];
    $nick = $_POST['nickname'];
    $corr = $_POST['correo'];
    $clave = $_POST['contra'];
    $qry = "update usuarios set nombres='$nom', apellidos='$ape', nickname='$nick', email='$corr', contra='$clave' where id_usuario='$id'";
    $res = mysqli_query($conexion,$qry);
    if($res){
        echo "<script type='text/javascript'>alert('Se ha actualizado su perfil correctamente');
                 window.location='../usuario/adm_cuenta.php' </script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Error al actualizar');
                 window.location='../usuario/adm_cuenta.php' </script>";
    }
?>