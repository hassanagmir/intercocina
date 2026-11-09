@extends('layouts.base')

@section('content')
<section class="py-8 antialiased md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="text-xl font-semibold text-gray-900 sm:text-2xl">{{ __("Votre panier") }}</div>
      @livewire('cart-form')
    </div>
  </section>
  @endsection