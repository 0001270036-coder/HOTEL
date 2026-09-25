<?php

require_once("conexao.php");

$id_hotel = $_GET['id_hotel'];


$sql = "SELECT * FROM quartos WHERE id_hotel = '$id_hotel'";
$resultado = mysqli_query($conexao, $sql);
?>
<html>
<head>
    <title>Ver Quartos - Hotel <?php echo $id_hotel; ?></title>
    <link rel="stylesheet" href="css/estilo.css">
    <style>
        body { display:flex; flex-direction:column; align-items:center; font-family:Arial; padding:20px; }
        table { border-collapse: collapse; width: 500px; margin-top: 20px; }
        th, td { border: 1px solid #90257b; padding: 10px; text-align: center; }
        th { background: #430954; color: white; }
        form { width: 400px; background: #f9f9f9; padding: 20px; border-radius: 10px; margin-top: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 10px; margin: 5px 0 15px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #390625; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>

    <h1>Quartos do Hotel ID: <?php echo $id_hotel; ?></h1>

    <h3>4. Exibição dos Quartos</h3>
    <table>
        <tr>
            <th>Número</th>
            <th>Tipo</th>
            <th>Preço</th>
        </tr>
        <?php
        while($quarto = mysqli_fetch_assoc($resultado)){
            echo "<tr>";
            echo "<td>".$quarto['numero']."</td>";
            echo "<td>".$quarto['tipo']."</td>";
            echo "<td>R$ ".$quarto['preco']."</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h3>5. Formulário de Reserva</h3>
    <form action="salvar_reserva.php" method="POST">
        
        <label>ID do Cliente (type="number")</label>
        <input type="number" name="id_cliente" required placeholder="Digite seu ID de cliente">

        <label>ID do Quarto (informado manualmente)</label>
        <input type="number" name="id_quarto" required placeholder="Digite o ID do quarto da tabela">

        <input type="hidden" name="id_hotel" value="<?php echo $id_hotel; ?>">

        <label>Data de Entrada</label>
        <input type="date" name="data_entrada" required>

        <label>Data de Saída</label>
        <input type="date" name="data_saida" required>

        <button type="submit">Reservar</button>
    </form>

    <br>
    <a href="index.html">Voltar</a>

</body>
</html>
