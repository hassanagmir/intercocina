@extends('layouts.base')


@section('content')
<section class="py-8 antialiased md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div>
        @livewire('product-list', ["category" => $category], key($category->slug))
      </div>
    </div>
  </section>
@endsection