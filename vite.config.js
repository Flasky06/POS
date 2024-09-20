import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
<<<<<<< HEAD
=======
import react from '@vitejs/plugin-react';
>>>>>>> 910265b (Initial commit after reinitializing Git)

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< HEAD
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
=======
            input: 'resources/js/app.jsx',
            refresh: true,
        }),
        react(),
>>>>>>> 910265b (Initial commit after reinitializing Git)
    ],
});
