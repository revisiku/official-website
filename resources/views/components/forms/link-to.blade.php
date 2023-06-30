@php
    $type = $attributes->has('type') ? $attributes->get('type') : 'dark'
@endphp

<a
    {{ $attributes->merge(['class' => 'btn btn-'.$type.' btn-custom']) }}
>
    {{ $slot }}
</a>
