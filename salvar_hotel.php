<?php
require_once "conexao.php"; 

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

$sql = "INSERT INTO clientes (nome, email, telefone, senha)
VALUES ('$nome', '$email', '$telefone', '$senha')";

if(mysqli_query($conexao, $sql))
 else {
    echo "Erro: " . mysqli_error($conexao);
}
?>
<a href="cadastro_hotel.html">Voltar</a>

?>