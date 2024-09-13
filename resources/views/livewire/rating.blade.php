<div class="grid grid-cols-12 mb-11 mt-6">

    <div class="col-span-12 xl:col-span-4 flex items-center">
        <div class="box flex flex-col gap-y-4 w-full max-xl:max-w-3xl mx-auto">
            @foreach ($stars as $star => $value)
            <div class="flex items-center mt-4">
                <a href="#" class="text-sm text-gray-600 font-semibold text-nowrap">{{ $star}} Étoile</a>
                <div class="w-full h-5 mx-4 bg-gray-300 rounded">
                    <div class="h-5 bg-yellow-300 rounded" style="width: {{ $value }}%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $value }}%</span>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-span-12 max-xl:mt-8 xl:col-span-8 xl:pl-8 w-full min-h-[230px]">
        <div class="grid grid-cols-12 h-full px-8 max-lg:py-8 rounded-3xl bg-gray-200 border-2 w-full max-xl:max-w-3xl max-xl:mx-auto">
            <div class="col-span-12 md:col-span-8 sm:flex sm:items-center">
                <div class="sm:pr-3 sm:border-r border-gray-200 flex items-center justify-center flex-col">
                    <h2 class="font-manrope font-bold text-5xl text-black text-center mb-4">{{ $averageRating }}</h2>
                    <div class="flex items-center gap-3 mb-4">
                        <template x-for="star in [1,2,3,4,5]" :key="star">
                            <svg width="36" height="36"
                                :class="star <= {{ $averageRating }} ? 'text-yellow-400' : 'text-gray-600'"
                                fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </template>
                        
                    </div>
                    <p class="font-normal text-lg leading-8 text-gray-400">{{ $product->reviews->count() }} Évaluations</p>
                </div>
            </div>
            <div class="col-span-12 md:col-span-4 max-lg:mt-8 md:pl-8">
                <div class="flex items-center flex-col justify-center w-full h-full ">
                    <button class="rounded-full px-6 py-4 bg-red-500 font-semibold text-lg text-white whitespace-nowrap mb-6 w-full text-center shadow-sm shadow-transparent transition-all duration-500 hover:bg-red-700 hover:shadow-red-400">
                        Écrire un avis
                    </button>
                    <button class="rounded-full px-6 py-4 bg-white font-semibold text-lg text-red-500 whitespace-nowrap w-full text-center shadow-sm shadow-transparent transition-all duration-500 hover:bg-red-100 hover:shadow-red-200">
                        Tous les avis
                    </button>
                </div>
            </div>
        </div>
    </div>
 
</div>