<?php
$conn = new mysqli('localhost', 'root', '', 'escola');

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$professor_id = $_POST['professor_id'];

$sql = "INSERT INTO disciplinas (nome, professor_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $nome, $professor_id);

if ($stmt->execute()) {
    header("Location: cadastrar_horario.php"); // Redireciona para a página de cadastro de horários
    exit();
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
