<?php
if (empty($_POST['user'])||empty($_POST['pass'])) {
    echo "<script language = 'JavaScript'> alert('EXISTEN CAMPOS VACIOS'); 
    window.location.href=\"index.php\"</script>";
}else{
        $user = $_POST['user'];
        $pass = $_POST['pass'];
    
        $mostrar=fopen("empleados.txt",'r');
        $contador = 0;
        while(!feof($mostrar))
        {
        $id= substr(fgets($mostrar), 0, -1);
        $nombre= substr(fgets($mostrar), 0, -1);
        $genero= substr(fgets($mostrar), 0, -1);
        $tipo= substr(fgets($mostrar), 0, -1);
        $salario= substr(fgets($mostrar), 0, -1);
        $usuario= substr(fgets($mostrar), 0, -1);
        $contrasena=fgets($mostrar);
        $imagen=substr(fgets($mostrar), 0, -1);
            if($id!=""){
                    if($usuario == $user && $contrasena == $pass){
                        $contador++;

                        session_start(); 
                        //Guardamos dos variables de sesión que nos auxiliará para saber si se está o no "logueado" un usuario 
                        $_SESSION['usuario'] = "SIP";
                        $_SESSION['idusuario'] = $id;
                        $_SESSION['usuarioactual'] = $nombre;
                        //$_SESSION['salario'] = $salario;
                        //Nombre del usuario loggeado. 
                        //Direccionamos a nuestra página principal del sistema. 
                        header ("Location: index.php");
                        break;
                    }
                    }
                }
                fclose($mostrar);
                if ($contador > 0) {
                    
                }else{
                    echo"<script>alert('El usuario no existe.'); window.location.href=\"index.php\"</script>";
                }
}

?>