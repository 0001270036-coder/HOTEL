

<?php
session_start();
if
(!isset($_SESSION['logado']) ||$_SESSION['logado']==true){
    header("location: login_cliente.html");
    exit ();
}
require_once "conexao.php";

$sql = "SELECT reservas.id,
               hoteis.nome AS nome_hotel,
               quartos.tipo,
               reservas.data_entrega,
               reservas.data_saida,
               quartos.preco_diaria
    FROM reservas
    JOIN quartos ON reservas.quarto_id = quartos.id
    JOIN hoteis ON quartos.hotel_id = hoteis.id";

$resultado = mysqli_query($conexao, $sql);
?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
         <h2>MINHAS RESERVAS CONFIRMADAS</h2>
         <table>

         <tr>

          <th>Cod.Reserva</th>
          <th>Quarto</th>
          <th>Tipo do quarto</th>
          <th>Diária</th>
          <th>Data Entrada(Check-in)</th>
          <th>Data Saída(check-out)</th>

         </tr>

         <?php
            while($linha = mysqli_fetch_assoc($resultado)){
            
                echo"
                    <tr>

                        <td>".$linha['id']."</td>
                        <td>".$linha['nome_hotel']."</td>
                        <td>".$linha['tipo']."</td>
                        <td>".$linha['preco_diaria']."</td>
                        <td>".$linha['data_saida']."</td>

                    </tr>";
            }

         ?>
         </table>
          <a href="listar_hoteis.php">Clique aqui para novas reservas</a>
   
      </body>
      </html>
