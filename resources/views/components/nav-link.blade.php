<a {{ $attributes->merge(['class' => "hover:text-accent-red " . ($active ? 'text-accent-red': 'text-gray-600')]) }}>
    {{ $slot }}
</a>
