<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "mastercodes");

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Função para gerar um token único
function gerarToken() {
    return bin2hex(random_bytes(18));
}

// Processamento do formulário de cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $token = gerarToken();

    $sql = "INSERT INTO usuarios (nome, email, senha, token) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $email, $senha, $token);

    if ($stmt->execute()) {
        echo '<script>alert("Cadastro realizado com sucesso!");</script>';
    } else {
        echo '<script>alert("Erro ao cadastrar usuário.");</script>';
    }

    $stmt->close();
}
$response = array(
    'status' =>  "sucess",
     'message' => "cadastro sucesso"
);

$conn->close();
?>
