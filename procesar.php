<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<<?php 
$conexion = mysqli_connect("localhost", "root", "", "basecompostando");

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$email = mysqli_real_escape_string($conexion, $_POST['correo']);
$procedencia = mysqli_real_escape_string($conexion, $_POST['procedencia']);
$ubicacion = mysqli_real_escape_string($conexion, $_POST['ubicacion']);
$tipo = mysqli_real_escape_string($conexion, $_POST['tipo']);
$fecha = mysqli_real_escape_string($conexion, $_POST['fecha']);

$materiales = isset($_POST['materiales']) ? implode(", ", $_POST['materiales']) : "";
$materiales = mysqli_real_escape_string($conexion, $materiales);

$consulta = "INSERT INTO usuarios (nombre, email, procedencia, ubicacion, tipo, materiales, fecha)
             VALUES ('$nombre', '$email', '$procedencia', '$ubicacion', '$tipo', '$materiales', '$fecha')";

if (mysqli_query($conexion, $consulta)) {
    echo "<script>alert('✅ Datos guardados correctamente.'); window.location.href='CSSInicio(1).html';</script>";
} else {
    echo "❌ Error al guardar los datos: " . mysqli_error($conexion);
}

mysqli_close($conexion);
 ?>
</body>
</html>