<html>
    <head>
        <title>{{ $ticket->public_id }}</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <table style="width: 100%">
            <tr>
                <td class="text-left">
                    <img src="{{ public_path('img/photo_2022-04-05_18-22-58.jpg') }}" alt="" width="100" height="100">
                    <br>{{ $ticket->public_id }}<br>
                    Telegram: @Atc_Btcplays <br>
                    btcplays2018@gmail.com <br>
                    FECHA: {{ date_format($ticket->created_at, 'd-m-Y h:i a') }}<br>
                    Estado: {{  $ticket->status }} <br>
                    Datos a pagar: {{  $ticket->pay_id }}
                </td>
                <td class="text-right">
                    <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->generate($ticket->public_id)) }}">
                </td>
            </tr>
        </table>
        <table class="table table-sm mt-2" style="font-size: 11px !important;">
            <thead>
                <td>Ficha</td>
                <td>Giros</td>
                <td class="text-right">Monto</td>
                <td class="text-right">Subtotal</td>
                <td class="text-right">Premio</td>
            </thead>
            <tbody>
                @foreach($ticket->animals as $animal)
                    <tr>
                        <td>{{ $animal->getLabelMoreSpace() }}</td>
                        <td>
                            @foreach($ticket->dailySorts()->orderBy('time_sort')->get() as $dailySort)
                                {{ strtoupper($dailySort->sort->description . ' ' . $dailySort->timeSortFormat()) }},
                            @endforeach
                        </td>
                        <td class="text-right">{{ number_format($animal->pivot->amount, 2, ',', '.') }}</td>
                        <td class="text-right">{{ number_format($animal->pivot->amount * count($ticket->dailySorts), 2, ',', '.') }}</td>
                        <td class="text-right">{{ number_format(($animal->pivot->amount / 100) * $ticket->pay_per_100, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="text-right">
                    <td colspan="3">Total:</td>
                    <td >{{ number_format($ticket->amount(), 2, ',', '.') }}</td>
                    <td></td>
                </tr>
                <tr class="text-center">
                    <td colspan="5">
                        Nota: Cualquier intento de fraude
                        Conlleva a la anulación del Ticket
                    </td>
                </tr>
                <tr class="text-center">
                    <td colspan="5">
                        El ticket solo se cancela al ID de binance
                        Pay asociado al ticket em muestro sistema
                    </td>
                </tr>
            </tfoot>
        </table>
    </body>
    {{-- Agencia 9192
    TICKET: {{ $ticket->public_id }}
    FECHA: {{ date_format($ticket->created_at, 'd-m-Y h:i a') }}
    ------------------------------
    ------------------------------
    TOTAL                  {{ number_format($ticket->amount(), 2, ',', '.') }}
    
    VALIDO POR 3 DIAS
    
    
    ------------------------------ --}}
</html>