import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
      outDir: 'public/build',
      base: '/build/'
    },
    server: {
      proxy: {
        '/': 'http://localhost'
      }
    }
  })