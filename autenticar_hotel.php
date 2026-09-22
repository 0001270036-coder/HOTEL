<?php
// 1. Incluir conexao
include("conexao.php");
session_start();


$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM hoteis WHERE email = '$email' AND senha = '$senha'";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {

    
    
    
    $_SESSION['hotel_id'] = $hotel['id'];
    $_SESSION['hotel_nome'] = $hotel['nome'];
    
    
    header("Location: painel_hotel.php");
    
    exit;

} else {
    
    echo "<h3>E-mail ou senha incorretos!</h3>";
    echo "<p>O hotel não foi encontrado.</p>";
    echo "<a href='login_hotel.html'>Tentar fazer login novamente</a>";
}
?>

