<?php
$host = "localhost";
$usuario = "root"
$senha = "";
$banco = "hotel_db";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if($conexao){
    echo "Conectou ao banco de dados";
}
else {
    echo "Não conectou ao banco de dados";
}
?>