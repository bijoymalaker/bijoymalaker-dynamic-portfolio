import { createInertiaApp, Head } from '@inertiajs/vue3';
import { createApp, h } from 'vue';
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import {
    faBookBookmark,
    faCakeCandles,
    faChevronDown,
    faEnvelope,
    faEye,
    faLocationDot,
    faPhone,
    faUserGraduate,
} from '@fortawesome/free-solid-svg-icons';
import AppLayout from '@/layouts/AppLayout.vue';
import 'vue-toast-notification/dist/theme-sugar.css';
import './style.css';

const appName = import.meta.env.VITE_APP_NAME || 'Bijoy Portfolio';
const pages = import.meta.glob('./pages/**/*.vue', { eager: true });

library.add(
    faEye,
    faEnvelope,
    faPhone,
    faCakeCandles,
    faLocationDot,
    faUserGraduate,
    faBookBookmark,
    faChevronDown,
);

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: (name) => {
        const page = pages[`./pages/${name}.vue`];

        if (!page) {
            throw new Error(`Page not found: ${name}`);
        }

        if (name.startsWith('admin/')) {
            // Admin pages handle their own layout or no default layout
            page.default.layout = page.default.layout || null;
        } else {
            page.default.layout = page.default.layout || AppLayout;
        }

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Head', Head)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },
    progress: {
        color: '#ee4646',
    },
});

