<?php
$host = "localhost"; // o 127.0.0.1
$usuario = "NY004US00001";
$contrasena = "bM3!llK1{";
$bd = "codigoambulanciabd";

$conn = new mysqli($host, $usuario, $contrasena, $bd);
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

$comentarios = $conn->query("SELECT * FROM comentarios ORDER BY fecha DESC");

while ($comentario = $comentarios->fetch_assoc()) {
  echo "<div class='comentario'>";
  echo "<strong>" . htmlspecialchars($comentario['nombre']) . "</strong>";
  echo "<p>" . htmlspecialchars($comentario['mensaje']) . "</p>";
  echo "<small>" . $comentario['fecha'] . "</small>";

  // Respuestas
  $id = $comentario['id'];
  $respuestas = $conn->query("SELECT * FROM respuestas WHERE comentario_id = $id ORDER BY fecha ASC");
  echo "<div class='respuestas'>";
  while ($r = $respuestas->fetch_assoc()) {
    echo "<div class='respuesta'>";
    echo "<strong>" . htmlspecialchars($r['nombre']) . "</strong>";
    echo "<p>" . htmlspecialchars($r['mensaje']) . "</p>";
    echo "<small>" . $r['fecha'] . "</small>";
    echo "</div>";
  }
  echo "</div>";

  // Formulario de respuesta
  echo "
    <form action='guardar_respuesta.php' method='POST' class='respuesta-form'>
      <input type='hidden' name='comentario_id' value='$id' />
      <input type='text' name='nombre' placeholder='Apodo (opcional)' />
      <textarea name='mensaje' placeholder='Responder...' required></textarea>
      <button class='enviar'>Responder</button>
    </form>
  ";

  echo "</div>";
}

$conn->close();
?>
