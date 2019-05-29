<?php
session_start();
if(isset($_POST['usuario'])  and isset($_POST['contraseña'])){
    $con=mysqli_connect("localhost","root","","examen");
    mysqli_query($con, "SET CHARACTER SET utf8");
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    $sql="SELECT usuario, contraseña, rol FROM usuarios ";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($res)){
        if($row['usuario']=="$usuario" and $row['contraseña']=="$contraseña"){
            
            $rol=$row['rol'];
            $_SESSION['user']="$usuario";
            $_SESSION['rol']="$rol";
            if($row['rol']=="ADMIN"){                
                header('Location: admin.php');
            }elseif($row['rol']=="CLIENTE"){                
                header('Location: cliente.php');
            }
            
        }else{
            header('Location: ../index.php?error_message=usuario o clave incorrectos');
        }
    }
   
}else{
    header('Location: ../index.php');
}