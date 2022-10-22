import {createApp} from 'vue';
import App from './App.vue';
import router from './router';
import store from "./store";
import mitt from 'mitt';
import './bootstrap';

const app = createApp(App);
const emitter = mitt();
app.config.globalProperties.emitter = emitter;
app.config.globalProperties.$axios = window.axios;
app.use(router);
app.use(store);
app.mount('#app');
