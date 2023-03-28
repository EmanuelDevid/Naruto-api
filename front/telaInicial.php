<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bijuus' API</title>
        <link rel="stylesheet" href="../style/global.css" />
        <link rel="stylesheet" href="../style/telaInicial.css" />
    </head>
    <body>
        <header class="header">
            <img src="../img/Simbolo_konoha.svg.png" alt="logo">
            <a href="../back/logoff.php">Sair</a>
        </header>

        <section class="main">
            <h2 class="title"><strong>Escolha uma opção</strong></h2>

            <div class="options">
                <button onclick="redireciona1()">Registrar</button>
                <button onclick="redireciona2()">Ler</button>
                <button onclick="redireciona3()">Atualizar</button>
                <button onclick="redireciona4()">Excluir</button>
            </div>
        </section>

        <script>
            function redireciona1() {
                window.location.href = "./create.php"
            }

            function redireciona2() {
                window.location.href = "./read.php"
            }

            function redireciona3() {
                window.location.href = "./update.php"
            }

            function redireciona4() {
                window.location.href = "./delete.php"
            }
        </script>
    </body>
</html>
