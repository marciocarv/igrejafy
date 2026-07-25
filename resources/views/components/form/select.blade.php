@props([
    'name',
    'label',
    'options' => [],
    'selected' => null,
    'required' => false,
])

<div>

    <label for="{{ $name }}" class="form-label">

        {{ $label }}

        @if($required)
            <span class="text-danger">*</span>
        @endif

    </label>

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge([
            'class' => 'form-select' . ($errors->has($name) ? ' is-invalid' : '')
        ]) }}
    >

        <option value="">
            Selecione...
        </option>

        @foreach($options as $value => $text)

            <option
                value="{{ $value }}"
                @selected(old($name, $selected) == $value)>

                {{ $text }}

            </option>

        @endforeach

    </select>

    @error($name)

        <div class="invalid-feedback">

            {{ $message }}

        </div>

    @enderror

</div>
