<!DOCTYPE html>
<html>
<head>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
        @livewire('qr-scanner')
        </div>
    </div>
</body>
</html>