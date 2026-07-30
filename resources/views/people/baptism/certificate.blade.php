<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Certificado de Batismo - {{ $person->name }}
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <style>

        body {
            background: #f5f5f5;
        }

        .certificate-wrapper {
            width: 100%;
            margin: 0 auto;
        }

        .certificate {
            background: white;
            border: 8px double #333;
            min-height: 170mm;
            width: 100%;
            padding: 50px 70px;
            box-sizing: border-box;
        }

        .certificate-header {
            text-align: center;
        }

        .certificate-title {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .certificate-subtitle {
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .person-name {
            font-size: 2.4rem;
            font-weight: 700;
            text-transform: uppercase;
            margin: 35px 0;
        }

        .certificate-text {
            font-size: 1.15rem;
            line-height: 1.8;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #333;
            padding-top: 8px;
            text-align: center;
        }

        .certificate-footer {
            margin-top: 70px;
        }

        @media print {

            @page {
                size: A4 landscape;
                margin: 10mm;
            }

            html,
            body {
                width: 100%;
                height: 100%;
                background: white !important;
            }

            .no-print {
                display: none !important;
            }

            .container {
                max-width: none !important;
                width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .certificate-wrapper {
                width: 100%;
                max-width: none !important;
                margin: 0;
            }

            .certificate {
                width: 100%;
                min-height: 180mm;
                border: 8px double #333;
                box-shadow: none !important;
                padding: 45px 60px;
                box-sizing: border-box;
            }

}

    </style>

</head>

<body>

<div class="container-fluid py-4 px-4">

    <div class="d-flex justify-content-between align-items-center mb-4 no-print">

        <a
            href="{{ route('people.show', $person) }}"
            class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>

            Voltar

        </a>

        <button
            type="button"
            class="btn btn-primary"
            onclick="window.print()">

            <i class="bi bi-printer me-1"></i>

            Imprimir

        </button>

    </div>

    <div class="certificate-wrapper">

        <div class="certificate shadow-sm">

            <div class="certificate-header">

                {{-- Logo será adicionado depois --}}

                <div class="mb-4">

                    <h2 class="certificate-title mb-1">

                        {{ $baptism->church_name }}

                    </h2>

                    <div class="certificate-subtitle">

                        Certificado de Batismo

                    </div>

                </div>

                <hr>

                <h1 class="certificate-title mt-5">

                    CERTIFICADO DE BATISMO

                </h1>

            </div>

            <div class="certificate-text mt-5">

                <p>

                    Certificamos que

                </p>

                <div class="person-name">

                    {{ mb_strtoupper($person->name) }}

                </div>

                <p>

                    foi batizado(a) em nossa igreja no dia

                </p>

                <p class="fs-4 fw-semibold">

                    {{ $baptism->baptism_date->translatedFormat('d \d\e F \d\e Y') }}

                </p>

                @if($baptism->pastor_name)

                    <p class="mt-4">

                        Celebrante:

                        <strong>
                            {{ $baptism->pastor_name }}
                        </strong>

                    </p>

                @endif

                @if($baptism->city || $baptism->state)

                    <p>

                        {{ $baptism->city }}

                        @if($baptism->state)

                            - {{ $baptism->state }}

                        @endif

                    </p>

                @endif

            </div>

            @if(
                $baptism->certificate_book ||
                $baptism->certificate_page ||
                $baptism->certificate_number
            )

                <div class="text-center mt-5">

                    <p class="fw-semibold mb-2">

                        Registro do Batismo

                    </p>

                    <div>

                        @if($baptism->certificate_book)

                            <span class="me-3">

                                Livro:
                                {{ $baptism->certificate_book }}

                            </span>

                        @endif

                        @if($baptism->certificate_page)

                            <span class="me-3">

                                Página:
                                {{ $baptism->certificate_page }}

                            </span>

                        @endif

                        @if($baptism->certificate_number)

                            <span>

                                Registro:
                                {{ $baptism->certificate_number }}

                            </span>

                        @endif

                    </div>

                </div>

            @endif

            <div class="row certificate-footer">

                <div class="col-md-6">

                    <div class="signature-line">

                        Pastor / Celebrante

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="signature-line">

                        Responsável pelo Registro

                    </div>

                </div>

            </div>

            <div class="text-center mt-5 text-muted small">

                Certificado emitido pelo IMIDE

            </div>

        </div>

    </div>

</div>

</body>

</html>
