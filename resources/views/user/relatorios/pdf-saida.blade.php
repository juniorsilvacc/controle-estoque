<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align: center; font-size: 25px; margin-bottom: 30px">Relatório de Saidas</h1>

    <table style="width: 100%; text-align: center; border-collapse: collapse; font-size: 11px;">
        <thead>
            <tr>
                <th style="border: 1px solid #000; background-color: #f2f2f2; padding: 8px;">#</th>
                <th style="border: 1px solid #000; background-color: #f2f2f2; padding: 8px;">Data saida</th>
                <th style="border: 1px solid #000; background-color: #f2f2f2; padding: 8px;">Produto</th>
                <th style="border: 1px solid #000; background-color: #f2f2f2; padding: 8px;">Quantidade</th>
                <th style="border: 1px solid #000; background-color: #f2f2f2; padding: 8px;">Valor</th>
                <th style="border: 1px solid #000; background-color: #f2f2f2; padding: 8px;">SubTotal</th>
                <th style="border: 1px solid #000; background-color: #f2f2f2; padding: 8px;">Motivo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($saidas as $saida)
                <tr>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $saida->id }}</td>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $saida->data_saida }}</td>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $saida->produto->nome }}</td>
                    <td style="border: 1px solid #000; padding: 8px;">{{ $saida->quantidade }}</td>
                    <td style="border: 1px solid #000; padding: 8px;">
                        @if ($saida->produto)
                            @php
                                $precoStr = str_replace(',', '.', $saida->produto->preco_venda);
                                $precoStr = preg_replace('/[^\d.]/', '', $precoStr);
                                $preco_de_venda = floatval($precoStr);
                            @endphp

                            R$ {{ number_format($preco_de_venda, 2, ',', '.') }}
                        @endif
                    </td>
                    <td style="border: 1px solid #000; padding: 8px;">
                        @if ($saida->produto)
                            @php
                                $precoStr = str_replace(',', '.', $saida->produto->preco_venda); // Substitui vírgula por ponto, se necessário
                                $precoStr = preg_replace('/[^\d.]/', '', $precoStr); // Remove todos os caracteres exceto dígitos e ponto decimal
                                $precoDeVenda = floatval($precoStr); // Converte para número (float)
                                $quantidade = $saida->quantidade; // Quantidade está definida
                                $total = $precoDeVenda * $quantidade; // Multiplica o preço pelo quantidade
                            @endphp

                            R$ {{ number_format($total, 2, ',', '.') }}
                        @endif
                    </td>
                    <td style="border: 1px solid #000; padding: 8px;">
                        @if ($saida->observacoes)
                            {{ $saida->observacoes }}
                        @else
                            N/DA
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
