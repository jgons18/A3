<?php
//echo 'bienvenido';
session_start();

$host='172.17.0.2';
$user='root';
$pass='linuxlinux';
$db='A3';

$tasca =$_POST['descripcion'];
$data = date("Y/m/d");
$pendiente=1;
$id_user = $_SESSION['id_user'];
//echo $id_user;

//connexio a base de dades
//$conn= conecta_bd($host, $user, $pass, $db);
$conn = mysqli_connect($host,$user,$pass, $db);
if(!$conn){
    echo "Error: ".mysqli_connect_error();
    exit;
}else{
    //echo 'Conexión correcta';
}

if( isset($_POST['submit']) ){
    
    if(!empty($_POST['descripcion'])){
        $sql="INSERT INTO todo_tasks (descripcion,pendiente,fecha,usuarios_id_user) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"sisi",$tasca,$pendiente,$data,$id_user);
        mysqli_stmt_execute($stmt);
        $nuevo_id_task = mysqli_insert_id($conn);

        $_SESSION['id_task']=$nuevo_id_task;
        //echo $_SESSION['id_task'];
        
       /*DEPURACIÓN PARA SABER QUE CONTIEN LA VARIABLE 
            print_r($tasca);
            die;*/
        
    }else{
        echo 'no has afegit res a la tasca <br>';
    }

}
mysqli_stmt_close($stmt);
mysqli_close($conn);




?>

<html lang="en">
    <head>
        <title>title</title>
        <link rel="stylesheet" href="/static/css/bootstrap.min.css">
        <link rel="stylesheet" href="/static/css/boostrap-theme.css">
    </head>
    <style>
        .selector-for-some-widget {
            box-sizing: content-box;
          }
    </style>
    <body>
        <?php
        echo "Benvingut/a " . $_SESSION['login'];
        ?>
        <h1>Les meves tasques</h1><br><br>
        <h4>Afegir nova tasca</h4><br>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="text" name="descripcion" class="form-control input-lg"/><br><br>
            <input type="submit" name='submit' value="Afegir tasca" class="btn btn-lg btn-primary btn-block"/> <br><br>

            <h4>Tasques pendents</h4><br>
            
            <?php
                $result = mysql_query("SELECT id_task,descripcion FROM todo_tasks WHERE usuarios_id_user =".$id_user);
                echo "<table border = '1'> \n";
                echo "<tr><td>Id de la tasca</td><td>Descripcio</td></tr> \n";
                while($row = mysql_fetch_row($result)){
                   
                    echo "<tr><td>$row[0]</td><td>$row[1]</td></tr> \n";
                    
                }
                echo "</table> \n";
                
            ?>
            
            <h4>Eliminar tasca</h4>
            <label>Indica el id de la tasca a eliminar</label>
            <input type="number" name="tasca_id" class="form-control input-lg"/><br><br>
            <input type="submit" name='submit2' value="Eliminar tasca" class="btn btn-lg btn-primary btn-block"/> <br><br>
            <?php
                $id_tarea=$_POST['tasca_id'];
            
                if( isset($_POST['submit2']) ){

                    if(!empty($_POST['tasca_id'])){
                        $sql2="DELETE FROM todo_tasks WHERE id_task=".$id_tarea;
                        $stmt2 = mysqli_prepare($conn,$sql2);
                        mysqli_stmt_bind_param($stmt2,"i",$id_tarea);
                        mysqli_stmt_execute($stmt2);
                        

                    }

                }
             
                ?>
            
        </form>
        
        
        
<script src="static/js/bootstrap.js"></script>
    </body>
</html>


