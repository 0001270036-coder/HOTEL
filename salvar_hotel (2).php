<html>
    <head>
        <title>cadastro-hotel</title>
        <!-- 1. CSS EXTERNO -->
        <link rel="stylesheet" href="css/estilo.css">

        <!-- 2. CSS INTERNO -->
        <style>
            form {
                width: 350px;
                margin: 0 auto;
            }
            input {
                width: 100%;
                padding: 10px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            button {
                width: 100%;
                padding: 12px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <!-- 3. CSS INLINE -->
        <h1 style="color: #b8860b; text-align: center;">Imperial Palace</h1>
        
        <h2 style="text-align: center;">Cadastro de Hotel</h2>

        <form action="salvar_hotel.php" method="post">
            <label for="nome">Nome do Hotel</label><br>
            <input type="text" name="nome" id="nome" required><br><br>

            <label for="cidade">Cidade</label><br>
            <input type="text" name="cidade" id="cidade" required><br><br>

            <label for="estrelas">Classificação (1 a 5)</label><br>
            <input type="number" name="estrelas" id="estrelas" min="1" max="5" required><br><br>

            <button type="submit">Cadastrar Hotel</button>
        </form>

        <br>
        <a href="index.html">Voltar</a>
    </body>
</html>
