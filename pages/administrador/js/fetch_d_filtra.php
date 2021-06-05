<?PHP
     include('../../../config/conexion.php');
     $tipo = $_POST['tipo'];
     $idioma = $_POST['idioma'];
     $categoria = $_POST['categoria'];

     if($tipo!=''){
         if($idioma!=''){
              if($categoria!=''){
                $qry = "SELECT * FROM documentos d INNER JOIN categorias cat ON d.id_categoria=cat.id_categoria INNER JOIN autores aut ON d.id_autor=aut.id_autor WHERE d.tipo='$tipo' AND d.idioma='$idioma' AND d.id_categoria='$categoria'";
              }
              else{ 
                $qry = "SELECT * FROM documentos d INNER JOIN categorias cat ON d.id_categoria=cat.id_categoria INNER JOIN autores aut ON d.id_autor=aut.id_autor WHERE d.tipo='$tipo' AND d.idioma='$idioma'";
              }
         }
         else{
             if($categoria!=''){
                $qry = "SELECT * FROM documentos d INNER JOIN categorias cat ON d.id_categoria=cat.id_categoria INNER JOIN autores aut ON d.id_autor=aut.id_autor WHERE d.tipo='$tipo' AND d.id_categoria='$categoria'";
             }
             else{
                $qry = "SELECT * FROM documentos d INNER JOIN categorias cat ON d.id_categoria=cat.id_categoria INNER JOIN autores aut ON d.id_autor=aut.id_autor WHERE d.tipo='$tipo'";
             }
         }
     }
     else{
        if($idioma!=''){
            if($categoria!=''){
               $qry = "SELECT * FROM documentos d INNER JOIN categorias cat ON d.id_categoria=cat.id_categoria INNER JOIN autores aut ON d.id_autor=aut.id_autor WHERE d.idioma='$idioma' AND d.id_categoria='$categoria'";
            }
            else{
               $qry = "SELECT * FROM documentos d INNER JOIN categorias cat ON d.id_categoria=cat.id_categoria INNER JOIN autores aut ON d.id_autor=aut.id_autor WHERE d.idioma='$idioma'";
            } 
        }
        else{
            if($categoria!=''){
               $qry = "SELECT * FROM documentos d INNER JOIN categorias cat ON d.id_categoria=cat.id_categoria INNER JOIN autores aut ON d.id_autor=aut.id_autor WHERE d.id_categoria='$categoria'";
            }
            else{
               $qry = "select * from documentos inner join categorias on documentos.id_categoria=categorias.id_categoria inner join autores on documentos.id_autor=autores.id_autor";
            }
        }
     }

     $cons = mysqli_query($conexion,$qry);
     $res = mysqli_num_rows($cons);
     if($res>0){
         while($data=mysqli_fetch_array($cons)){ ?>
         <tr>
            <th scope="row"><?PHP echo $data['id_documento'];?></th>
            <td><?PHP echo $data['nombre'];?></td>
            <td><label class="text-capitalize"><?PHP echo $data['tipo'];?></label></td>
            <td><label class="text-capitalize"><?PHP echo $data['idioma'];?></label></td>
            <td><?PHP echo $data['fecha_ingreso'];?></td>
            <td><?PHP echo $data['editorial'];?></td>
            <td><?PHP echo $data['categoria'];?></td>
            <td><?PHP echo $data['autor_name'];?></td>
         </tr>
<?PHP    }
     }
?>
