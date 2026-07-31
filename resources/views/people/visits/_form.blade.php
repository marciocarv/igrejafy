<x-form.section title="Dados da Visita">

    <div class="row">

        <div class="col-md-4">

            <x-form.input
                name="visit_date"
                type="date"
                label="Data da Visita"
                :value="old('visit_date', now()->format('Y-m-d'))"
                required />

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
            class="form-control @error('notes') is-invalid @enderror">{{ old('notes') }}</textarea>

        @error('notes')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</x-form.section>
