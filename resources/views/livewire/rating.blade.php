<div>
    <h2 class="text-2xl font-bold mb-4">Average Rating</h2>
    <div class="flex items-center mb-2">
        <span class="text-3xl font-bold mr-2">{{ $averageRating }}</span>
        <div class="flex">
            <template x-for="star in [1,2,3,4,5]" :key="star">
                <svg width="24" height="24"
                    :class="star <= {{ $averageRating }} ? 'text-yellow-400' : 'text-gray-600'"
                    fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </template>
        </div>
    </div>
    <div class="mb-11 mt-6">
        <div class="col-span-12 xl:col-span-4 flex items-center">
            <div class="box flex flex-col gap-y-4 w-full max-xl:max-w-3xl mx-auto">
                @foreach ($stars as $star => $value)
                <div class="flex items-center mt-4">
                    <a href="#" class="text-sm text-gray-600 font-semibold text-nowrap">{{ $star}} Étoile</a>
                    <div class="w-full h-5 mx-4 bg-gray-300 rounded">
                        <div class="h-5 bg-yellow-300 rounded" style="width: {{ $value }}%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-500">{{ $value }}%</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
