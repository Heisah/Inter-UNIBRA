<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!--Link do BootStrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Link dos Estilos -->
    <link rel="stylesheet" type="text/css" href="styles/BStyle.css">

    <!--Link do icone do site-->
    <link rel="shortcut icon" href="src/360-degrees.ico">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor 360</title>




    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
            /*var data = new google.visualization.DataTable();
            data.addColumn('Alunos', 'Alunos');*/

            <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'ead_nutri';
            
            /// Criar uma conexão com o banco de dados
            $conexao = new mysqli($servername,$username,$password,$database);

            // Verificação de erros na conexão
            if ($conexao->connect_error) {
                die("Erro na conexão: " . $conexao->connect_error);
            }

            // Consulta SQL para contar o número de alunos
            $sql = "SELECT COUNT(*) as total FROM aluno";
            $resultado = $conexao->query($sql);

            // Verificação de erros na execução da consulta
            if ($resultado === false) {
                die("Erro na consulta: " . $conexao->error);
            }

            // Recuperação do número de alunos
            $row = $resultado->fetch_assoc();
            $total_alunos = $row['total'];
            
            // Fechamento da conexão
            $conexao->close();
            ?>


            var totalL = <?php echo $total_alunos; ?>;
            // Adiciona os dados ao gráfico
            //data.addRow(['Alunos', $totalL]);

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Status');
            data.addColumn('number', 'Quantidade');
            data.addColumn({type: 'string', role: 'style'});
            data.addRows([
                ['Usuários Registrados', totalL, 'blue']
            ]);
            
            var options = {
                title: 'Número de Alunos',
                legend: { position: 'none' },
                bars: 'horizontal', // Barras horizontais
                bar: { groupWidth: '10%' }, // Largura das barras
                vAxis: { minValue: 0 } // Mínimo do eixo y
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>


</head>
<body class="bg">

    <!--Elemento do Cabeçalho-->
    <header id="hdn" class="hdn">

        <!--Logo do Site-->
        <h1 class="logo">Monitor <span>360</span></h1>

        <!--Elemento sair do painel Administrativo-->
        <div class="container-sair-btn">
            <a href="#">Sair</a>
        </div>

    <!--Fim do Cabeçalho-->
    </header>

    <!--Script JavaScript tipo A-->
    <script src="/adminMonitor/jscript/scriptA.js"></script>

    <!--Começo da seção container de monitoramento e gráficos-->
    <section class="monitorGeral">

        <!--Elementos: "Página Anterior", Título e "Próxima Pagina"-->
        <h1><a href="360Analises.html">◀</a> Alunos <a href="360Uploads.html">▶</a></h1>
        
        <!--Elemento de container-->
        <div class="container-monitores">

        <!--Elementos de Gráficos em Barras-->
        <div class="container-grid">
            <div class="container-graficos">
                <div class="container-tabela" id="chart_div" style="width: 800px; height: 500px;">
                </div>
            </div>     
        </div>
        <div class="container-grid">
            <div class="container-graficos">
                <div class="container-tabela">
                    Alunos inadimplentes
                </div>
            </div>     
        </div>

    <!--Fim do container-->
    </div>

    <!--Fim da seção-->
    </section>

    
</body>
</html>