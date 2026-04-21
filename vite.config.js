import { defineConfig } from 'vite'

// https://vitejs.dev/config/
export default defineConfig({
  build: {
    watch: {
      include: 'src/**'
    },
    rollupOptions: {
      input: {
        frontend: '/src/frontend/main.js',
        frontend_editor: '/src/frontend-editor/main.js',
        editor: '/src/editor/main.js',
        woocommerce: '/src/woocommerce/main.js',
      },
      output: {
        dir: 'assets/dist/',
        entryFileNames: 'index.js',
        assetFileNames: 'index.css'
      }  
    }
  }
});