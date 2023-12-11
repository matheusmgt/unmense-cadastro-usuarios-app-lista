
<template>
    <div class="row text-center">
        <div class="col-lg-12 mb-4">
            <img :src="'https://www.ummense.com/img/header/ummense.png'" />
        </div>
        <Divider />
        <div class="col-lg-12 mb-4">
            <span class="p-input-icon-left">
                <i class="fa-solid fa-envelope"></i>
                <InputText v-model="this.data.email" placeholder="Email" type="email"
                    :class="{ 'p-invalid': this.v$.data.email.$error }" />
            </span>
            <div class="input-errors" v-for="error of this.v$.data.email.$errors" :key="error.$uid">
                <div class="error-msg text-left" style="text-align: left;"><i class="fas fa-warning"></i> {{
                    this.getLangError(error) }}</div>
            </div>
        </div>
        <div class="col-lg-12 mb-4">
            <span class="p-input-icon-left">
                <i class="fa-solid fa-lock"></i>
                <InputText v-model="this.data.password" placeholder="Senha" type="password" />
            </span>
            <div class="input-errors" v-for="error of this.v$.data.password.$errors" :key="error.$uid">
                <div class="error-msg text-left" style="text-align: left;"><i class="fas fa-warning"></i> {{
                    this.getLangError(error) }}</div>
            </div>
        </div>
        <span class="p-input-icon-left">
            <Button type="button" label="Login" icon="fa-solid fa-right-to-bracket" :loading="loading" @click="login()" />
        </span>
    </div>
</template>

    
<script lang="ts">

import { useVuelidate } from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'

import InputText from 'primevue/inputtext'
import Button from 'primevue/button'
import Divider from 'primevue/divider'

export default {
    components: { InputText, Button, Divider },
    setup() {
        return { v$: useVuelidate() }
    },
    data() {
        return {
            data: {
                email: '',
                password: '',
            },
            loading: false
        }
    },
    validations() {
        return {
            data: {
                email: { required, email },
                password: { required }
            }
        }
    },
    methods: {
        async login() {

            if ((!await this.v$.$validate())) {
                this.ToastrError('Atenção! Verifique os campos, e tente novammente!')
                return;
            }

            this.loading = true

            try {
                let key = await this.sendRequestAPI('POST', '/api/login', this.data, 'application/json', false, false)
                localStorage.setItem('key', key.data)
                this.$router.push('/admin/usuario')
            } catch (err) {
                this.loading = false;
                this.ToastrError('Atenção! Credenciais inválidas, tente novamente.')
            }

        }
    }
}

</script>
