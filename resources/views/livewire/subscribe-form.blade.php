<div class="w-full max-w-lg bg-accent-red px-8 py-16 xl:ml-36 rounded-3xl relative overflow-hidden order-1 xl:order-2 md:flex md:justify-center">
    <div class="w-40 aspect-square rounded-full bg-accent-gray absolute z-0 -bottom-10 -left-10"
        x-animate.intersect="zoomIn"></div>
    <div class="aspect-square rounded-full bg-accent-gray w-36 md:w-80 absolute z-0 -top-16 -right-16 md:-top-28 md:-right-28"
        x-animate.intersect="zoomIn"></div>

    <div class="w-full relative z-20 space-y-6">
        <div class="space-y-2">
            <h3 class="text-white text-4xl font-bold uppercase tracking-wide"> Newsletter </h3>
            <p class="text-white text-lg">
                Restez informés ! Abonnez-vous à notre newsletter.
            </p>
        </div>
        <div class="flex flex-col gap-4">

            <div class="space-y-2">
                <label for="newsletter_email" for="newsletter_email" class="sr-only">
                    Newsletter_email
                </label>

                <input type="text" id="newsletter_email" name="newsletter_email" placeholder="Email"
                    class="w-full border-gray-200 p-4 text-sm  rounded-xl" wire:model="email"
                    label-class="sr-only" />
            </div>

            <button class="flex items-center justify-center gap-2 text-accent-red bg-white px-6 py-3 rounded-xl font-semibold hover:bg-accent-red hover:bg-transparent border hover:border-white hover:text-white" wire:click="subscribe" label="Subscribe">
                <svg wire:loading xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path wire:loading.class="animate-rotate"
                        d="M3 12a9 9 0 0 0 9 9a9 9 0 0 0 9 -9a9 9 0 0 0 -9 -9" />
                    <path wire:loading.class="animate-rotate-reverse" d="M17 12a5 5 0 1 0 -5 5" />
                </svg>
                {{ __("S'abonner") }}
            </button>

            <div>
                @if (session()->has('message'))
                <p class="font-semibold mb-3 text-white">{{ session('message') }}</p>
                @endif
                <p class="text-white text-sm">
                    {{ __("Nous respectons votre vie privée. Vous pouvez vous désinscrire à tout moment") }}.
                </p>
            </div>
        </div>

    </div>
</div>