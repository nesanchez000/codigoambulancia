<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $comentario = strip_tags($_POST['comentario']);
  $comentario = substr($comentario, 0, 500); // por seguridad
  $comentario = str_replace(["\n", "\r"], "", $comentario); // evita saltos
  $comentario .= " | " . date("d/m/Y H:i") . "\n";

  file_put_contents('comentarios.txt', $comentario, FILE_APPEND);
}
header("Location: foro.html");
exit();
?>
