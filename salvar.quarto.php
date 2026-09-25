<?php
include("conexao.php");
$id_hotel = $_POST['id_hotel'];
$numero = $_POST['numero'];
$tipo = $_POST['tipo'];
$preco = $_POST['preco'];

$sql = "INSERT INTO quartos (id_hotel, numero, tipo, preco) VALUES ('$id_hotel', '$numero', '$tipo', '$preco')";
mysqli_query($conexao, $sql);
echo "Quarto salvo!";
echo "<br><a href='cadastrar_quarto.html'>Cadastrar outro</a>";
?>