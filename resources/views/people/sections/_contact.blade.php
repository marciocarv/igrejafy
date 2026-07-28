<div class="card shadow-sm mb-3">

    <div class="card-header">

        <strong>Contato</strong>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">

                <strong>

                    <i class="bi bi-telephone-fill me-2"></i>

                    Telefone

                </strong>

                <p class="mb-0">

                    {{ $person->phone ?: '-' }}

                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>

                    <i class="bi bi-envelope-fill me-2"></i>

                    E-mail

                </strong>

                <p class="mb-0">

                    {{ $person->email ?: '-' }}

                </p>

            </div>

        </div>

    </div>

</div>
