@php

    use App\Enums\PersonType;

    $type = $person->person_type;

    $canAccessBaptism = in_array(
        $type,
        [
            PersonType::CONGREGANT,
            PersonType::MEMBER,
        ],
        true
    );

    $canAccessFamily = in_array(
        $type,
        [
            PersonType::CONGREGANT,
            PersonType::MEMBER,
        ],
        true
    );

    $canAccessMinistries = $type === PersonType::MEMBER;

@endphp

<div class="card shadow-sm">

    <div class="card-header">

        <strong>Módulos da Igreja</strong>

    </div>

    <div class="list-group list-group-flush">

        {{-- Batismo --}}
    @if($canAccessBaptism)

        <div class="list-group-item">

            <div class="d-flex justify-content-between align-items-center">

                <a
                    href="{{ route('people.baptism.index', $person) }}"
                    class="text-decoration-none text-dark flex-grow-1">

                    <i class="bi bi-droplet-half me-2"></i>

                    Batismo

                </a>

                <div class="text-end ms-3">

                    @if($person->baptism)

                        <span class="text-success small d-block">

                            <i class="bi bi-check-circle-fill me-1"></i>

                            Batizado

                        </span>

                        <small class="text-muted d-block">

                            {{ $person->baptism->baptism_date->format('d/m/Y') }}

                        </small>

                        <a
                            href="{{ route('people.baptism.certificate', $person) }}"
                            class="btn btn-sm btn-outline-primary mt-2">

                            <i class="bi bi-file-earmark-text me-1"></i>

                            Certificado

                        </a>

                    @else

                        <span class="text-warning small">

                            <i class="bi bi-exclamation-circle-fill me-1"></i>

                            Não registrado

                        </span>

                    @endif

                </div>

            </div>

        </div>

    @else

        <span
            class="list-group-item text-muted"
            title="Disponível apenas para Congregados e Membros">

            <i class="bi bi-lock-fill me-2"></i>

            Batismo

        </span>

    @endif

        {{-- Família --}}
        @if($canAccessFamily)

            <a
                href="#"
                class="list-group-item list-group-item-action">

                <i class="bi bi-people me-2"></i>

                Família

            </a>

        @else

            <span
                class="list-group-item text-muted"
                title="Disponível apenas para Congregados e Membros">

                <i class="bi bi-lock-fill me-2"></i>

                Família

            </span>

        @endif

        {{-- Ministérios --}}
        @if($canAccessMinistries)

            <a
                href="#"
                class="list-group-item list-group-item-action">

                <i class="bi bi-person-workspace me-2"></i>

                Ministérios

            </a>

        @else

            <span
                class="list-group-item text-muted"
                title="Disponível apenas para Membros">

                <i class="bi bi-lock-fill me-2"></i>

                Ministérios

            </span>

        @endif

        {{-- Visitas --}}
        <a
            href="#"
            class="list-group-item list-group-item-action">

            <i class="bi bi-calendar-check me-2"></i>

            Visitas

        </a>

        {{-- Histórico --}}
        <a
            href="#"
            class="list-group-item list-group-item-action">

            <i class="bi bi-clock-history me-2"></i>

            Histórico

        </a>

    </div>

</div>
