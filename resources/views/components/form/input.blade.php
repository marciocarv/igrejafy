@props([
    'name',
    'label',
    'type' => 'text',
    'value' => '',
    'required' => false,
])

<div>

    <label for="{{ $name }}" class="form-label">

        {{ $label }}

        @if($required)
            <span class="text-danger">*</span>
        @endif

    </label>

    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge([
            'class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : '')
        ]) }}
    >

    @error($name)

        <div class="invalid-feedback">

            {{ $message }}

        </div>

    @enderror

</div>
