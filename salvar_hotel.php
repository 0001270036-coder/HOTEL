<?php
require_once "conexao.php"; 

$nome = $_POST['nome'];
$email = $_POST['telefone'];
$telefone = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO clientes (nome, email, telefone, senha)
VALUES ('$nome', '$email', '$telefone', '$senha')";

if(mysqli_query($conexao, $sql)){

}
 else {
    echo "Erro: " . mysqli_error($conexao);

echo"<a href='cadastro_hotel.html'>Voltar</a>";
 }
?>