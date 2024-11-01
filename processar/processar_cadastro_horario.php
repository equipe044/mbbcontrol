<?php
$conn = new mysqli('localhost', 'root', '', 'escola');

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$disciplina_id = $_POST['disciplina_id'];
$dia_da_semana = $_POST['dia_da_semana'];
$horario = $_POST['horario'];

$sql = "INSERT INTO horarios (disciplina_id, dia_da_semana, horario) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $disciplina_id, $dia_da_semana, $horario);

if ($stmt->execute()) {
    header("Location: ../listar/listar_horarios.php"); // Redireciona para a página de listar horários
    exit();
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
