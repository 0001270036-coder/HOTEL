<?php

require_once "conexao.php";

$id_hotel = isset($_GET['hotel_id']) ? intval($_GET['hotel_id']) : 0;


$sql = "SELECT 
            reservas.id,
            clientes.nome AS nome_cliente,
            clientes.telefone,
            quartos.numero,
            reservas.data_entrega,
            reservas.data_saida
        FROM reservas
        JOIN quartos 
            ON reservas.quarto_id = quartos.id
        JOIN clientes 
            ON reservas.cliente_id = clientes.id
        WHERE quartos.hotel_id = $id_hotel=1";

$resultado = mysqli_query($conexao, $sql);


if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reservas do Hotel</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 30px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin-top: 25px;
        }

        th, td {
            border: 1px solid #d4c9c9;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #741560;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        .links {
            margin-top: 25px;
            text-align: center;
        }

        .links a {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background-color: #772a57;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .links a:hover {
            background-color: #500d50;
        }
    </style>

</head>

<body>

    <h2>RESERVAS RECEBIDAS PELO HOTEL</h2>

    <table>

        <tr>
            <th>Código da Reserva</th>
            <th>Nome do Cliente</th>
            <th>Telefone</th>
            <th>Número do Quarto</th>
            <th>Data de Entrada</th>
            <th>Data de Saída</th>
        </tr>

        <?php

        while ($linha = mysqli_fetch_assoc($resultado)) {

            echo "
            <tr>
                <td>" . $linha['id'] . "</td>
                <td>" . $linha['nome_cliente'] . "</td>
                <td>" . $linha['telefone'] . "</td>
                <td>" . $linha['numero_quarto'] . "</td>
                <td>" . $linha['data_entrega'] . "</td>
                <td>" . $linha['data_saida'] . "</td>
            </tr>
            ";
        }

        ?>

    </table>

    <div class="links">

        <a href="cadastro_quarto.html">
            Cadastrar Novo Quarto
        </a>

        <a href="">
            Sair
        </a>

    </div>

</body>

</html>
