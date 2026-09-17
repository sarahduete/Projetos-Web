<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calculadora de Combustível</title>

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


        /* ==================== CLASSIFICAÇÃO ==================== */

        .classificacao {
            margin-top: 30px;
            border-radius: 8px;
            overflow: hidden;
        }

        .titulo-classificacao {
            background-color: #20272d;
            color: white;
            text-align: center;
            padding: 15px;
            font-weight: bold;
        }

        .linha-classificacao {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            font-weight: bold;
        }

        .vermelho {
            background-color: #f4cccc;
            color: #a00000;
        }

        .amarelo {
            background-color: #fff2cc;
            color: #7f6000;
        }

        .verde {
            background-color: #d9ead3;
            color: #38761d;
        }

        .azul {
            background-color: #cfe2f3;
            color: #1155cc;
        }

        .rodape-classificacao {
            background-color: #20272d;
            color: #ccc;
            text-align: center;
            padding: 10px;
            font-size: 13px;
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


    <!-- ==================== CALCULADORA ==================== -->

    <section class="calculadora">

        <h2>Calculadora de Combustível</h2>


        <form method="POST" class="formulario">

            <label>Distância percorrida:</label>

            <input
                type="number"
                name="distancia"
                step="0.01"
                required
            >


            <label>Quantidade de litros consumidos:</label>

            <input
                type="number"
                name="litros"
                step="0.01"
                required
            >


            <label>Preço do litro do combustível:</label>

            <input
                type="number"
                name="custo_combustivel"
                step="0.01"
                required
            >


            <button type="submit" class="botao">

                Calcular consumo

            </button>

        </form>


        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $distancia = $_POST["distancia"];

            $litros = $_POST["litros"];

            $custo_combustivel = $_POST["custo_combustivel"];


            // ==================== CÁLCULOS ====================

            // Consumo médio em km/L
            $consumo_medio = $distancia / $litros;


            // Custo total do combustível
            $custo_total = $litros * $custo_combustivel;


            // Custo de combustível por quilômetro
            $custo_km = $custo_total / $distancia;


            // ==================== CLASSIFICAÇÃO ====================

            if ($consumo_medio < 8) {

                $classificacao = "Alto consumo";

                $classe = "vermelho";

            } elseif ($consumo_medio < 12) {

                $classificacao = "Consumo moderado";

                $classe = "amarelo";

            } elseif ($consumo_medio <= 16) {

                $classificacao = "Bom consumo";

                $classe = "verde";

            } else {

                $classificacao = "Excelente consumo";

                $classe = "azul";

            }

        ?>


            <!-- ==================== CLASSIFICAÇÃO ==================== -->

            <div class="classificacao">

                <div class="titulo-classificacao">

                    ⛽ CLASSIFICAÇÃO DO CONSUMO DE COMBUSTÍVEL

                </div>


                <div class="linha-classificacao <?php echo $classe; ?>">

                    <span>

                        <?php
                        echo number_format($consumo_medio, 2, ",", ".");
                        ?>

                        km/L

                    </span>


                    <span>

                        <?php
                        echo $classificacao;
                        ?>

                        ⛽

                    </span>

                </div>


                <div class="rodape-classificacao">

                    Quanto maior o consumo, mais econômico é o veículo.

                </div>

            </div>


            <!-- ==================== RESUMO ==================== -->

            <div class="resultado">

                <h2>Resumo do consumo</h2>


                <p>

                    <strong>Distância:</strong>

                    <?php
                    echo $distancia;
                    ?>

                    km

                </p>


                <p>

                    <strong>Litros consumidos:</strong>

                    <?php
                    echo $litros;
                    ?>

                    L

                </p>


                <p>

                    <strong>Consumo médio:</strong>

                    <?php
                    echo number_format($consumo_medio, 2, ",", ".");
                    ?>

                    km/L

                </p>


                <p>

                    <strong>Custo total:</strong>

                    R$

                    <?php
                    echo number_format($custo_total, 2, ",", ".");
                    ?>

                </p>


                <p class="total">

                    <strong>

                        Custo por km: R$

                        <?php
                        echo number_format($custo_km, 2, ",", ".");
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