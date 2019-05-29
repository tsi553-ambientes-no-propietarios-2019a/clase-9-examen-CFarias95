<?php
session_start();
if($_POST['nombre'] and $_POST['usuario'] and $_POST['clave'] and $_POST['rol']){
    $clave1=$_POST['clave'];
    $clave2=$_POST['clave1'];
    $rol=$_POST['rol'];
    if($clave1 != $clave2){
        header('Location: registro.php?error_message=Las Claves no coinciden');
    }
    elseif($rol == "0"){
        header('Location: registro.php?error_message=seleccione un ROL');
    }
    else{
        $nombre=$_POST['nombre'];
        $usu=$_POST['usuario'];
        $con=mysqli_connect("localhost","root","","examen");
        mysqli_query($con, "SET CHARACTER SET utf8");
        $sql="INSERT INTO usuarios(nombre, usuario, contraseña, rol) values('$nombre', '$usu', '$clave1', '$rol')";
        $res=mysqli_query($con,$sql);

        if($res){            
            header('Location: ../index.php?error_message=Tienda registrada correctamente, puede iniciar sesión');
        }else{          
            
            header('Location: registro.php?error_message=No se pudo registrar la tienda');
        }
    }
}else{
    header('Location: ../index.php');
}