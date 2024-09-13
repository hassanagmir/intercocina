

<div>
    @foreach ($product->reviews as $review)
    <article>
        <div class="flex items-center mb-4">
            <img class="w-10 h-10 me-4 rounded-full" src="https://www.testhouse.net/wp-content/uploads/2021/11/default-avatar.jpg" alt="Hassan Agmir">
            <div class="font-medium dark:text-white">
                <p>{{ $review->full_name }} <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500 dark:text-gray-400">Inscrit en {{ $review->created_at->format('M d Y')}}</time></p>
            </div>
        </div>
        <div class="flex gap-0.5">
            <template x-for="star in [1,2,3,4,5]" :key="star">
                <svg class="w-4 h-4"
                    :class="star <= {{ $review->stars }} ? 'text-yellow-400' : 'text-gray-600'"
                    fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </template>
        </div>
        <p class="mb-2 text-gray-500 dark:text-gray-400 whitespace-pre-line -mt-4">
            {{ $review->comment }}
        </p>
    </article>
    @endforeach
</div>
