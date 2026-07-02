<?php
$host = "localhost"; // o 127.0.0.1
$usuario = "NY004US00001";
$contrasena = "bM3!llK1{";
$bd = "codigoambulanciabd";

$conn = new mysqli($host, $usuario, $contrasena, $bd);
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

$comentario_id = $_POST['comentario_id'] ?? 0;
$nombre = $_POST['nombre'] ?? 'Anónimo';
$mensaje = $_POST['mensaje'] ?? '';

if ($mensaje !== '' && $comentario_id > 0) {
  $stmt = $conn->prepare("INSERT INTO respuestas (comentario_id, nombre, mensaje) VALUES (?, ?, ?)");
  $stmt->bind_param("iss", $comentario_id, $nombre, $mensaje);
  $stmt->execute();
  $stmt->close();
  echo "Respuesta guardada";
} else {
  echo "Faltan datos";
}

$conn->close();
header("Location: foro.html");
exit();

?>
