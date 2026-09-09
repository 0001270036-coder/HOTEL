 <?php
session_start();
include("conexao.php");

// 2. Receber email e senha via POST
$email = $_POST['email'];
$senha_digitada = $_POST['senha'];

// 3. Buscar cliente no banco pelo e-mail
// usando prepare pra evitar SQL Injection
$sql = "SELECT * FROM clientes WHERE email = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

// 4. Verificar se usuário existe e comparar senha
if ($resultado->num_rows == 1) {
    $cliente = $resultado->fetch_assoc();
    
    // Verifica a senha criptografada
    // Se no seu banco a senha não está criptografada ainda, use: if ($senha_digitada == $cliente['senha'])
    if (password_verify($senha_digitada, $cliente['senha'])) {
        
        // 5. Se os dados forem válidos - cria a sessão e redireciona
        $_SESSION['id_cliente'] = $cliente['id'];
        $_SESSION['nome_cliente'] = $cliente['nome'];
        $_SESSION['email_cliente'] = $cliente['email'];

        header("Location: minhas_reservas.php");
        exit();

    } else {
        // Senha incorreta
        echo "Senha incorreta! <br>";
        echo "<a href='login.html'>Voltar para o login</a>";
    }

} else {
    // 6. E-mail não encontrado
    echo "E-mail não encontrado! <br>";
    echo "<a href='login.html'>Voltar para o login</a>";
}

$stmt->close();
$conexao->close();
?>
