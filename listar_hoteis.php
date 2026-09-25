<?php
require_once("conexao.php");


$sql = "SELECT * FROM hoteis";
$resultado = mysqli_query($conexao, $sql);
?>
<html>
<head>
    <title>Hotéis Disponíveis - hotelsystem</title>
    <link rel="stylesheet" href="css/estilo.css">
    <style>
        body { font-family: Arial, sans-serif; display:flex; flex-direction:column; align-items:center; padding:20px; }
        .card { width: 450px; border: 1px solid #4f0f0f; border-radius: 10px; padding: 15px; margin-bottom: 15px; background: #f9f9f9; }
        .card h3 { margin: 0 0 5px; color: #870a3a; }
        .btn { display: inline-block; margin-top: 10px; padding: 10px 15px; background: #af4c99; color: white; text-decoration: none; border-radius: 5px; }
        .btn:hover { background: #4594a0; }
    </style>
</head>
<body>

    <h1>hotelsystem</h1>
    <h2>Hotéis Parceiros Disponíveis</h2>

    <?php
    
    if (mysqli_num_rows($resultado) > 0) {
        while ($hotel = mysqli_fetch_assoc($resultado)) {
            echo "<div class='card'>";
            echo "<h3>" . $hotel['nome'] . "</h3>";
            echo "<p><strong>Cidade:</strong> " . $hotel['cidade'] . "</p>";
            echo "<p><strong>Classificação:</strong> " . $hotel['estrelas'] . " Estrelas</p>";
            
            
            echo "<a class='btn' href='ver_quartos.php id_hotel=" . $hotel['id'] . "'>Ver Quartos Disponíveis</a>";
            
            echo "</div>";
        }
    } else {
        echo "<p>Nenhum hotel cadastrado ainda.</p>";
    }
    ?>

    <br>
    <a href="index.html">Voltar ao Início</a>

</body>
</html>
