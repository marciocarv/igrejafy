<x-form.section title="Dados do Batismo">

    <div class="row">

        <div class="col-md-4">

            <x-form.input
                name="baptism_date"
                type="date"
                label="Data do Batismo"
                :value="$baptism?->baptism_date?->format('Y-m-d')"
                required />

        </div>

        <div class="col-md-8">

            <x-form.input
                name="church_name"
                label="Igreja"
                :value="$baptism->church_name ?? ''"
                required />

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">

            <x-form.input
                name="pastor_name"
                label="Pastor"
                :value="$baptism->pastor_name ?? ''" />

        </div>

        <div class="col-md-4">

            <x-form.input
                name="city"
                label="Cidade"
                :value="$baptism->city ?? ''" />

        </div>

        <div class="col-md-2">

            <x-form.input
                name="state"
                label="UF"
                :value="$baptism->state ?? ''"
                maxlength="2" />

        </div>

    </div>

</x-form.section>

<x-form.section title="Registro do Certificado">

    <div class="row">

        <div class="col-md-4">

            <x-form.input
                name="certificate_book"
                label="Livro"
                :value="$baptism->certificate_book ?? ''" />

        </div>

        <div class="col-md-4">

            <x-form.input
                name="certificate_page"
                label="Página"
                :value="$baptism->certificate_page ?? ''" />

        </div>

        <div class="col-md-4">

            <x-form.input
                name="certificate_number"
                label="Número do Registro"
                :value="$baptism->certificate_number ?? ''" />

        </div>

    </div>

</x-form.section>

<x-form.section title="Observações">

    <div class="mb-3">

        <label
            for="notes"
            class="form-label">

            Observações

        </label>

        <textarea
            name="notes"
            id="notes"
            rows="4"
            class="form-control @error('notes') is-invalid @enderror">{{ old('notes', $baptism->notes ?? '') }}</textarea>

        @error('notes')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</x-form.section>
