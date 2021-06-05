<?PHP
    session_start();
    include('conexion.php');

    //Comprobamos que no esten null y que no esten vacios los inputs
    if(isset($_POST['text_email']) && $_POST['text_email'] != '' && isset($_POST['text_clave']) && $_POST['text_clave'] != ''){
        $email = trim($_POST['text_email']);
        $pass = trim($_POST['text_clave']);

        if($email != "" && $pass != ""){
            try{
                $qry = "SELECT * FROM `usuarios` WHERE `email`=:correo AND `pass`=:contra";
                $stmt = $conn->prepare($qry);
                $stmt->bindParam('email',$email,PDO::PARAM_STR);
                $stmt->bindValue('pass',$pass,PDO::PARAM_STR);
                $stmt->execute();

                $count = $stmt->rowCount();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if($count == 1 && !empty($row)){
                    /* Significa que el usuario y clave son correctas aqui va el header y se asignan las variables de session */
                }
                else{
                    echo "Invalid";
                }
            }
            catch (PDOException $e) {
                echo "Error : ".$e->getMessage();
            }
        }
        else{
            echo "Campos vacios!";
        }
    }
?>