<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed Media Farne</title>
    @vite('resources/css/app.css')
</head>
<body class="">

    <div class="app-wrapper">
        <!--Como se fosse um app Bar Flutter -->
        @include('layouts.partes-admin.header')
        <!--Onde fica o menu do lado esquerdo para acessar diferentes Pags -->
        @include('layouts.partes-admin.sidebar')
        <!-- Informações dinâmicas(area principal) -->
        <div class="app-main">
            <div class="app-content-header">
                
            </div>
            <div class="app-content">
                @yield('content-main')
            </div>
            
        </div>
        
    </div>


    @vite('resources/js/app.js')
</body>
</html>