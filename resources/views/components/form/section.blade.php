@props([
    'title',
])

<div class="mb-4">

    <h5 class="border-bottom pb-2 mb-3 text-primary">

        {{ $title }}

    </h5>

    {{ $slot }}

</div>
