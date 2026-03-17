<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? "Pūkainītis"}}</title>
    <link rel="stylesheet" href="{{ asset("style.css") }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    
    <x-navigation />
    {{ $slot }}
    
</body>
</html>