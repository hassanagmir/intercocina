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
                'resources/css/filament/admin/theme.css',
            ],
            refresh: true,
        }),
        react(),

        compression(),
    ],

    assetsInclude: ['**/*.ttf'],
    base: '/',
    build: {
        chunkSizeWarningLimit: 1000,
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['react', 'react-dom'],
                }
            }
        }
    }
});
