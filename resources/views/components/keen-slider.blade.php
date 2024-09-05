@php
    $id = $id ?? str()->random(4);
    $camelCaseId = str()->camel($id);
@endphp

<div {{ $attributes->merge(['class' => 'keen-slider']) }} id="{{ $id }}">
    {{ $slot }}
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const keenSlider_{{ $camelCaseId }} = new KeenSlider(
                '#{{ $id }}',
                {
                    loop: true,
                    slides: {
                        origin: 'center',
                        perView: 1.25,
                        spacing: 16,
                    },
                    breakpoints: {
                        '(min-width: 1024px)': {
                            slides: {
                                origin: 'auto',
                                perView: 2.5,
                                spacing: 32,
                            },
                        },
                    },
                }
            );

            const keenSliderPrevious_{{ $camelCaseId }} = document.querySelector('.keen-slider-previous[data-target="{{ $id }}"]');
            const keenSliderNext_{{ $camelCaseId }} = document.querySelector('.keen-slider-next[data-target="{{ $id }}"]');

            if (keenSliderPrevious_{{ $camelCaseId }} && keenSliderNext_{{ $camelCaseId }}) {
                keenSliderPrevious_{{ $camelCaseId }}.addEventListener('click', () => keenSlider_{{ $camelCaseId }}.prev());
                keenSliderNext_{{ $camelCaseId }}.addEventListener('click', () => keenSlider_{{ $camelCaseId }}.next());
            } else {
                console.warn('Keen Slider navigation buttons not found');
            }
        });
    </script>
@endpush
