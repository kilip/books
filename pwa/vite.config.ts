import { vitePlugin as remix } from "@remix-run/dev";
import { installGlobals } from "@remix-run/node";
import { defineConfig } from "vite";
import tsconfigPaths from "vite-tsconfig-paths";

installGlobals();

export default defineConfig({
  plugins: [remix(), tsconfigPaths()],
  server: {
    hmr: {
      // IMPORTANT: make vite to listen hmr on this port otherwise caddy won't work
      // clientPort: 443
    }
  }
});
