<?php
session_start();

$login=$_POST['login'];
$passw=$_POST['pass'];


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
//ACCESO PARA LOGIN
if(!empty($_POST['login']) && !empty($_POST['pass'])){
    $sql="SELECT * FROM usuarios WHERE login = ? AND passwd = ? ";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ss",$login,$passw);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_bind_result($stmt,$login,$passw);
    while(mysqli_stmt_fetch($stmt)){
        $registros[]=array('login'=>$login,
                            'passwd'=>$passw);
    }
    
    
    if(mysqli_stmt_num_rows($stmt)){
        $_SESSION['login'] = $login;
        
        
        //echo $_SESSION['login'];
        header("Location: toodo.php");
    }
}
//echo 'CONNEXION REALIZADA';
mysqli_stmt_close($stmt);
mysqli_close($conn);



?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <div class="col-md-4">
        <section class="login-form">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <h1>¡Hola de nuevo!</h1>
            <label>Indica tú nombre de usuario</label><br>
            <input type="text" name="login" class="form-control input-lg"/><br><br>
            <label>Indica la contraseña</label><br>
            <input type="password" name="pass" class="form-control input-lg"/><br><br>
            <input type="submit" name='enviar' value="Iniciar sesión" class="btn btn-lg btn-primary btn-block"/>
        </div>
        </form>
        </section>
<script src="static/js/bootstrap.js"></script>  
    </body>
</html>