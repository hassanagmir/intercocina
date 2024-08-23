<a {{ $attributes->merge(['class' => "hover:text-accent-green " . ($active ? 'text-accent-green': 'text-gray-600')]) }}>
    {{ $slot }}
</a>
