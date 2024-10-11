<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Disciplina</title>
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
        <h1>Cadastrar Disciplina</h1>
        <form action="processar_cadastro_disciplina.php" method="POST">
            <label for="nome">Nome da Disciplina:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="professor_id">Selecionar Professor:</label>
            <select id="professor_id" name="professor_id" required>
                <option value="">Selecione um Professor</option>
                <?php
                $conn = new mysqli('localhost', 'root', '', 'escola');
                $result = $conn->query("SELECT * FROM professores");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                }
                $conn->close();
                ?>
            </select>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
