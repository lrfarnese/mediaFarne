<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed Media Farne</title>
    @vite('resources/css/app.css')
    @stack('styles')
</head>
<body>
@include('layouts.partes-feed.nav-bar')
<main>
    @yield('content')
</main>
@include('layouts.partes-feed.nav-bottom')

@include('layouts.partes-feed.toast')
@include('layouts.partes-feed.modal')

@vite('resources/js/app.js')

<script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.toast').forEach(function (toastEl) {
            new bootstrap.Toast(toastEl).show();
        });

        @if($errors->any())
        var modalId = "{{ old('_modal') }}";
        var modalEl = modalId ? document.getElementById(modalId) : null;
        if (modalEl) {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
        @endif
    });
</script>
</body>
</html>
