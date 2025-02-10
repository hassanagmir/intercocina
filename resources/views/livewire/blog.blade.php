<section class="py-12 overflow-x-hidden">
    <div class="px-4 max-w-6xl mx-auto">
        @foreach ($posts as $post)
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <div class="col-span-full md:col-span-1">
                <a class="block" href="{{ route('post.show', $post->slug )}}" target="_blank">
                    <div class="overflow-hidden w-full aspect-video bg-white rounded-lg border">
                        <img loading="lazy" class="object-contain w-full aspect-video transform transition-transform duration-300 hover:scale-110" src="{{ url(config('app.storage'), $post->image) }}" alt="{{ $post->title }}">
                    </div>
                    <h3 class="pt-4 text-xl font-bold uppercase">
                        {{ Str::limit($post->title, 50, '...') }}
                    </h3>
                    <p class="text-slate-500 text-md">
                        {{ Str::limit($post->description, 80, '...') }}
                    </p>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>