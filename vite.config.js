import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import compression from "vite-plugin-compression2";
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/tiptap.css',
                'resources/js/app.js',
                'resources/js/main.jsx',
                'resources/css/filament/admin/theme.css',
            ],
            // refresh: true,

        }),

        react(),
        compression(),
    ],
    assetsInclude: ['**/*.ttf'],
    base: '/',
    resolve: {
        alias: {
            '@': '/resources/js',
        },
    },
});
