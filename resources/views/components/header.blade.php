@props(['headerClass' => ''])

@php
    $headerClass = implode(' ', [...explode(' ', ''), ...explode(' ', $headerClass)]);
@endphp


<header class="{{ $headerClass }}">
    {{ $slot }}
</header>

