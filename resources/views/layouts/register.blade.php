<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  @vite('resources/css/app.css')
</head>

<body class="hold-transition @yield('classe-body')">
    @yield('form')
    @vite('resources/js/app.js')
</body>
</html>
