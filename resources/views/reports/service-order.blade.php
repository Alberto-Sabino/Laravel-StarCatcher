<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Fiscal - OS #{{ $serviceOrder->id }}</title>
    <style>
        /* Configuração de impressão para tamanho A4 */
        @page {
            size: A4;
            margin: 2cm;
            /* Margem de 2cm */
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.6;
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
            text-transform: uppercase;
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

        .section p {
            margin: 5px 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
            font-size: 12px;
        }

        .table td {
            font-size: 12px;
        }

        .total {
            font-size: 14px;
            font-weight: bold;
            text-align: right;
            margin-top: 10px;
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
            <h1>Nota Fiscal de Serviço</h1>
            <p>Ordem de Serviço #{{ $serviceOrder->id }}</p>
            <p>Data: {{ $serviceOrder->created_at->format('d/m/Y H:i') }}</p>
            <p>Essa nota provê garantia de 30 dias para reparos nas peças substituídas a partir da data de geração.</p>
        </div>

        <!-- Dados do Cliente e Veículo -->
        <div class="section">
            <h2>Dados do Cliente e Veículo</h2>
            <p><strong>Proprietário:</strong> {{ $serviceOrder->car->owner_name }}</p>
            <p><strong>Telefone:</strong> {{ $serviceOrder->car->owner_phone }}</p>
            <p><strong>Veículo:</strong> {{ $serviceOrder->car->brand }} {{ $serviceOrder->car->model }}</p>
            <p><strong>Placa:</strong> {{ $serviceOrder->car->plate }}</p>
        </div>

        <!-- Peças Trocadas -->
        <div class="section">
            <h2>Peças Trocadas</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Marca</th>
                        <th>Valor Unitário (R$)</th>
                        <th>Quantidade</th>
                        <th>Subtotal (R$)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($serviceOrder->parts as $part)
                    <tr>
                        <td>{{ $part->name }}</td>
                        <td>{{ $part->brand }}</td>
                        <td>{{ number_format($part->price, 2, ',', '.') }}</td>
                        <td>{{ $part->pivot->quantity }}</td>
                        <td>{{ number_format($part->pivot->quantity * $part->price, 2, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Valor Total -->
        <div class="total">
            <p>Total: R$ {{ number_format($serviceOrder->total_value, 2, ',', '.') }}</p>
        </div>

        <!-- Rodapé -->
        <div class="footer">
            <p>Obrigado por confiar em nossos serviços!</p>
            <p>Esta é uma nota fiscal eletrônica gerada automaticamente.</p>
            <p>&copy; {{ date('Y') }} Oficina Mecânica StarCatcher. Todos os direitos reservados.</p>
        </div>
    </div>
</body>

</html>