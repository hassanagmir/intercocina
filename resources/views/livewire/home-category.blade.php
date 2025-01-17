{{-- <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($categories as $category)
        <div class="rounded-xl bg-white shadow-sm">
            <a class="relative flex h-60 overflow-hidden rounded-t-xl bg-gray-200" href="{{ route('category.show', $category->slug) }}">
            @if ($category->image)
              <img class="sm:object-cover object-contain w-full h-full bg-gray-200" width="auto" height="auto" src="{{ url(config('app.storage'), $category->image) }}" alt="{{ $category->name }}" />
            @else
                <img class="sm:object-cover object-contain w-full h-full bg-gray-200 border-2 overflow-hidden rounded-xl" width="auto" height="auto" src="/assets/imgs/placeholder-image.webp" alt="{{ $category->name }}" />
            @endif
            </a>
            <div class="mt-4 pb-5 px-2">
            <a href="{{ route('category.show', $category->slug) }}">
                <h3 class="text-lg font-semibold leading-tight text-gray-900 hover:underline">{{ $category->name }}</h3>
            </a>
            <div class="mt-2 mb-3 flex items-center justify-between">
                <p class="w-full">
                    <span class="text-sm text-slate-900">{{ $category->description }}</span>
                </p>
                
            </div>
            <div class="mt-auto">
                <a href="{{ route('category.show', $category->slug) }}" 
                   class="inline-flex items-center text-sm font-medium text-primary-600 transition-colors hover:text-primary-700">
                    Explore Category
                    <svg class="ml-1 h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            
            </div>

        </div>
    @endforeach --}}
{{-- 
    <div class="rounded-xl bg-white border-2 shadow-sm">
        <a class="relative flex h-60 overflow-hidden rounded-t-xl bg-gray-200" href="#">
            <img class="sm:object-cover object-contain w-full h-full bg-gray-200" width="auto" height="auto" src="/placard.png" alt="Placards" />
        </a>
        <div class="mt-4 pb-5 px-2">
        <a href="">
            <h3 class="text-lg font-semibold leading-tight text-gray-900 hover:underline">Placards</h3>
        </a>
        <div class="mt-2 mb-5 flex items-center justify-between">
            <p class="w-full">
                <span class="text-sm text-slate-900">
                    Placards sur commande à partir de matériaux de haute qualité,
                     conçus pour répondre spécifiquement à vos besoins.
                </span>
            </p>
        </div>
        </div>
    </div> --}}
{{-- </div> --}}

<div class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen p-8">
<div class="max-w-6xl mx-auto">
    <h1 class="text-4xl font-bold text-center mb-12 text-gray-900">Top startups love Simple</h1>
    
    <div class="testimonial-track overflow-hidden relative">
        <!-- Left blur gradient -->
        <div class="blur-gradient-left"></div>
        
        <!-- Right blur gradient -->
        <div class="blur-gradient-right"></div>

        <div class="sliding-testimonials flex gap-6 whitespace-nowrap">
            <!-- First set of testimonials -->
            <div class="flex gap-6">
                <div class="w-96 flex-shrink-0 bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="/api/placeholder/48/48" alt="Michael Ross" class="w-12 h-12 rounded-full">
                        <div>
                            <h3 class="font-semibold text-gray-900">Michael Ross</h3>
                            <p class="text-gray-500 text-sm">@michjack</p>
                        </div>
                    </div>
                    <p class="text-gray-700">Simple lives up to its name in every way. It's incredibly easy to use yet powerful enough to handle all my tasks effortlessly. It's become an essential part of my daily routine.</p>
                    <div class="mt-4 text-gray-500 text-sm">Jan 15, 2027</div>
                </div>

                <div class="w-96 flex-shrink-0 bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="/api/placeholder/48/48" alt="Peter Lowe" class="w-12 h-12 rounded-full">
                        <div>
                            <h3 class="font-semibold text-gray-900">Peter Lowe</h3>
                            <p class="text-gray-500 text-sm">@peterlowex</p>
                        </div>
                    </div>
                    <p class="text-gray-700">As a founder, having a visually appealing and user-friendly website is essential. This tool not only helped me achieve that but also improved my site's performance and SEO.</p>
                    <div class="mt-4 text-gray-500 text-sm">May 19, 2027</div>
                </div>

                <div class="w-96 flex-shrink-0 bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="/api/placeholder/48/48" alt="Rodri Alba" class="w-12 h-12 rounded-full">
                        <div>
                            <h3 class="font-semibold text-gray-900">Rodri Alba</h3>
                            <p class="text-gray-500 text-sm">@rodri_spn</p>
                        </div>
                    </div>
                    <p class="text-gray-700">Simple has revolutionized the way I manage my work. Its intuitive interface and seamless functionality make staying organized effortless. I can't imagine my life without it.</p>
                    <div class="mt-4 text-gray-500 text-sm">Apr 12, 2027</div>
                </div>
            </div>

            <!-- Duplicate set for seamless loop -->
            <div class="flex gap-6">
                <div class="w-96 flex-shrink-0 bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="/api/placeholder/48/48" alt="Michael Ross" class="w-12 h-12 rounded-full">
                        <div>
                            <h3 class="font-semibold text-gray-900">Michael Ross</h3>
                            <p class="text-gray-500 text-sm">@michjack</p>
                        </div>
                    </div>
                    <p class="text-gray-700">Simple lives up to its name in every way. It's incredibly easy to use yet powerful enough to handle all my tasks effortlessly. It's become an essential part of my daily routine.</p>
                    <div class="mt-4 text-gray-500 text-sm">Jan 15, 2027</div>
                </div>

                <div class="w-96 flex-shrink-0 bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="/api/placeholder/48/48" alt="Peter Lowe" class="w-12 h-12 rounded-full">
                        <div>
                            <h3 class="font-semibold text-gray-900">Peter Lowe</h3>
                            <p class="text-gray-500 text-sm">@peterlowex</p>
                        </div>
                    </div>
                    <p class="text-gray-700">As a founder, having a visually appealing and user-friendly website is essential. This tool not only helped me achieve that but also improved my site's performance and SEO.</p>
                    <div class="mt-4 text-gray-500 text-sm">May 19, 2027</div>
                </div>

                <div class="w-96 flex-shrink-0 bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="/api/placeholder/48/48" alt="Rodri Alba" class="w-12 h-12 rounded-full">
                        <div>
                            <h3 class="font-semibold text-gray-900">Rodri Alba</h3>
                            <p class="text-gray-500 text-sm">@rodri_spn</p>
                        </div>
                    </div>
                    <p class="text-gray-700">Simple has revolutionized the way I manage my work. Its intuitive interface and seamless functionality make staying organized effortless. I can't imagine my life without it.</p>
                    <div class="mt-4 text-gray-500 text-sm">Apr 12, 2027</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>