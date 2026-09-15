<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Simulador de Viagem</title>

    <style>

        /* ==================== CONFIGURAÇÕES GERAIS ==================== */

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


        /* ==================== SIMULADOR ==================== */

        .simulador {
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
        }

        .simulador h2 {
            text-align: center;
            font-size: 30px;
            margin-bottom: 30px;
        }


        /* ==================== FORMULÁRIO ==================== */

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

        .formulario input,
        .formulario select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #d0d5dd;
            border-radius: 5px;
            font-size: 16px;
        }

        .formulario input:focus,
        .formulario select:focus {
            outline: none;
            border-color: #e52525;
        }


        /* ==================== BOTÃO ==================== */

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

        <a href="avaliador-manutenção.php">Serviço</a>

        <a href="simulador-viagem.php">Viagem</a>

    </nav>


    <!-- ==================== SIMULADOR ==================== -->

    <section class="simulador">

        <h2>Simulador de Viagem</h2>


        <form method="POST" class="formulario">


            <label>Distância da viagem:</label>

            <input
                type="number"
                name="distancia"
                step="0.01"
                min="0"
                required
            >


            <label>Consumo médio do veículo em km/L:</label>

            <input
                type="number"
                name="km_l"
                step="0.01"
                min="0"
                required
            >


            <label>Preço do combustível:</label>

            <input
                type="number"
                name="combustivel"
                step="0.01"
                min="0"
                required
            >


            <label>Tipo de viagem:</label>

            <select name="tipo_viagem" required>

                <option value="">Selecione</option>

                <option value="ida">Somente ida</option>

                <option value="ida_volta">Ida e volta</option>

            </select>


            <button type="submit" class="botao">

                Calcular viagem

            </button>

        </form>


        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $distancia = $_POST["distancia"];

            $km_l = $_POST["km_l"];

            $combustivel = $_POST["combustivel"];

            $tipo_viagem = $_POST["tipo_viagem"];


            /* ==================== TIPO DE VIAGEM ==================== */

            if ($tipo_viagem == "ida_volta") {

                $distancia = $distancia * 2;

                $tipo = "Ida e volta";

            } else {

                $tipo = "Somente ida";

            }


            /* ==================== CÁLCULOS ==================== */

            $total_litro = $distancia / $km_l;

            $custo_estimado = $total_litro * $combustivel;


            /* ==================== RESULTADO ==================== */

            echo '<div class="resultado">';

            echo '<h2>Resultado da viagem</h2>';

            echo '<p>🛣️ <strong>Tipo de viagem:</strong> ' .
                $tipo .
                '</p>';

            echo '<p>🚗 <strong>Distância:</strong> ' .
                number_format($distancia, 2, ",", ".") .
                ' km</p>';

            echo '<p>⛽ <strong>Consumo:</strong> ' .
                number_format($km_l, 2, ",", ".") .
                ' km/L</p>';

            echo '<p>💧 <strong>Combustível necessário:</strong> ' .
                number_format($total_litro, 2, ",", ".") .
                ' L</p>';

            echo '<p class="total">💰 <strong>Custo estimado: R$ ' .
                number_format($custo_estimado, 2, ",", ".") .
                '</strong></p>';

            echo '</div>';

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