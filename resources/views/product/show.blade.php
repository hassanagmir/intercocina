@extends('layouts.base')


@section('content')

<section class="py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @livewire('product', ['product' => $product], key($product->id))


       <div class="mt-6">
        <h2 class="text-2xl font-bold">{{ __("Description de")}} {{ $product->name}}</h2>
        <div class="mt-4 prose">
            {!! $product->content  !!}
           </div>
       </div>
    </div>
</section>

@endsection