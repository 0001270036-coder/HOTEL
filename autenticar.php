<?php
SESSION_START();
include("conexao.php");


$email = $_POST['email_usuario'];
$senha_digitada = $_POST['senha_usuario'];

$sql = "SELECT * FROM clientes WHERE email = '$email' and senha = '$senha_digitada'";
$resultado = mysqli_query($conexao,$sql);


if (mysqli_num_rows($resultado) > 0){
    while ($linha= mysql_fetch_assoc($resultado)){
        if(password_verify($senha, $linha['senha'])){
            $_SESSION['cliente_id']=$linha['id'];
            $_SESSION['logado'] = true;
    
    header("Location: minhas_reservas.php");
    exit();
} else {
    header("Location: login_cliente.html");
    exit;
}
?>
