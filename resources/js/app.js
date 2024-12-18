import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import ElementPlus from 'element-plus';
import 'element-plus/dist/index.css';
import * as ElementPlusIconsVue from '@element-plus/icons-vue';
import '../css/app.css';

import jQuery from 'jquery';
window.jQuery = jQuery;
window.$ = jQuery;

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        // Use Element Plus and its icons
        app.use(ElementPlus);
        for (const [key, component] of Object.entries(ElementPlusIconsVue)) {
            app.component(key, component);
        }

        app.use(plugin).mount(el); // Mount the app
    },
});
