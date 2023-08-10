import './bootstrap';
import { createApp } from "vue";
import home from './components/Home.vue'

const app = createApp({
    components: {
       home,
    }
})

app.mount('#app');
