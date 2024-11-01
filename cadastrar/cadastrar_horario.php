<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Horário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastrar Horário</h1>
        <form action="../processar/processar_cadastro_horario.php" method="POST">
            <label for="disciplina_id">Selecionar Disciplina:</label>
            <select id="disciplina_id" name="disciplina_id" required>
                <option value="">Selecione uma Disciplina</option>
                <?php
                $conn = new mysqli('localhost', 'root', '', 'escola');
                $result = $conn->query("SELECT d.*, p.nome AS professor FROM disciplinas d JOIN professores p ON d.professor_id = p.id");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nome']} - Professor: {$row['professor']}</option>";
                }
                $conn->close();
                ?>
            </select>

            <label for="dia_da_semana">Dia da Semana:</label>
            <select id="dia_da_semana" name="dia_da_semana" required>
                <option value="Segunda">Segunda</option>
                <option value="Terça">Terça</option>
                <option value="Quarta">Quarta</option>
                <option value="Quinta">Quinta</option>
                <option value="Sexta">Sexta</option>
            </select>

            <label for="horario">Horário:</label>
            <input type="time" id="horario" name="horario" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
