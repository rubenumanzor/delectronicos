<?PHP session_start();
    require('../../config/conexion.php');
    $nom = $_POST['nombre'];
    $ape = $_POST['apellidos'];
    $usr = $_POST['usuario'];
    $cor = $_POST['correo'];
    $contra = $_POST['contra'];
    $qry = "insert into usuarios(nombres, apellidos, nickname, email, contra, id_rol) values('$nom','$ape','$usr','$cor','$contra',2)";
    $res = mysqli_query($conexion,$qry);
    if($res){
        echo "<script>alert('Se ha registrado correctamente');
        window.location='../login.php';</script>";
    }
    else{
        echo "<script>alert('ERROR: No se ha registrado');
        window.location='../registro.php';</script>";
    }?>