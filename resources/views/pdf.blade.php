

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice {{ $order->code }}</title>
    <style>
        
        body {
            
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 12px
        }
        .invoice-container {
            background-color: white;
        }
        .invoice-header {
            /* margin-bottom: 30px; */
            border-bottom: 1px solid #2c3e50;
            padding-bottom: 10px;
        }
        .invoice-header table {
            width: 100%;
        }
        .logo {
            width: 302px;
            height: 133px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #e0e0e0;
            padding: 6px;
            text-align: left;
            font-size: 10px;
            font-weight: bolder
        }
        th {
            background-color: #f87171;
            color: white;
        }
        .total-row {
            background-color: #f9f9f9;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Invoice Header -->
        <div class="invoice-header">
            <table>
                <tr>
                    <td style="width: 50%; border:0">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('invoice-logo.png'))) }}" alt="Intercocina Logo" class="logo">
                    </td>
                    <td style="text-align: center; width: 50%; border:0">
                        <p style="margin-bottom: 10px; font-weight: bold; color:red;font-size:13px">Pour Consulter l'attestation de regularite fiscale</p>
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('tax.png'))) }}" alt="Tax Info" style="width: 60px;">
                            <div style="text-align: left">
                                <strong>Espace Cuisine</strong> &#xa0;  &#xa0; &#xa0; &#xa0;<strong style="float: right">CL566</strong>
                            </div>
                        </tr>
                    </td>
                </tr>
            </table>
        </div>

        <div>FACTURE N° <strong>2457541</strong> &#xa0; &#xa0; Le: <strong>01/11/2024</strong></div>

        <!-- Customer and Invoice Details -->
        {{-- <table>
            <tr>
                <td>
                    <strong>Customer Details</strong><br>
                    <strong>Name:</strong> {{ $order->user->full_name }}<br>
                    <strong>Email:</strong> {{ $order->user->email }}<br>
                    <strong>Phone:</strong> {{ $order->user->phone ?? 'N/A' }}
                </td>
                <td>
                    <strong>Invoice Details</strong><br>
                    <strong>Invoice Number:</strong> {{ $order->code }}<br>
                    <strong>Issue Date:</strong> {{ $order->created_at->format('d M Y') }}<br>
                    <strong>Payment Status:</strong> {{ $order->payment_status ?? 'Pending' }}
                </td>
            </tr>
        </table> --}}

        <div>
            <table>
                <tbody style="text-align: center">
                    <tr>
                        <td style="font-weight: bolder; border:0;width:25%">Ville: Fes</td>
                        <td style="font-weight: bolder; border:0;width:25%">Tel: 065245414</td>
                        <td style="font-weight: bolder; border:0;width:25%">Fax: 056245214</td>
                        <td style="font-weight: bolder; border:0;width:25%">N° I.C.E: 00215478557485</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bolder; border:0;width:25%">Bon de livraison: 3C4D4C4X</td>
                        <td style="font-weight: bolder; border:0;width:25%">Condition d'expedition:  N/A</td>
                        <td style="font-weight: bolder; border:0;width:25%">Expedition:  N/A</td>
                        <td style="font-weight: bolder; border:0;width:25%">N° Expedition: 652145</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Product Table -->
        <table>
            <thead>
                <tr>
                    <th style="width: 15%;">Reference</th>
                    <th style="width: 40%;">Designation</th>
                    <th style="width: 5%;">Qte</th>
                    <th style="width: 10%;">Prix.U</th>
                    <th style="width: 10%;">Remise</th>
                    <th style="width: 10%;">Prix.U.net</th>
                    <th style="width: 10%;">Total HT</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalDiscount = 0;
                    $subtotal = 0;
                @endphp
                @foreach($order->items as $item)
                    @php
                        $unitPrice = $item->product->dimensions ? $item->dimension->price : $item->product->price;
                        $discountRate = 12; // Example fixed discount
                        $discountAmount = $unitPrice * ($discountRate / 100);
                        $netUnitPrice = $unitPrice - $discountAmount;
                        $itemTotal = $item->quantity * $netUnitPrice;

                        $totalDiscount += $item->quantity * $discountAmount;
                        $subtotal += $itemTotal;
                    @endphp
                    <tr>
                        <td>{{ $item->product->dimensions ? $item->dimension->code : $item->product->code }}</td>
                        <td>
                            {{ $item->product?->name }}
                            {{ $item->product->dimensions ? '(' . $item->dimension->dimension . ')' : '' }}
                            {{ $item->dimension?->color?->name ?? $item->color?->name }}
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($unitPrice, 2) }}</td>
                        <td>{{ $discountRate }}%</td>
                        <td>{{ number_format($netUnitPrice, 2) }}</td>
                        <td>{{ number_format($itemTotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="5" style="text-align: right;">Subtotal</td>
                    <td colspan="2">${{ number_format($subtotal, 2) }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="5" style="text-align: right;">Total Discount</td>
                    <td colspan="2">${{ number_format($totalDiscount, 2) }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="5" style="text-align: right;"><strong>Total Amount</strong></td>
                    <td colspan="2"><strong>${{ number_format($order->total_amount, 2) }}</strong></td>
                </tr>
            </tfoot>
        </table>

        <table>
            <tr>
                <td style="border: 1px solid black;width:33.33333333333333%">
                    <table style="margin: 0!important; padding:0!important">
                        <tr class="width:100%">
                            <td style="width: 25%!important; border:0; padding:0; font-size:9px">Code Taxe</td>
                            <td style="width: 25%!important; border:0; padding:0; font-size:9px">Base</td>
                            <td style="width: 25%!important; border:0; padding:0; font-size:9px">Taux</td>
                            <td style="width: 25%!important; border:0; padding:0; font-size:9px">Taxe</td>
                        </tr>
                        <tr style="width:100%">
                            <td style="width: 25%!important; border:0; padding:0; font-size:9px">C20</td>
                            <td style="width: 25%!important; border:0; padding:0; font-size:9px">25445,00</td>
                            <td style="width: 25%!important; border:0; padding:0; font-size:9px">20%</td>
                            <td style="width: 25%!important; border:0; padding:0; font-size:9px">5089,00</td>
                        </tr>
                    </table>

                    <div style="margin-top: 12px">Droit de timbre &#xa0; &#xa0;  0,00</div>
                    <div>Total Taxe &#xa0; &#xa0;  __</div>
                </td>
                <td style="border: 1px solid black;width:30.33333333333333%">
                    <div style="font-size:10px; font-weight: bold">Conditions de Reglements</div>
                    <table style="padding:0!important">
                        <tr>
                            <td style="border: 0;padding:0;">01/11/24</td>
                            <td style="border: 0;padding:0;">Virement</td>
                            <td style="border: 0;padding:0;">30 534,00</td>
                        </tr>
                    </table>
                </td>
                <td style="border: 1px solid black;width:36.33333333333333%; padding: 0">
                    <table style="margin: 0!important; padding:0!important">
                        <tr style="border-bottom: 1px solid black">
                            <td style="border:0; padding:0; font-size:10px; border-right: 1px solid black; padding-left: 2px; width:50%">
                                <div>Total HT: <strong> &#xa0; &#xa0; 25 445,00</strong></div>
                                <div>Total TTC: <strong> &#xa0; &#xa0; 30 534,00</strong></div>
                                <div>Acompte: <strong> &#xa0; &#xa0; 0,00</strong></div>
                            </td>
                            <td style="border:0; padding:0; font-size:8px;text-align: center;width:50%">
                                <div style="font-size: 8px">
                                    NET A PAYE EN DIRHAME
                                </div>
                                <div style="font-size: 11px">30 534,00</div>
                            </td>
                        </tr>
                    </table>
                    <div style="margin-top: 2px; font-size:8px; padding:2px">Areter le apesent Facture N° 24FA1862   &#xa0;  &#xa0; a la somme de : Trente mille cinq cet trente quatre Dirham</div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
