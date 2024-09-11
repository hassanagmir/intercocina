@extends('layouts.dash')
@section('content')
<div class="container mx-auto pb-5">
    <h1 class="text-2xl font-black text-gray-700">{{ __("Changer le mot de passe") }}</h1>
    @livewire('change-password')
    
</div>
@endsection