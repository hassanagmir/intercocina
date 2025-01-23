<section class="max-w-5xl m-auto py-16 px-4 overflow-hidden space-y-10">
 @if ($collections->count())
    <div>
        <div class="md:max-w-5xl md:mx-auto mb-5">
            <h2 class="mb-4 text-2xl font-bold text-center md:text-4xl animate__animated animate__fadeInUp" x-animate.intersect="fadeInUp" style="--animate-duration: 1s;">
                Decouvrez Nos Meilleures Offres Maintenant
            </h2>
            <p class="text-center text-slate-500 md:text-lg animate__animated animate__fadeInUp" x-animate.intersect.delay.100="fadeInUp" style="--animate-duration: 1s;">
                Profitez des promotions exclusives sur nos produits de haute qualité. Découvrez une large gamme d’articles adaptés à vos besoins, avec des prix imbattables et une disponibilité immédiate.
            </p>
        </div>

        <div class="flex flex-col items-stretch justify-between gap-8 md:max-w-6xl md:mx-auto md:flex-row md:gap-20">
            @foreach ($collections as $collection)
            <div class="w-full animate__animated animate__zoomInUp" x-animate.intersect="zoomInUp" style="--animate-duration: 1s;">
                <div class="overflow-hidden rounded-xl">
                    <a href="{{ route('collection.show', $collection->slug )}}">
                        <img loading="lazy" width="100%" class="object-cover w-full transform transition-transform duration-300 hover:scale-110" src="{{ url(config('app.storage'), $collection->image) }}" alt="{{ $collection->title }}">
                    </a>
                </div>
                <a href="{{ route('collection.show', $collection->slug )}}" target="_blank">
                    <h3 class="pt-4 text-xl font-medium">
                        {{ $collection->title }}
                    </h3>
                    <p class="text-slate-500 text-md">
                        {{ Str::limit($collection->description, 100, '...') }}
                    </p>
                </a>
            </div>
            @endforeach
        </div>
        <div class="flex justify-center md:max-w-6xl md:mx-auto gap-4 animate__animated animate__fadeInUp mt-10" x-animate.intersect="fadeInUp" style="--animate-duration: 1s;">
                <a href="http://localhost:8000/contact" class="btn btn-accent-gray animate__animated animate__fadeInUp flex items-center justify-center gap-2 p-2 md:p-3" x-animate.delay.200="fadeInUp" style="--animate-duration: 1s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087a3 3 0 0 0 1.398 0c.52-.125 1.001-.446 1.963-1.087l6.98-4.654M7.158 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"></path></svg>
                    <span>Contact</span>
                </a>
                <a href="{{ route('products') }}" class="flex gap-2 justify-center items-center btn btn-primary animate__animated animate__fadeInUp p-2 md:p-3" x-animate.intersect="fadeInUp" style="--animate-duration: 1s;">
                    Nos produits
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="m8.818 15.182l6.364-6.364m-4.95 0h4.95v4.95"/><path d="M21 12a9 9 0 1 1-18 0a9 9 0 0 1 18 0"/></g></svg>
                </a>
        </div>
    </div>
 @endif
</section>