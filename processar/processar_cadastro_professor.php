<?php
$conn = new mysqli('localhost', 'root', '', 'escola');

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome = $_POST['nome'];

$sql = "INSERT INTO professores (nome) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nome);

if ($stmt->execute()) {
    header("Location: cadastrar_disciplina.php"); // Redireciona para a página de cadastro de disciplinas
    exit();
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
