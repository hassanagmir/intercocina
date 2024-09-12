@extends('layouts.base')


@section('content')

<section class="py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @livewire('product', ['product' => $product], key($product->id))
        <div class="mt-6">
            <h2 class="sm:text-2xl text-xl font-bold">{{ __("Description de")}} {{ $product->name}}</h2>
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
            <div class="mt-4 prose">
                {!! $product->content !!}
            </div>
        </div>
    </div>
</section>

@endsection