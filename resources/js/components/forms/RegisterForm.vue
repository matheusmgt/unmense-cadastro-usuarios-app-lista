
<template>
    <div class="row text-center form-container">
        <div class="col-lg-12 mb-4">
            <img :src="'https://www.ummense.com/img/header/ummense.png'" />
        </div>
        <Divider />
        <div class="col-lg-12 mb-4">
            <span class="p-input-icon-left">
                <i class="fa-solid fa-user"></i>
                <InputText v-model="this.data.name" placeholder="Nome" />
            </span>
            <div class="input-errors" v-for="error of this.v$.data.name.$errors" :key="error.$uid">
                <div class="error-msg text-left" style="text-align: left;"><i class="fas fa-warning"></i> {{
                    this.getLangError(error) }}</div>
            </div>
        </div>
        <div class="col-lg-12 mb-4">
            <span class="p-input-icon-left">
                <i class="fa-solid fa-envelope"></i>
                <InputText v-model="this.data.email" placeholder="Email" type="email" />
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
            <Button type="button" label="Finalizar cadastro" icon="fa-solid fa-right-to-bracket" :loading="loading"
                @click="registrar()" />
        </span>
    </div>
</template>
    
<script lang="ts">

import { useVuelidate } from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'

import Divider from 'primevue/divider'
import InputText from 'primevue/inputtext'
import Button from 'primevue/button'

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
                name: ''
            },
            loading: false
        }
    },
    validations() {
        return {
            data: {
                name: { required },
                email: { required, email },
                password: { required }
            }
        }
    },
    methods: {
        async registrar() {

            if ((!await this.v$.$validate())) {
                this.ToastrError('Atenção! Verifique os campos, e tente novammente!')
                return;
            }

            this.loading = true
            let response = await this.sendRequestAPI('POST', '/api/user', this.data, 'application/json', false, false)
            if(response.data.error) {
                this.ToastrError(response.data.error)
            } else {
                this.ToastrSuccess('Usuário criado com sucesso')
            }
           this.loading = false
        }
    }
}

</script>
