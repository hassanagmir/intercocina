<section class="overflow-hidden  md:max-w-7xl md:mx-auto">
    <div class="px-4 py-16 sm:px-6 lg:me-0 lg:pe-0 lg:ps-8">
        <div class="items-end justify-between max-w-7xl sm:flex sm:pe-6 lg:pe-8"
            x-animate.intersect="fadeInRight">
            <div class="space-y-4">
                <h2 class="mb-4 text-2xl font-bold md:text-4xl" x-animate.intersect="fadeInUp">
                    Témoignages
                </h2>
                <p class="text-slate-500 md:text-lg" x-animate.intersect.delay.100="fadeInUp">
                    Ce que nos clients pensent de nous
                </p>
            </div>
            <div class="flex gap-4 mt-8 lg:mt-0">
                <button aria-label="Previous slide" data-target="testimonials"
                    class="swiper-review-prev p-3 transition border rounded-full keen-slider-previous border-accent-blue-500 text-accent-blue-500 hover:bg-accent-blue-500 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-5 rtl:rotate-180">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>

                <button aria-label="Next slide" data-target="testimonials"
                    class="swiper-review-next p-3 transition border rounded-full keen-slider-next border-accent-blue-500 text-accent-blue-500 hover:bg-accent-blue-500 hover:text-white">
                    <svg class="size-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </button>
            </div>
        </div>

   


        <div class="mt-8 -mx-6 lg:col-span-2 lg:mx-0">
            <!-- Thumbnail Swiper -->

            <div class="swiper-container">
    
                <!-- swiper slides -->
                <div class="swiper-wrapper">
                    @foreach ($reviews as $review)
                    <blockquote class="swiper-slide flex flex-col justify-between h-full p-6 bg-white border rounded-lg shadow-sm sm:p-8 lg:p-12">
                        <div>
                            <div class="flex gap-0.5">
                                <template x-for="star in [1,2,3,4,5]" :key="star">
                                    <svg class="w-5 h-5"
                                        :class="{ 'text-yellow-400': star < {{ $review->stars }} }"
                                        fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </template>
                            </div>

                            <div class="mt-4">
                                <h3 class="text-2xl font-bold text-accent-blue-500 sm:text-3xl">
                                    {{ $review->full_name }}</h3>

                                <p class="mt-4 leading-relaxed text-gray-700">
                                    {{ $review->comment }}
                                </p>
                            </div>
                        </div>

                        <footer class="mt-4 text-md font-semibold text-gray-700 sm:mt-6">
                            &mdash; {{ $review->product->type->name }} ({{ $review->product->name }})
                        </footer>
                    </blockquote>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>