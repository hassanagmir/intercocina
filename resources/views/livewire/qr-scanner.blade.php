<div>
    <div id="reader"></div>
    
    @if($error)
        <div class="mt-4 p-4 bg-red-100 text-red-700 rounded">
            {{ $error }}
        </div>
    @endif

    @if($scannedCode)
        <div class="mt-4 p-4 bg-blue-100 text-blue-700 rounded">
            Scanning code: {{ $scannedCode }}
        </div>
    @endif

    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
    <script>
        document.addEventListener('livewire:load', function () {
            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", 
                { 
                    fps: 10,
                    qrbox: 250
                }
            );

            function onScanSuccess(decodedText, decodedResult) {
                // Stop the scanner after successful scan
                html5QrcodeScanner.clear();
                
                // Send the scanned code to the Livewire component
                @this.set('scannedCode', decodedText);
                @this.scanComplete();
            }

            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>
    @endpush
</div>