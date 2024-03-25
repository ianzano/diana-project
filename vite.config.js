import { defineConfig, splitVendorChunkPlugin } from "vite"

import react from "@vitejs/plugin-react-swc"
import liveReload from "vite-plugin-live-reload"

import path from "node:path"

export default defineConfig({
    plugins: [
        react(),
        liveReload([
            __dirname + "/(res|cache)/**/*.php",
            __dirname + "/dist/*.php",
        ]),
        splitVendorChunkPlugin(),
    ],

    root: "res",
    base: "/",

    build: {
        outDir: "../dist",
        emptyOutDir: false,
        manifest: true,
        rollupOptions: {
            input: path.resolve(__dirname, "res/main.jsx"),
        }
    },

    server: {
        strictPort: true,
        port: 3000,
        origin: "http://localhost:3000"
    }
})