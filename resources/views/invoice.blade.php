<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice {{ $order->code }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        *{
            font-family: Arial, sans-serif!important;
        }
    </style>
</head>
<body class="bg-white font-sans leading-relaxed max-w-4xl mx-auto p-3">
    <div class="bg-white">
        <!-- Invoice Header -->
        <div class="border-b border-gray-700 pb-2.5">
            <table class="w-full">
                <tr>
                    <td class="w-1/2 border-none">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('invoice-logo.png'))) }}" alt="Intercocina Logo" class="w-[302px] h-[133px]">
                    </td>
                    <td class="w-1/2 text-center border-none">
                        <p class="mb-2.5 font-bold text-red-500 text-sm">Pour Consulter l'attestation de regularite fiscale</p>
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('tax.png'))) }}" alt="Tax Info" class="w-16 mx-auto">
                        <div class="flex justify-between px-1">
                            <strong>Espace Cuisine</strong>
                            <strong>CL566</strong>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="my-2">
            FACTURE N° <strong>2457541</strong> &#xa0; &#xa0; Le: <strong>01/11/2024</strong>
        </div>

        <div>
            <table class="w-full mt-4">
                <tbody class="">
                    <tr>
                        <td class="font-semibold text-xs border-none w-1/4">Bon de livraison: 3C4D4C4X</td>
                        <td class="font-semibold text-xs border-none w-1/4">Condition d'expedition:  N/A</td>
                        <td class="font-semibold text-xs border-none w-1/4">Ville: Fes</td>
                        <td class="font-semibold text-xs border-none w-1/4">Tel: 065245414</td>
                    </tr>
                    <tr>
                      
                        <td class="font-semibold text-xs border-none w-1/4">Expedition:  N/A</td>
                        <td class="font-semibold text-xs border-none w-1/4">N° Expedition: 652145</td>
                        <td class="font-semibold text-xs border-none w-1/4">Fax: 056245214</td>
                        <td class="font-semibold text-xs border-none w-1/4">N° I.C.E: 00215478557485</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Product Table -->
        <table class="w-full border-collapse mt-5">
            <thead>
                <tr>
                    <th class="w-[15%] bg-red-400 text-white p-1.5 text-left text-xs font-bold">Reference</th>
                    <th class="w-[40%] bg-red-400 text-white p-1.5 text-left text-xs font-bold">Designation</th>
                    <th class="w-[5%] bg-red-400 text-white p-1.5 text-left text-xs font-bold">Qte</th>
                    <th class="w-[10%] bg-red-400 text-white p-1.5 text-left text-xs font-bold">Prix.U</th>
                    <th class="w-[10%] bg-red-400 text-white p-1.5 text-left text-xs font-bold">Remise</th>
                    <th class="w-[10%] bg-red-400 text-white p-1.5 text-left text-xs font-bold">Prix.U.net</th>
                    <th class="w-[10%] bg-red-400 text-white p-1.5 text-left text-xs font-bold">Total HT</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalDiscount = 0;
                    $subtotal = 0;
                @endphp
                @foreach($order->items as $item)
                    @php
                        $unitPrice = count($item->product->dimensions) ? $item->dimension?->price : $item->product?->price;
                        $discountRate = 12; // Example fixed discount
                        $discountAmount = $unitPrice * ($discountRate / 100);
                        $netUnitPrice = $unitPrice - $discountAmount;
                        $itemTotal = $item->quantity * $netUnitPrice;

                        $totalDiscount += $item->quantity * $discountAmount;
                        $subtotal += $itemTotal;
                    @endphp
                    <tr class="border border-gray-200">
                        <td class="p-1.5 text-xs font-bold">{{ count($item->product->dimensions) ? $item->dimension?->code : $item->product?->code }}</td>
                        <td class="p-1.5 text-xs">
                            {{ $item->product?->name }}
                            {{ count($item->product->dimensions) ? '(' . $item->dimension?->dimension . ')' : '' }}
                            {{ $item->dimension?->color?->name ?? $item->color?->name }}
                        </td>
                        <td class="p-1.5 text-xs font-bold">{{ $item->quantity }}</td>
                        <td class="p-1.5 text-xs font-bold">{{ number_format($unitPrice, 2) }}</td>
                        <td class="p-1.5 text-xs font-bold">{{ $discountRate }}%</td>
                        <td class="p-1.5 text-xs font-bold">{{ number_format($netUnitPrice, 2) }}</td>
                        <td class="p-1.5 text-xs font-bold">{{ number_format($itemTotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            {{-- <tfoot>
                <tr class="bg-gray-100 font-bold">
                    <td colspan="5" class="text-right pr-2">Subtotal</td>
                    <td colspan="2">${{ number_format($subtotal, 2) }}</td>
                </tr>
                <tr class="bg-gray-100 font-bold">
                    <td colspan="5" class="text-right pr-2">Total Discount</td>
                    <td colspan="2">${{ number_format($totalDiscount, 2) }}</td>
                </tr>
                <tr class="bg-gray-100 font-bold">
                    <td colspan="5" class="text-right pr-2">Total Amount</td>
                    <td colspan="2">${{ number_format($order->total_amount, 2) }}</td>
                </tr>
            </tfoot> --}}
        </table>

        <div class="grid grid-cols-3 gap-2 mt-2">
            <!-- Tax Details Section -->
            <div class="border border-black p-2 rounded-md">
                <div class="grid grid-cols-4 gap-1 text-[11px] font-bold mb-2">
                    <div>Code Taxe</div>
                    <div>Base</div>
                    <div>Taux</div>
                    <div>Taxe</div>
                </div>
                <div class="grid grid-cols-4 gap-1 text-[11px]">
                    <div>C20</div>
                    <div>25445,00</div>
                    <div>20%</div>
                    <div>5089,00</div>
                </div>
                <div class="mt-3 text-xs">
                    Droit de timbre &#xa0; &#xa0; 0,00
                </div>
                <div class="text-xs">
                    Total Taxe &#xa0; &#xa0;
                </div>
            </div>
        
            <!-- Payment Conditions Section -->
            <div class="border border-black p-2 rounded-md">
                <div class="text-[11px] font-bold mb-2">
                    Conditions de Reglements
                </div>
                <div class="flex justify-between text-[11px] font-semibold">
                    <span>01/11/24</span>
                    <span>Virement</span>
                    <span>30 534,00</span>
                </div>
            </div>
        
            <!-- Total and Payment Section -->
            <div class="border border-black w-full rounded-md overflow-hidden">
                <div class="grid grid-cols-2 border-b border-black">
                    <div class="p-2 text-[11px] border-r border-black">
                        <div>Total HT: <strong>25 445,00</strong></div>
                        <div>Total TTC: <strong>30 534,00</strong></div>
                        <div>Acompte: <strong>0,00</strong></div>
                    </div>
                    <div class="flex flex-col justify-center items-center text-center p-2">
                        <div class="font-bold text-xs">NET A PAYE EN DIRHAME</div>
                        <div class="text-md font-bold">30 534,00</div>
                    </div>
                </div>
                <div class="p-1 text-[11px]">
                    Arrêter le présent Facture N° 24FA1862 à la somme de : Trente mille cinq cent trente-quatre Dirhams.
                </div>
            </div>
        </div>
    </div>
</body>
</html>