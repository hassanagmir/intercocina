

<div class=" flex flex-col space-y-16 overflow-hidden">
    <div class="overflow-x-scroll no-scrollbar">
        <div class="splide">
            <div class="splide__track mb-10">
                <div class="splide__list flex gap-6 ">
                    @foreach($covers as $cover)
                        <section class="p-5 py-6 bg-white rounded-lg text-center shadow-sm transform duration-500 hover:-translate-y-2 cursor-pointer w-56 snap-center splide__slide shrink-0 min-w-64">
                            <a href="{{ $cover->url }}">
                            <div class="flex justify-center">
                                <img src="{{ url(config('app.storage'), $cover->image) }}" class="w-48 object-contain" alt="{{ $cover->title }}">
                            </div>
                                <div class="space-x-1 flex justify-center mt-10">
                                    <svg class="w-4 h-4 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                        <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z"></path>
                                    </svg>
                                    <svg class="w-4 h-4 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                        <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z"></path>
                                    </svg>
                                    <svg class="w-4 h-4 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                        <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z"></path>
                                    </svg>
                                    <svg class="w-4 h-4 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                        <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z"> </path>
                                    </svg>
                                    <svg class="w-4 h-4 mx-px fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                        <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-md my-5 font-semibold">{{ $cover->title }}</h3>
                            {{-- <button class="p-2 px-6 bg-purple-500 text-white rounded-md hover:bg-purple-600">Add To Cart</button> --}}
                            </a>
                        </section>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
