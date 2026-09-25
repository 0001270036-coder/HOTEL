<?php
require_once("conexao.php");

$id_cliente = $_POST['id_cliente'];
$id_quarto = $_POST['id_quarto'];
$data_entrada = $_POST['data_entrada'];
$data_saida = $_POST['data_saida'];

$id_hotel = $_POST['id_hotel'];


$check = mysqli_query($conexao, "SELECT * FROM quartos WHERE id = '$id_quarto' AND id_hotel = '$id_hotel'");
if(mysqli_num_rows($check) == 0){
    die("Erro: Quarto não existe ou não pertence a este hotel. <br><a href='ver_quartos.php?id_hotel=$id_hotel'>Voltar</a>");
}


$sql = "INSERT INTO reservas (id_cliente, id_quarto, id_hotel, data_entrada, data_saida, status)
        VALUES ('$id_cliente', '$id_quarto', '$id_hotel', '$data_entrada', '$data_saida', 'confirmada')";

if (mysqli_query($conexao, $sql)) {
    echo "<h1>Reserva realizada com sucesso!</h1>";
    echo "<p>Cliente ID: $id_cliente reservou o Quarto ID: $id_quarto</p>";
    echo "<p>De $data_entrada até $data_saida</p>";
    echo "<br><a href='listar_hoteis.php'>Voltar para lista de hotéis</a>";
} else {
    echo "Erro ao salvar reserva: " . mysqli_error($conexao);
}
?> 
