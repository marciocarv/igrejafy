<div class="card shadow-sm mt-4">

    <div class="card-header">

        <strong>

            <i class="bi bi-lightning-charge-fill me-2"></i>

            Ações Rápidas

        </strong>

    </div>

    <div class="card-body">

        <div class="row g-3">

            <div class="col-md-3">

                <a href="{{ route('people.create') }}"
                   class="text-decoration-none">

                    <div class="card h-100 border-primary dashboard-action">

                        <div class="card-body text-center">

                            <i class="bi bi-person-plus display-5 text-primary"></i>

                            <h5 class="mt-3">

                                Nova Pessoa

                            </h5>

                            <small class="text-muted">

                                Cadastrar membro, congregado ou visitante.

                            </small>

                        </div>

                    </div>

                </a>

            </div>

            <div class="col-md-3">

                <a href="{{ route('people.index') }}"
                   class="text-decoration-none">

                    <div class="card h-100 dashboard-action">

                        <div class="card-body text-center">

                            <i class="bi bi-person-lines-fill display-5 text-success"></i>

                            <h5 class="mt-3">

                                Pessoas

                            </h5>

                            <small class="text-muted">

                                Consultar cadastros.

                            </small>

                        </div>

                    </div>

                </a>

            </div>

            <div class="col-md-3">

                <a href="{{ route('reports.index') }}"
                   class="text-decoration-none">

                    <div class="card h-100 dashboard-action">

                        <div class="card-body text-center">

                            <i class="bi bi-file-earmark-bar-graph display-5 text-warning"></i>

                            <h5 class="mt-3">

                                Relatórios

                            </h5>

                            <small class="text-muted">

                                Emitir relatórios.

                            </small>

                        </div>

                    </div>

                </a>

            </div>

            <div class="col-md-3">

                <a href="{{ route('reports.visits') }}"
                   class="text-decoration-none">

                    <div class="card h-100 dashboard-action">

                        <div class="card-body text-center">

                            <i class="bi bi-calendar-check display-5 text-danger"></i>

                            <h5 class="mt-3">

                                Visitas

                            </h5>

                            <small class="text-muted">

                                Consultar visitas.

                            </small>

                        </div>

                    </div>

                </a>

            </div>

        </div>

    </div>

</div>
