<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="w-full h-dvh">
        <div class="flex w-full h-full justify-center items-center gap-3">
            <a href="/provinces" class="p-5 bg-blue-200 rounded-lg hover:bg-blue-300 font-semibold text-white">Lihat
                Provinsi</a>
            <a href="/regencies" class="p-5 bg-blue-700 rounded-lg hover:bg-blue-800 font-semibold text-white">Lihat
                Kabupaten</a>
        </div>
    </div>
</body>

</html>
