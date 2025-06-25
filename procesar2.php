<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>conecta base</title>
</head>
<body>
<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "basecompostando");

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Obtener datos del formulario
$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$edad = (int) $_POST['edad'];
$correo = mysqli_real_escape_string($conexion, $_POST['correo']);
$telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
$localizacion = mysqli_real_escape_string($conexion, $_POST['localizacion']);

// Insertar en la tabla usuario2
$sql = "INSERT INTO usuario2 (nombre, edad, correo, telefono, localizacion)
        VALUES ('$nombre', $edad, '$correo', '$telefono', '$localizacion')";

if (mysqli_query($conexion, $sql)) {
    echo "<script>alert('✅ Registro exitoso.'); window.location.href='CSSInicio(1).html';</script>";
} else {
    echo "❌ Error al registrar los datos: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>

</body>
</html>