<?php

include("conexao.php");


$email = $_POST['email_usuario'];
$senha_digitada = $_POST['senha_usuario'];

$sql = "SELECT * FROM clientes WHERE email = '$email' and senha = '$senha_digitada'";
$resultado = mysqli_query($conexao,$sql);


if (mysqli_num_rows($resultado) > 0) {
    header("Location: minhas_reservas.php");
    exit();
} else {
    header("Location: login.html");
    exit();
}
?>
