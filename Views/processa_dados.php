<?php
// Conectar ao banco de dados (substitua essas informações com as suas)
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "test";

// Criar uma conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter os valores do formulário e realizar o escape para evitar SQL Injection
$nome = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$data_nascimento = mysqli_real_escape_string($conn, $_POST['birthdate']);
$endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
$endereco2 = mysqli_real_escape_string($conn, $_POST['endereco2']);
$numero = mysqli_real_escape_string($conn, $_POST['numero']);
$cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
$estado = mysqli_real_escape_string($conn, $_POST['estado']);
$cep = mysqli_real_escape_string($conn, $_POST['cep']);


// Montar a declaração SQL
$sql = "INSERT INTO usuarios (nome_completo, email, senha, data_nascimento, endereco, endereco2, numero, cidade, estado, cep) 
        VALUES ('$nome', '$email', '$password', '$data_nascimento', '$endereco', '$endereco2', '$numero', '$cidade', '$estado', '$cep')";

if ($conn->query($sql) === FALSE) {
    echo "<h1> Erro no registro! <h1>
            <a  href='formulario.php'> Clique para retornar ao formulário </a>
    ";
}

// Executar a declaração
if ($conn->query($sql) === TRUE) {
    echo "<h1> Registro inserido com sucesso! <h1>
            <a  href='formulario.php'> Clique para retornar ao formulário </a>
    ";
}

// Fechar a conexão
$conn->close();





?>