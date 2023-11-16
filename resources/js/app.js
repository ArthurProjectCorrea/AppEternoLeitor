import './bootstrap';
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mount(el);
    },
});
