@extends('layouts.base')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-20 overflow-x-hidden md:overflow-visible">

    <section class="">
        <div class="px-4 mx-auto max-w-screen-xl text-center lg:px-12">
            <div class="w-full flex justify-center py-6">
                <a href="#">
                    <img class="w-48" src="/assets/imgs/intercocina-logo.png" width="192px" height="auto" title="Intercocina FAQs" loading="lazy" alt="Intercocina faq">
                </a>
            </div>
            <h1
                class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl">
                Frequently asked questions (FAQ)</h1>
            <p class="mb-8 text-md font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48">Vous avez des questions? Vous
                trouverez ici les réponses les plus appréciées par nos partenaires, ainsi que l'accès à des instructions
                détaillées et à un support.</p>

        </div>
    </section>


    <div class="grid gap-3 py-8 text-lg leading-6 text-gray-800 md:gap-8 md:grid-cols-2">
        <div class="space-y-3">
            <!-- 1 -->
            @foreach ($faqs as $faq)
            @if ($loop->even)
            <div x-data="accordion({{ $faq->id }})" class="relative transition-all duration-700 border rounded-xl bg-white shadow-sm">
                <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                    <div class="flex items-center justify-between">
                        <span class="tracking-wide text-xl font-semibold">{{ $faq->question }}</span>
                        <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current ">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div x-ref="tab" :style="handleToggle()"
                    class="relative overflow-hidden transition-all duration-700 max-h-0">
                    <div class="p-4 text-gray-600">{{ $faq->answer }}</div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <div class="space-y-3">
            @foreach ($faqs as $faq)
            @if ($loop->odd)
            <div x-data="accordion({{ $faq->id }})"
                class="relative transition-all duration-700 border rounded-xl bg-white shadow-sm">
                <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                    <div class="flex items-center justify-between">
                        <span class="tracking-wide text-xl font-semibold">{{ $faq->question }}</span>
                        <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current ">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div x-ref="tab" :style="handleToggle()"
                    class="relative overflow-hidden transition-all duration-700 max-h-0">
                    <div class="p-4 text-gray-600">{{ $faq->answer }}</div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>


    @if (!$faqs->count())
    <div class="flex items-center w-full justify-center">
        <div>
            <img class="w-24 py-6 text-center" src="/assets/icons/empay-black.png" alt="Empyt faqs">
            <p class="text-xl font-black text-center">FAQs Vide</p>
        </div>
    </div>
    @endif
</div>
@endsection