<?php
$host = "localhost"; // o 127.0.0.1
$usuario = "NY004US00001";
$contrasena = "bM3!llK1{";
$bd = "codigoambulanciabd";

$conn = new mysqli($host, $usuario, $contrasena, $bd);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'] ?? 'Anónimo';
$mensaje = $_POST['mensaje'] ?? '';

if (!empty($mensaje)) {
    $stmt = $conn->prepare("INSERT INTO comentarios (nombre, mensaje) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $mensaje);
    $stmt->execute();
    $stmt->close();
    echo "Comentario guardado correctamente.<br><a href='foro.html'>Volver al foro</a>";
} else {
    echo "El mensaje está vacío.<br><a href='foro.html'>Volver</a>";
}

$conn->close();
header("Location: foro.html");
exit();

?>
