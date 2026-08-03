<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title', 'IMIDE')</title>

        @vite([
            'resources/css/app.css',
            'resources/js/app.js'
        ])
    </head>

    <body>

        @include('components.navbar')

        <div class="container-fluid">

            <div class="row">

                @include('components.sidebar')

                <main class="col-md-10 p-4 print-full-width">

                    @include('components.alerts')

                    @yield('content')

                </main>

            </div>

        </div>

        <footer class="border-top mt-5 py-3">

            <div class="container text-center text-muted">

                IgrejaFy - Sistema de Gestão Eclesiástica

                |

                © {{ now()->year }}



            </div>

        </footer>
    </body>

</html>
