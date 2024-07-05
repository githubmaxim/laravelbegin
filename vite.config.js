import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/bootstrap/bootstrap.bundle.js', 'resources/css/main.css', "resources/bootstrap/bootstrap.css"],
            refresh: true,
        }),
    ],
});
