import {defineConfig} from "vite";
import path from 'path';

export default defineConfig({
    build: {
        manifest: true,
        cssCodeSplit: true,
        rollupOptions: {
            input: '/src/js/main.js',
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@import "@/styles/style.scss";`
            },
        },
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'src'),
        },
    },
});
