<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed Media Farne</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <div class="app-wrapper">
        @include('layouts.partes-admin.header')
        @include('layouts.partes-admin.sidebar')
        
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid py-3">
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="app-footer">
            <strong>Media Farnese</strong>
        </footer>
    </div>

</body>
</html>