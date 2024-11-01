<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Horários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Horários</h1>
        <table>
            <thead>
                <tr>
                    <th>Disciplina</th>
                    <th>Dia da Semana</th>
                    <th>Horário</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli('localhost', 'root', '', 'escola');

                if ($conn->connect_error) {
                    die("Erro de conexão: " . $conn->connect_error);
                }

                $result = $conn->query("SELECT h.*, d.nome AS disciplina 
                                        FROM horarios h 
                                        JOIN disciplinas d ON h.disciplina_id = d.id");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['disciplina']}</td>
                            <td>{$row['dia_da_semana']}</td>
                            <td>{$row['horario']}</td>
                          </tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
