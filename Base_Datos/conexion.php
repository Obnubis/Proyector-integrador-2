<?php 
//Crear el Base de datos para MENTE en un funcion getConexion(). 

$servidor = "localhost";
$usuario = "root";
$password = "";
$conexion = mysqli_connect($servidor, $usuario, $password) or die("Error de conexión");
//Establecer la conexión 
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
    
}else {
}

$verificar_bd = "SHOW DATABASES LIKE 'menteAtenta'";
$resultado = mysqli_query($conexion,$verificar_bd);
//Para ver si la base de datos existes 
if(mysqli_num_rows($resultado)>0){
    getConexion();
}
else {
    //Crear base de datos
    $crear = "CREATE DATABASE menteAtenta";
    if(mysqli_query($conexion,$crear)){
    }
    else {
        echo "Error en base de datos".mysqli_error($conexion);
    }
}



//Crear la BD menteAtenta en un funcion getConexion(). 
function getConexion(){

$servidor = "localhost";
$usuario = "root";
$password = "";
$database ="menteAtenta";
$conexion = mysqli_connect($servidor, $usuario, $password,$database) or die("Error de conexión");
//Establecer la conexión 
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
    
}else {
}
    return $conexion;
}
?>

