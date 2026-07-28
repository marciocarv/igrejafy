<div class="card shadow-sm mb-3">

    <div class="card-body text-center">

        <div
            class="rounded-circle bg-primary text-white d-inline-flex justify-content-center align-items-center mx-auto"
            style="width: 90px; height: 90px; font-size: 2rem;">

            {{ strtoupper(substr($person->name, 0, 1)) }}

        </div>

        <h4 class="mt-3 mb-2">

            {{ $person->name }}

        </h4>

        <div class="mb-2">

            <span class="badge
                @if($person->person_type->value === 'member')
                    bg-success
                @elseif($person->person_type->value === 'congregant')
                    bg-primary
                @else
                    bg-warning text-dark
                @endif">

                {{ $person->person_type->label() }}

            </span>

        </div>

        <div>

            @if($person->is_active)

                <span class="badge bg-success">

                    Ativo

                </span>

            @else

                <span class="badge bg-danger">

                    Inativo

                </span>

            @endif

        </div>

    </div>

</div>
