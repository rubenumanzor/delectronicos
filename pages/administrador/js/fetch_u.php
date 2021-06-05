<?PHP
     include_once('../../../config/conexion.php');
     $qry = "select * from usuarios";
     $cons = mysqli_query($conexion,$qry);
     $res = mysqli_num_rows($cons);
     if($res>0){
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
     }
?>
