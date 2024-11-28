@extends('layouts.base')


@section('content')
<section class="antialiased">
  <div class="px-4 py-4 md:py-20 md:max-w-full md:flex gap-3 bg-gray-100">
    <div class="w-1/4 hidden md:block ps-4">
        @livewire('filter')
      </div>
      <div class="w-full md:w-9/12">
        @livewire('product-list', ["category" => $category], key($category->slug))
      </div>
    </div>
</section>
@endsection