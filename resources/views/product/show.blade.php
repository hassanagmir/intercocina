@extends('layouts.base')
@section('content')
<section class="py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @livewire('product', ['product' => $product], key($product->id))
        <div class="mt-6">
            <h2 class="sm:text-2xl text-xl font-bold">{{ __("Détails du produit")}} {{ $product->name}}</h2>
            @if ($product->options)
            <div class="relative overflow-x-auto border-t-2 border-x-2 sm:rounded-lg mt-4">
                <table class="w-full text-sm text-left rtl:text-right">
                    <tbody>
                        @foreach ($product->options as $key => $value)
                        <tr class="border-b-2 font-semibold hover:bg-gray-50 duration-500">
                            <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                {{ $key }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $value }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            <div class="mt-4 prose">
                {!! $product->content !!}
            </div>

            {{-- Recomendation product --}}
            <h2 class="mb-2 mt-3 text-2xl font-black">
                <span class="underline underline-offset-3 decoration-7 decoration-red-400">
                    {{ __("Nos recommandations") }}
                </span>
            </h2>

            
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($products as $product)
                <x-product-card name="{{ $product->name}}" price="{{ $product->price() }}"
                    image="{{ $product->images?->first()?->image }}" slug="{{ $product->slug }}" />
                @endforeach
            </div>



            <div class="bg-white border-2 p-4 rounded-2xl mt-10">
                @livewire('rating-form', ['product' => $product], key($product->id))
            </div>


            @empty(!$product->reviews)
                {{-- Rating list --}}
                <div>
                    @livewire('reviews-list', ['product' => $product], key($product->id))
                </div>                
            @endempty

        </div>
    </div>
</section>

@endsection