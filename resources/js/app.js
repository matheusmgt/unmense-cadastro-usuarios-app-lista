import { router } from './routes/routes'
import { createApp } from 'vue'
import { methods } from './helpers/helpers'
import PrimeVue from 'primevue/config';
import ConfirmationService from 'primevue/confirmationservice';

import 'primevue/resources/themes/lara-light-green/theme.css'
import 'primevue/resources/primevue.min.css'
import 'primeicons/primeicons.css'
import '../css/boostrap-theme/bootstrap.min.css';
import '../css/app.css'

const app = createApp()

app.use(router)
app.use(PrimeVue)
app.use(ConfirmationService);
app.mixin({methods})

app.mount('#vue-app')
