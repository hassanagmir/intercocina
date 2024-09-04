@extends('layouts.base')


@section('content')

<section class="py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @livewire('product', ['product' => $product], key($product->id))
       <div class="mt-6 prose">
        {!! $product->content  !!}
       </div>
    </div>
</section>

@endsection