<?php
include('A3/pages/toodo.php');
include('A3/pages/login.php');
include ('A3/pages/registro.php');

if($_POST['signup']){
    header("Location: /pages/registro.php");
}
if($_POST['login']){
    header("Location: /pages/login.php");
}

?>

<html lang="en">
    <head><title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/boostrap-theme.css">
    <style>
        .selector-for-some-widget {
            box-sizing: content-box;
          }
          body{
              text-align: center;
          }
    </style>
    </head>
    
    <body>
        <h1>Acceso usuarios</h1>
        <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
            <input type="submit" value="REGISTRARSE" name="signup"></input><br<br>
            <input type="submit" value="LOGIN" name="login"></input><br<br>
        </form>
       
        
        <script src="static/js/bootstrap.js"></script>
    </body>  
</html>