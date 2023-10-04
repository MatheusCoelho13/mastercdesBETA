<?php
session_start();
// Incluir a conexão com banco de dados
include_once './config/conexao.php';
include_once './config/firebasedb.php';
function gerarToken() {
    return bin2hex(random_bytes(12));
    }
// Receber os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$senha = password_hash($_POST["Senhaa"], PASSWORD_DEFAULT);
$Token = gerarToken();

// Validar o campo nome_usuario, acessa o IF quando o campo está vazio 
if (empty($dados['nome'])) {

    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro: Necessário preencher o campo nome!"];
} elseif (empty($dados['email'])) { // Validar o campo email_usuario, acessa o ELSEIF quando o campo está vazio 

    // Criar o array com status e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "Erro: Necessário preencher o campo e-mail!"];
} elseif(empty($dados['Senhaa'])){

    $retorna = ['status' => false, 'msg' => "Erro: Necessário preencher o campo senha!"];

}elseif(empty($dados['conemail'])){

    $retorna = ['status' => false, 'msg' => "Erro: Necessário preencher o campo email de confimaçao!"];

}elseif(empty($dados['conpass'])){

    $retorna = ['status' => false, 'msg' => "Erro: Necessário preencher o campo senha de confimaçao!"];
}else{ // Acessa o ELSE quando todos os campo estão preenchidos

    // Criar a QUERY para cadastrar usuário no banco de dados
    $query_usuario = "INSERT INTO usuarios (nome, email, senha,conemail, consenha, token) VALUES (:nome, :email, :passw, :conEmail, :conSenha, :TOKEN)";

    // Preparar a QUERY
    $cad_usuario = $conn->prepare($query_usuario);

    // Usar o bindParam para substituir o link da QUERY pelo valor que vem do formulário 
    $cad_usuario->bindParam(':nome', $dados['nome']);

    // Usar o bindParam para substituir o link da QUERY pelo valor que vem do formulário 
    $cad_usuario->bindParam(':email', $dados['email']);

     // Usar o bindParam para substituir o link da QUERY pelo valor que vem do formulário 
     $cad_usuario->bindParam(':passw',$senha);
     $cad_usuario->bindParam(':conEmail',$dados['conemail']);
     $cad_usuario->bindParam(':conSenha',$dados['conpass']);
    // Executar a QUERY com PHP e PDO
    $cad_usuario->bindParam(':TOKEN', $Token);

    $cad_usuario->execute();

    // Acessa o IF quando cadastrar o registro no banco de dados
if ($cad_usuario->rowCount()) {

        // Criar o array com status e a mensagem de sucesso
        $retorna = ['status' => true, 'msg' => "Usuário cadastrado com sucesso!"];
    } else { // Acessa o ELSE quando não cadastrar o registro no banco de dados

        // Criar o array com status e a mensagem de erro
        $retorna = ['status' => false, 'msg' => "Erro: Usuário não cadastrado com sucesso!"];
    }
}
echo json_encode($retorna);
