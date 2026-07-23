<div class="row">

    <div class="col-md-12">

        <x-form.input
            name="name"
            label="Nome"
            :value="$person->name ?? ''"
            required/>

    </div>

    <div class="col-md-6">

        <x-form.select
            name="person_type"
            label="Tipo de Pessoa"
            :options="$personTypes"
            :selected="$person->person_type->value ?? ''"
            required/>

    </div>

    <div class="col-md-6">

        <x-form.select
            name="gender"
            label="Gênero"
            :options="$genders"
            :selected="$person->gender->value ?? ''"
            required/>

    </div>

    <div class="col-md-6">

        <x-form.input
            name="birth_date"
            type="date"
            label="Data de Nascimento"
            :value="isset($person) && $person->birth_date ? $person->birth_date->format('Y-m-d') : ''"/>

    </div>

    <div class="col-md-6">

        <x-form.input
            name="phone"
            label="Telefone"
            :value="$person->phone ?? ''"/>

    </div>

    <div class="col-md-12">

        <x-form.input
            name="email"
            type="email"
            label="E-mail"
            :value="$person->email ?? ''"/>

    </div>

    <div class="col-md-12">

        <div class="form-check">

            <input
                class="form-check-input"
                type="checkbox"
                name="active"
                id="active"
                value="1"
                @checked(old('active', $person->active ?? true))>

            <label
                class="form-check-label"
                for="active">

                Ativo

            </label>

        </div>

    </div>

</div>
