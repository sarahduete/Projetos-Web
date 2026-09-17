<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Troca de Pneus</title>

    <style>

        /* ============== CONFIGURAÇÕES GERAIS ================ */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f4f7;
            color: #172033;
        }


        /* ==================== TOPO ==================== */

        .topo {
            background-color: #101923;
            color: white;
            padding: 25px 50px;
            min-height: 130px;
        }

        .logo {
            display: inline-block;
            width: 45%;
            vertical-align: middle;
        }

        .logo h1 {
            margin: 0;
            font-size: 38px;
        }

        .logo span {
            color: #e52525;
        }

        .logo p {
            margin-top: 5px;
            color: #bfc7d1;
            letter-spacing: 3px;
        }

        .informacao {
            display: inline-block;
            width: 50%;
            text-align: right;
            vertical-align: middle;
        }

        .informacao h3 {
            margin: 0;
            color: white;
        }

        .informacao p {
            color: #bfc7d1;
        }


        /* ==================== MENU ==================== */

        .menu {
            background-color: #19232f;
            text-align: center;
        }

        .menu a {
            display: inline-block;
            padding: 22px 28px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .menu a:hover {
            background-color: #e52525;
        }


        /* ==================== CALCULADORA ==================== */

        .calculadora {
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
        }

        .calculadora h2 {
            text-align: center;
            font-size: 30px;
            margin-bottom: 30px;
        }

        .formulario {
            background-color: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .formulario label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .formulario input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #d0d5dd;
            border-radius: 5px;
            font-size: 16px;
        }

        .formulario input:focus {
            outline: none;
            border-color: #e52525;
        }

        .botao {
            width: 100%;
            background-color: #e52525;
            color: white;
            border: none;
            padding: 13px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
        }

        .botao:hover {
            background-color: #bd1818;
        }


        /* ==================== RESULTADO ==================== */

        .resultado {
            background-color: white;
            margin-top: 30px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .resultado h2 {
            margin-top: 0;
            color: #172033;
        }

        .resultado p {
            line-height: 1.8;
        }

        .total {
            border-top: 1px solid #d0d5dd;
            padding-top: 15px;
            font-size: 20px;
        }


        /* ==================== RODAPÉ ==================== */

        .rodape {
            background-color: #101923;
            color: white;
            padding: 35px 50px;
            margin-top: 60px;
            text-align: center;
        }

        .rodape p {
            color: #bfc7d1;
        }

    </style>

</head>

<body>


    <!-- ==================== TOPO ==================== -->

    <header class="topo">

        <div class="logo">

            <h1>Auto<span>Tech</span></h1>

            <p>OFICINA MECÂNICA</p>

        </div>


        <div class="informacao">

            <h3>PORTAL DE FERRAMENTAS</h3>

            <p>Soluções rápidas para o dia a dia da oficina</p>

        </div>

    </header>


    <!-- ==================== MENU ==================== -->

    <nav class="menu">

        <a href="../index.php">⌂ Início</a>

        <a href="calculadora-orcamento.php">Orçamento</a>

        <a href="troca-pneus.php">Pneus</a>

        <a href="calculadora-combustivel.php">Combustível</a>

        <a href="avaliador-manutencao.php">Serviço</a>

        <a href="simulador-viagem.php">Viagem</a>

    </nav>


    <!-- ==================== TROCA DE PNEUS ==================== -->

    <section class="calculadora">

        <h2>Calculadora de Troca de Pneus</h2>


        <form method="POST" class="formulario">

            <label>Marca/Modelo do pneu:</label>

            <input type="text" name="marca_modelo" required >


            <label>Valor de cada pneu:</label>

            <input type="number" name="valor_pneu" step="0.01"required>


            <label>Quantidade de pneus:</label>

            <input type="number" name="quantidade" min="1" step="1" required>


            <label>Valor da montagem por pneu:</label>

            <input type="number" name="montagem" step="0.01"required>


            <label>Valor do balanceamento por pneu:</label>

            <input type="number"name="balanceamento"step="0.01"required>


            <button type="submit" class="botao">

                Calcular troca

            </button>

        </form>


        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $marca_modelo = $_POST["marca_modelo"];

            $valor_pneu = $_POST["valor_pneu"];

            $quantidade = $_POST["quantidade"];

            $montagem = $_POST["montagem"];

            $balanceamento = $_POST["balanceamento"];


            // ==================== CÁLCULOS ====================

            $total_pneus = $valor_pneu * $quantidade;

            $total_montagem = $montagem * $quantidade;

            $total_balanceamento = $balanceamento * $quantidade;

            $total = $total_pneus + $total_montagem + $total_balanceamento;


        ?>


            <!-- ==================== RESULTADO ==================== -->

            <div class="resultado">

                <h2>Resumo da troca de pneus</h2>


                <p>

                    <strong>Marca/Modelo:</strong>

                    <?php
                    echo $marca_modelo;
                    ?>

                </p>


                <p>

                    <strong>Quantidade:</strong>

                    <?php
                    echo $quantidade;
                    ?>

                </p>


                <p>

                    <strong>Total dos pneus:</strong>

                    R$

                    <?php
                    echo number_format($total_pneus, 2, ",", ".");
                    ?>

                </p>


                <p>

                    <strong>Total da montagem:</strong>

                    R$

                    <?php
                    echo number_format($total_montagem, 2, ",", ".");
                    ?>

                </p>


                <p>

                    <strong>Total do balanceamento:</strong>

                    R$

                    <?php
                    echo number_format($total_balanceamento, 2, ",", ".");
                    ?>

                </p>


                <p class="total">

                    <strong>

                        Total: R$

                        <?php
                        echo number_format($total, 2, ",", ".");
                        ?>

                    </strong>

                </p>

            </div>


        <?php

        }

        ?>

    </section>


    <!-- ==================== RODAPÉ ==================== -->

    <footer class="rodape">

        <h3>
            Auto<span style="color:#e52525;">Tech</span>
        </h3>

        <p>
            Portal de ferramentas para oficina mecânica.
        </p>

        <p>
            © 2026 AutoTech - Portal de Ferramentas
        </p>

    </footer>


</body>

</html>