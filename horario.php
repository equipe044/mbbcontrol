<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escola";

// Criando conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta para obter os horários
$sql = "SELECT professores.nome, horarios.disciplina, horarios.dia_da_semana, horarios.horario
        FROM horarios
        JOIN professores ON horarios.professor_id = professores.id
        ORDER BY 
            CASE 
                WHEN horarios.dia_da_semana = 'Segunda-feira' THEN 1
                WHEN horarios.dia_da_semana = 'Terça-feira' THEN 2
                WHEN horarios.dia_da_semana = 'Quarta-feira' THEN 3
                WHEN horarios.dia_da_semana = 'Quinta-feira' THEN 4
                WHEN horarios.dia_da_semana = 'Sexta-feira' THEN 5
            END, horarios.horario";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horários de Aula</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #6A0DAD;
            color: white;
        }
    </style>
</head>
<body>

    <h1>Horários de Aula</h1>

    <table>
        <tr>
            <th>Professor</th>
            <th>Disciplina</th>
            <th>Dia da Semana</th>
            <th>Horário</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Exibe os dados de cada linha da consulta
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                echo "<td>" . htmlspecialchars($row['disciplina']) . "</td>";
                echo "<td>" . htmlspecialchars($row['dia_da_semana']) . "</td>";
                echo "<td>" . htmlspecialchars($row['horario']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum horário cadastrado.</td></tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
// Fechando a conexão com o banco de dados
$conn->close();
?>

           
