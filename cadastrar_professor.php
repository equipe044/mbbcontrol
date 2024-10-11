<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Professor</title>
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
        <h1>Cadastrar Professor</h1>
        <form action="processar_cadastro_professor.php" method="POST">
            <label for="nome">Nome do Professor:</label>
            <input type="text" id="nome" name="nome" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
