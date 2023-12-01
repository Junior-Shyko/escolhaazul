<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#2587E9" />
        <title inertia>{{ config('app.name', 'Escolha Azul') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
        <script>
            var EscolhaApp = {};
        
            EscolhaApp.assetURL = "{{ asset('') }}";
            EscolhaApp.baseURL = "{{ url('') }}/";
            EscolhaApp.baseAPI = "{{ url('') }}/api/";
          </script>
        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
        @filamentStyles
    </head>
    <body class="font-sans antialiased">
        @inertia
        @filamentScripts
    </body>
</html>
