@extends('layouts.base')
@section('content')
<section class="py-6 md:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @livewire('product', ['product' => $product], key($product->id))
        <div class="mt-6">
            @if ($product->options || $product->content)
            <div class="p-4 rounded-xl border bg-white">
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
            </div>
            @endif
            <div>
                <x-share-buttons :product="$product" />
            </div>
            @if ($product->type->category->name == "Parquets")
            <x-floopr-ceatures />

            <div class="bg-white border-2 p-4 rounded-2xl mt-10">
                <div class="block">
                    <h2 class="mb-8 text-2xl font-semibold">Couches</h2>
                    <img src="https://www.kastamonuentegre.com/uploads/2022/12/fr-floorpan.png" alt="">
                </div>
            </div>    
            @endif

            {{-- Recomendation product --}}
            <h2 class="mb-2 mt-3 text-2xl font-black">
                <span class="underline underline-offset-3 decoration-7 decoration-red-400">
                    {{ __("Nos recommandations") }}
                </span>
            </h2>
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($products as $item)
                <x-product-card name="{{ $item->name}}" price="{{ $item->price() }}" 
                    category="{{ $item?->type?->category->name }}"
                    image="{{ $item->images?->first()?->image }}" slug="{{ $item->slug }}" />
                @endforeach
            </div>
           
            <div class="bg-white border-2 p-4 rounded-2xl mt-10">
                @livewire('rating-form', ['product' => $product], key($product->id))
            </div>
            
            @if(count($product->reviews->where("status", 1)))
                {{-- Rating list --}}
                <div>
                    @livewire('reviews-list', ['product' => $product], key($product->id))
                </div>                
            @endif

        </div>
    </div>
</section>

@endsection