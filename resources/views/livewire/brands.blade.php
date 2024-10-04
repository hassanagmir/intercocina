<div>
    <div class="md:max-w-5xl md:mx-auto">

    
    <h2 class="pt-20 pb-4 text-2xl font-bold text-center md:text-4xl" x-animate.intersect="fadeInUp">
        {{ __("Nos marques") }}
    </h2>
    <p class="text-xl text-center" x-animate.intersect="fadeInUp">Nos marques se distinguent par leur qualité, leur design innovant et un parfait équilibre entre style et fonctionnalité, offrant des solutions de cuisine élégantes et précises.</p>
    </div>


    <ul class="grid gap-8 py-5 md:grid-cols-3">
        @foreach ($brands as $brand)
        <li class="px-4 py-6 space-y-2 text-lg duration-300 bg-white border shadow-lg text-slate-500 rounded-2xl hover:cursor-pointer hover:scale-105 " x-animate.intersect.threshold.20="zoomInUp">
            <img class="object-cover w-full" width="100%" height="100%" title="{{ $brand->name }}" loading="lazy" src="{{ Storage::url($brand->logo) }}" alt="{{ $brand->name }}">
            <h3 class="text-lg font-semibold text-black md:text-xl">{{ $brand->name }}</h3>
            <p>
               {{ $brand->description }}
            </p>
        </li>
        @endforeach
    </ul>

    <div class="flex flex-col justify-center gap-10 px-4 py-24 md:flex-row">
        <a href="/contact" class="btn btn-primary"
            x-animate.intersect="fadeInRight">
            Travaillez avec nous
        </a>
    </div>
</div>
