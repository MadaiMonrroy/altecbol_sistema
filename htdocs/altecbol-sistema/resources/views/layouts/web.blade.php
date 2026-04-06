<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-toast />
    <title>@yield('title', 'ALTECBOL')</title>
    
    <link rel="icon" type="image/png" href="{{ asset('images/icon_color.png') }}">
    <link rel="preload" as="image" href="{{ asset('images/portada_altecbol.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        altecbol: {
                            primary: '#0050b0',
                            secondary: '#01d3d1',
                            light: '#eaeaea',
                            dark: '#0b1220'
                        }
                    },
                    fontFamily: {
                        sans: ['Arial', 'sans-serif']
                    },
                    boxShadow: {
                        soft: '0 10px 30px rgba(0,0,0,0.08)',
                        card: '0 8px 24px rgba(0,80,176,0.10)',
                    }
                }
            }
        }
    </script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background: #ffffff;
            color: #1f2937;
        }

        .hero-grid {
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 28px 28px;
        }
    </style>

</head>

<body class="font-sans antialiased">

    @include('web.partials.header')

    <main>
        @yield('content')
    </main>

    @include('web.partials.footer')

</body>

</html>
