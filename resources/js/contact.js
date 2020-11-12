require('./app');

import ContactForm from "./components/ContactForm";

const app = new Vue({
    el: '#app',
    components: {
        ContactForm
    }
});