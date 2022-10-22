<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Name - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</head>
<body>
    <div id="app"></div>
</body>
<script>
    window.SERVER = {
        url: "{{ config('app.url') }}",
        api_url: "{{ config('app.api_url') }}",
    }
</script>
</html>
