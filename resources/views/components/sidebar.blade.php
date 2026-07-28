<aside class="col-md-2 bg-light border-end min-vh-100 p-3">

    <div class="list-group list-group-flush">

        <a
            href="{{ route('dashboard') }}"
            class="list-group-item list-group-item-action {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="bi bi-house-door me-2"></i> Painel

        </a>

        <div class="mt-4 mb-2 text-uppercase small text-muted fw-bold">

            Cadastros

        </div>

        <a
            href="{{ route('people.index') }}"
            class="list-group-item list-group-item-action {{ request()->routeIs('people.*') ? 'active' : '' }}">

            <i class="bi bi-people me-2"></i> Pessoas
        </a>

        <div class="mt-4 mb-2 text-uppercase small text-muted fw-bold">

            Relatórios

        </div>

        <a
            href="{{ route('reports.index') }}"
            class="list-group-item list-group-item-action {{ request()->routeIs('reports.*') ? 'active' : '' }}">

            <i class="bi bi-file-earmark-text me-2"></i>

            Relatórios

        </a>

    </div>

</aside>
