<?php
// Configurações do banco de dados
$servername = "localhost"; // Servidor MySQL
$username = "root"; // Nome de usuário do MySQL
$password = ""; // Senha do MySQL
$dbname = "escola"; // Nome do banco de dados

// Criando conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificando se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing da senha
    $disciplina = $_POST['subject'];

    // SQL para inserir os dados
    $sql = "INSERT INTO professores (nome, email, senha, disciplina) VALUES (?, ?, ?, ?)";

    // Preparando e executando a consulta SQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $email, $senha, $disciplina);

    if ($stmt->execute()) {
        // Redireciona para a página horario.html após o cadastro bem-sucedido
        header("Location: horario.html");
        exit(); // Garante que o código PHP pare de ser executado após o redirecionamento
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    // Fechando a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>
