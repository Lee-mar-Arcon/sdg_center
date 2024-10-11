import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                // 'resources/css/app.scss', // Use this if you're using Sass
                'resources/css/app.css', // Uncomment this if you are using CSS instead of SCSS
            ],
            refresh: true, // Automatically refresh the browser on changes
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
