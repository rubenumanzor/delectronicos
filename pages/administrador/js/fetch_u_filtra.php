<?PHP
     include_once('../../../config/conexion.php');
     $dato = $_POST['valor'];

     if($dato==""){
         echo "No has seleccionado nada";
     }else{
          $qry = "select * from usuarios where id_rol='$dato'";
     $cons = mysqli_query($conexion,$qry);
     
         while($data=mysqli_fetch_array($cons)){ ?>
         <tr>
            <th scope="row"><?PHP echo $data['id_usuario'];?></th>
            <td><?PHP echo $data['nombres'];?></td>
            <td><?PHP echo $data['apellidos'];?></td>
            <td><?PHP echo $data['nickname'];?></td>
            <td><?PHP echo $data['email'];?></td>
            <td><?PHP if($data['id_rol']==1){
                 echo 'Administrador';
            }else{
                 echo 'Normal';
            }?></td>
         </tr>
<?PHP    }
     
?>
 <?PHP    }  ?>


   