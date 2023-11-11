import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

//TERCEIROS
import VueMask from '@devindex/vue-mask'; 
import DropZone from 'dropzone-vue';

// Vuetify
// import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, fa } from 'vuetify/iconsets/fa'
import { mdi } from 'vuetify/iconsets/mdi'
//Componente do vuetify
import { VDataTable } from 'vuetify/labs/VDataTable'
//Style
import '@fortawesome/fontawesome-free/css/all.css'
import 'dropzone-vue/dist/dropzone-vue.common.css';
import colors from 'vuetify/lib/util/colors'


const vuetify = createVuetify({
    components: {
        ...components,
        ...directives,
        VDataTable
    },
    icons: {
        defaultSet: 'fa',
        aliases,
        sets: {
          fa,
          mdi,
        }
    },
    theme: {
        themes: {
            light: {
                colors: {
                    primary: '#2587E9', // #413b6b
                    secondary: '#afbdcc', // #FFCDD2
                    error: '#E44D3A',
                    info: '#70b3ec',
                    warning: '#fec107',
                    success: '#00c292',
                    disable: '#cfdded'
                }
            }
        }
    }
})

const appName = import.meta.env.VITE_APP_NAME || 'Escolha Azul';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(vuetify)
            .use(VueMask)
            .use(DropZone)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
