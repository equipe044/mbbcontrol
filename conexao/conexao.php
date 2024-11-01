<?php
function conectarBanco() {
    // Configurações de conexão
    $host = "localhost";
    $dbname = "escola"; // Nome do banco de dados
    $user = "root";          // Usuário do banco
    $password = "";        // Senha do banco

    // Cria a conexão usando MySQLi
    $conexao = new mysqli($host, $user, $password, $dbname);

    // Verifica se houve algum erro na conexão
    if ($conexao->connect_error) {
        die("Erro de conexão: " . $conexao->connect_error);
    }

    return $conexao;
}
?>
