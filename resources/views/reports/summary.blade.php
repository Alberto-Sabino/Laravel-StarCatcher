<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório geral</title>
    <style>
        @page {
            size: A4;
            margin: 2cm;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 100%;
            padding: 0 1cm;
        }

        .header {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 18px;
            margin: 0;
        }

        .header p {
            font-size: 12px;
            margin: 2px 0;
            color: #777;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h2 {
            font-size: 14px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
            margin-bottom: 10px;
            color: #555;
        }

        .data p {
            font-size: 14px;
            margin: 5px 0;
        }

        .footer {
            text-align: center;
            font-size: 10px;
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Cabeçalho -->
        <div class="header">
            <h1>Relatório Geral da oficina</h1>
            <p>Dados Gerados: {{ now()->format('d/m/Y H:i') }}</p>
        </div>

        <!-- Dados Quantitativos -->
        <div class="section">
            <h2>Resumo Geral</h2>
            <div class="data">
                <p><strong>Total de Carros Atendidos:</strong> {{ $summary['total_cars'] }}</p>
                <p><strong>Total de Peças Substituídas:</strong> {{ $summary['total_parts'] }}</p>
                <p><strong>Valor Total Arrecadado:</strong> R$ {{ number_format($summary['total_revenue'], 2, ',', '.') }}</p>
            </div>
        </div>

        <!-- Rodapé -->
        <div class="footer">
            <p>Relatório gerado automaticamente pelo sistema da oficina mecânica.</p>
            <p>&copy; {{ date('Y') }} Oficina Mecânica StarCatcher. Todos os direitos reservados.</p>
        </div>
    </div>
</body>

</html>