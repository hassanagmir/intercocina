import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import compression from "vite-plugin-compression2";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/tiptap.css',
                'resources/js/app.js',
                'resources/js/keen-slider.js',
                'resources/css/filament/admin/theme.css',
            ],
            refresh: true,
        }),

        compression(),
    ],
});
