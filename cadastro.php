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
    $dia_da_semana = $_POST['day'];
    $horario = $_POST['time'];

    // Inserir o professor no banco de dados
    $sql_professor = "INSERT INTO professores (nome, email, senha, disciplina) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_professor);
    $stmt->bind_param("ssss", $nome, $email, $senha, $disciplina);

    if ($stmt->execute()) {
        $professor_id = $stmt->insert_id;

        // Inserir o horário no banco de dados
        $sql_horario = "INSERT INTO horarios (professor_id, disciplina, dia_da_semana, horario) VALUES (?, ?, ?, ?)";
        $stmt_horario = $conn->prepare($sql_horario);
        $stmt_horario->bind_param("isss", $professor_id, $disciplina, $dia_da_semana, $horario);

        if ($stmt_horario->execute()) {
            // Redirecionar para a página que exibe a tabela de horários
            header("Location: horario.php");
            exit();
        } else {
            echo "Erro ao cadastrar horário: " . $conn->error;
        }

        $stmt_horario->close();
    } else {
        echo "Erro ao cadastrar professor: " . $conn->error;
    }

    // Fechando a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>
