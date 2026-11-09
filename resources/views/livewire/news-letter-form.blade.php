<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component {

    #[Validate('required|email|max:255|unique:newsletter_subscribers,email')]
    public string $email = '';

    public bool $emailSent = false;

    public function subscribe()
    {
        $this->emailSent = false;

        $this->validate();

        

        $this->reset();
        // Send email to the user
        $this->emailSent = true;
    }
}; ?>

<div
    class="w-full max-w-lg bg-accent-red px-8 py-16 xl:ml-36 rounded-3xl relative overflow-hidden order-1 xl:order-2 md:flex md:justify-center">
    <x-circle-shape class="bg-accent-gray absolute z-0 -bottom-10 -left-10" x-animate.intersect="zoomIn"/>
    <x-circle-shape class="bg-accent-gray w-36 md:w-80 absolute z-0 -top-16 -right-16 md:-top-28 md:-right-28" x-animate.intersect="zoomIn"/>

    <div class="w-full relative z-20 space-y-6">
        <div class="space-y-2">
            <h4 class="text-white text-4xl font-bold uppercase tracking-wide">
                {{ __("Newsletter") }}
            </h4>
            <p class="text-white text-lg">
                {{ __("Stay up to date! Subscribe to our newsletter.") }}
            </p>
        </div>
        <div class="flex flex-col gap-4">

            <x-forms.input name="newsletter_email" wire:model="email"
                           label-class="sr-only" class="rounded-xl"
                           :placeholder="__('Email')" />

            <x-loading-button wire:click="subscribe" :show-confirmation="$emailSent" :disabled="$emailSent"
                              label="{{ $emailSent ? __('Email sent') : __('Subscribe') }}"/>

            <div>
                @if($emailSent)
                    <p class="text-white font-semibold">
                        {{ __("Please check your email for a verification link to complete your subscription.") }}
                    </p>
                    <hr class="my-2">
                @endif
                <p class="text-white text-sm">
                    {{ __("We respect your privacy. You can unsubscribe at any time.") }}
                </p>
            </div>
        </div>

    </div>
</div>
