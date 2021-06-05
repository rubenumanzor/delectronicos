<?PHP
    require('../../config/conexion.php');
    $id = $_GET['id_usuarios'];
    $nom = $_POST['nombre'];
    $ape = $_POST['apellido'];
    $nick = $_POST['nickname'];
    $corr = $_POST['correo'];
    $rol = $_POST['tipo'];
    $clave = $_POST['contra'];
    $qry = "update usuarios set nombres='$nom', apellidos='$ape', nickname='$nick', email='$corr', contra='$clave', id_rol='$rol' where id_usuario='$id'";
    $res = mysqli_query($conexion,$qry);
    if($res){
        echo "<script type='text/javascript'>window.close();</script>";
    }
    else{
        echo "<script type='text/javascript'>window.close();</script>";
    }
?>