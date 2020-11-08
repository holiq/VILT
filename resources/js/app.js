require('./bootstrap');

import { App, plugin } from '@inertiajs/inertia-vue'
import PortalVue from 'portal-vue';
import Vue from 'vue';

Vue.mixin({ methods: { route } });
Vue.use(plugin)
Vue.use(PortalVue);

const el = document.getElementById('app');

new Vue({
    render: h => h(App, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default,
        },
    }),
}).$mount(el)

