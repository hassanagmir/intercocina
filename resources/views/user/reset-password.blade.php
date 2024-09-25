@extends('layouts.base')


@section('content')
<div class="px-4 py-20 md:max-w-6xl md:mx-auto">
    @livewire('reset-form', ['token' => $token])
</div>
@endsection