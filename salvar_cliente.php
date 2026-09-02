<?php
require_once "conexao.php";

$nome = $POST['nome'];
$email = $POST['email'];
$telefone = $POST['telefone'];
$senha = $POST['senha'];

$sql = "INSERT INTO clientes (nome, email, telefone, senha)
VALUES ('$nome', '$email', '$telefone', '$senha')";

if(mysql_query($conexao, $sql)){
}
else{
}
?>