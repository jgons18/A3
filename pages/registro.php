<?php
session_start();

$nombre=$_POST['name'];
$apellidos = $_POST['apellidos'];
$login=$_POST['login'];
$passw= $_POST['pass'];
$edad = $_POST['edad'];


$host='172.17.0.2';
$user='root';
$pass='linuxlinux';
$db='A3';
//connexio a base de dades
//$conn= conecta_bd($host, $user, $pass, $db);
$conn = mysqli_connect($host,$user,$pass, $db);
if(!$conn){
    echo "Error: ".mysqli_connect_error();
    exit;
}else{
    //echo 'Conexión correcta';
}
//ACCESO DE REGISTRO
if(!empty($_POST['name']) && !empty($_POST['apellidos']) && !empty($_POST['login']) && !empty($_POST['pass']) && !empty($_POST['edad']) ){
    $sql="INSERT INTO usuarios (nombre,apellidos,login,passwd,edad) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"sssss",$nombre,$apellidos,$login,$passw,$edad);
    mysqli_stmt_execute($stmt);
    $nuevo_id = mysqli_insert_id($conn);
    
    $_SESSION['id_user']=$nuevo_id;
    
    //echo $_SESSION['id_user'];
    echo ' Benvingut';
}
mysqli_stmt_close($pre);
mysqli_close($conn);
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/static/css/bootstrap.min.css">     
        <link rel="stylesheet" href="/static/css/boostrap-theme.css">
        <style>
        .selector-for-some-widget {
            box-sizing: content-box;
          }
        </style>
    </head>
    <body>
        
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <div>
                    <h1>¿Eres nuevo? ¡Regístrate!</h1>
                    <label>Indica tú nombre</label><br>
                    <input type="text" name="name"/><br>
                    <label>Indica tus apellidos</label><br>
                    <input type="text" name="apellidos"/><br>
                   <label>Indica tú nombre de usuario</label><br>
                    <input type="text" name="login"/><br>
                    <label>Indica la contraseña</label><br>
                    <input type="password" name="pass"/><br>
                    <label>Indica la edad</label><br>
                    <input type="text" name="edad"/><br><br>
                    <input type="submit" name='enviar2' value="Registrarse"/>
                </div>
            </div>
        </form>
<script src="static/js/bootstrap.js"></script> 
    </body>
</html>