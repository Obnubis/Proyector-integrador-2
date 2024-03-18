<?php

include 'Base_Datos/crea_tabla.php';
session_start();
$conexion = getConexion();
$id_medico = $_SESSION['id_medico'];
echo $id_medico;


// Preparar la consulta SQL
$sql = "SELECT curriculum FROM medico WHERE id_medico = ?";
$stmt = $conexion->prepare($sql);

// Asociar el parámetro
$stmt->bind_param("s", $id_medico);

// Ejecutar la consulta
$stmt->execute();

// Vincular el resultado
$stmt->bind_result($contenido_archivo);

// Obtener el resultado
$stmt->fetch();

// Configurar las cabeceras para la descarga
// Configurar las cabeceras para la descarga
header("Content-type: application/pdf");  // Ajusta el tipo MIME según tus necesidades
header("Content-Disposition: attachment; filename=archivo_descargado.pdf");

echo $contenido_archivo;

// Cerrar la conexión y liberar recursos
$stmt->close();
$conexion->close();
?>

