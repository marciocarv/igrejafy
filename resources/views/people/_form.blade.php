<x-form.section title="Dados Pessoais">

    <div class="row">

        <div class="col-md-6">

            <x-form.input
                name="name"
                label="Nome"
                :value="$person->name ?? ''"
                required />

        </div>

        <div class="col-md-3">

            <x-form.select
                name="gender"
                label="Gênero"
                :options="$genders"
                :selected="$person->gender->value ?? ''"
                required />

        </div>

        <div class="col-md-3">

            <x-form.input
                name="birth_date"
                type="date"
                label="Data de Nascimento"
                :value="isset($person) && $person->birth_date ? $person->birth_date->format('Y-m-d') : ''" />

        </div>

    </div>

</x-form.section>

<x-form.section title="Contato">

    <div class="row">

        <div class="col-md-6">

            <x-form.input
                name="phone"
                label="Telefone"
                :value="$person->phone ?? ''" />

        </div>

        <div class="col-md-6">

            <x-form.input
                name="email"
                type="email"
                label="E-mail"
                :value="$person->email ?? ''" />

        </div>

    </div>

</x-form.section>

<x-form.section title="Endereço">

    <div class="row">

        <div class="col-md-3">

            <x-form.input
                name="zip_code"
                label="CEP"
                :value="$person->zip_code ?? ''" />

        </div>

        <div class="col-md-9">

            <x-form.input
                name="street"
                label="Endereço"
                :value="$person->street ?? ''" />

        </div>

    </div>

    <div class="row">

        <div class="col-md-3">

            <x-form.input
                name="number"
                label="Número"
                :value="$person->number ?? ''" />

        </div>

        <div class="col-md-9">

            <x-form.input
                name="complement"
                label="Complemento"
                :value="$person->complement ?? ''" />

        </div>

    </div>

    <div class="row">

        <div class="col-md-5">

            <x-form.input
                name="neighborhood"
                label="Bairro"
                :value="$person->neighborhood ?? ''" />

        </div>

        <div class="col-md-5">

            <x-form.input
                name="city"
                label="Cidade"
                :value="$person->city ?? ''" />

        </div>

        <div class="col-md-2">

            <x-form.input
                name="state"
                label="UF"
                :value="$person->state ?? ''"
                maxlength="2" />

        </div>

    </div>

</x-form.section>

<x-form.section title="Dados Eclesiásticos">

    <div class="row">

        <div class="col-md-6">

            <x-form.select
                name="person_type"
                label="Tipo de Pessoa"
                :options="$personTypes"
                :selected="$person->person_type->value ?? ''"
                required />

        </div>

        <div class="col-md-6 d-flex align-items-end">

            <div class="form-check mb-3">

                <input
                    type="checkbox"
                    class="form-check-input"
                    name="is_active"
                    id="is_active"
                    value="1"
                    @checked(old('is_active', $person->is_active ?? true))>

                <label
                    class="form-check-label"
                    for="is_active">

                    Ativo

                </label>

            </div>

        </div>

    </div>

</x-form.section>
