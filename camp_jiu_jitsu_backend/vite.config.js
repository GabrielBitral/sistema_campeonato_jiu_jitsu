import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/style.css',
                'resources/css/snackbar.css',
                'resources/css/cadastrar_campeonato.css',
                'resources/js/app.js',
                'resources/js/cadastrar_campeonato.js',
            ],
            refresh: true,
        }),
    ],
});
