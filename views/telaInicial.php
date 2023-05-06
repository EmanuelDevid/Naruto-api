<?php 

require_once("../controllers/validaAcesso.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bijuus' API</title>
        <link rel="stylesheet" href="/views/style/telaInicial.css" />
        <link rel="stylesheet" href="/views/style/global.css" />
    </head>
    <body>
        <header class="header">
            <img src="/views/img/Simbolo_konoha.svg.png" alt="logo">
            <a href="../controllers/logoff.php">Sair</a>
        </header>

        <section class="main2">
            <h2 class="title"><strong>Escolha uma opção</strong></h2>

            <div class="options">
                <button onclick="redCreate()">Registrar</button>
                <button onclick="redRead()">Ler</button>
                <button onclick="redUpdate()">Atualizar</button>
                <button onclick="redDelete()">Excluir</button>
            </div>
        </section>

        <script>
            function redCreate() {
                window.location.href = "/views/create.php"
            }

            function redUpdate() {
                window.location.href = "/views/update.php"
            }

            function redRead() {
                window.location.href = "/views/read.php"
            }

            function redDelete() {
                window.location.href = "/views/delete.php"
            }
        </script>
    </body>
</html>
