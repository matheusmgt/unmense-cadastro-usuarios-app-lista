
<template>
    <div class="mt-2 p-5">
        <div class="card p-3">
            <div>
                <Button severity="secondary" icon="fas fa-arrow-left" @click="this.$router.push('/admin/usuario')"
                    label="Voltar" /> <Button v-if="!this.disabled" :disabled="loading || this.disabled" type="button"
                    label="Salvar" icon="fa-solid fa-save" :loading="loading || this.disabled" @click="registrar()" />
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <span class="p-input-icon-left w-full">
                        <i class="fa-solid fa-user"></i>
                        <InputText maxlength="255" class="w-full" :disabled="loading || this.disabled"
                            v-model="this.data.name" placeholder="Nome" />
                    </span>
                    <div class="input-errors" v-for="error of this.v$.data.name.$errors" :key="error.$uid">
                        <div class="error-msg text-left" style="text-align: left;"><i class="fas fa-warning"></i> {{
                            this.getLangError(error) }}</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <span class="p-input-icon-left w-full">
                        <i class="fa-solid fa-envelope"></i>
                        <InputText maxlength="255" class="w-full" :disabled="loading || this.disabled"
                            v-model="this.data.email" placeholder="Email" type="email" />
                    </span>
                    <div class="input-errors" v-for="error of this.v$.data.email.$errors" :key="error.$uid">
                        <div class="error-msg text-left" style="text-align: left;"><i class="fas fa-warning"></i> {{
                            this.getLangError(error) }}</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <span class="p-input-icon-left w-full">
                        <i class="fa-solid fa-lock"></i>
                        <InputText class="w-full" :disabled="loading || this.disabled" v-model="this.data.password"
                            placeholder="Senha" type="password" />
                    </span>
                    <div class="input-errors" v-for="error of this.v$.data.email.$errors" :key="error.$uid">
                        <div class="error-msg text-left" style="text-align: left;"><i class="fas fa-warning"></i> {{
                            this.getLangError(error) }}</div>
                    </div>
                </div>
                <div class="col-lg-12 mb-4">
                    <span class="p-input-icon-left w-full">
                        <i class="fa-solid fa-message"></i>
                        <InputText maxlength="255" class="w-full" :disabled="loading || this.disabled"
                            v-model="this.data.description" placeholder="Descrição" />
                    </span>
                </div>
                <div class="col-lg-4 mb-4">
                    <span class="p-input-icon-left w-full">
                        <i class="fa-solid fa-mobile"></i>
                        <InputMask class="w-full" mask="(99) 99999-9999" :disabled="loading || this.disabled"
                            v-model="this.data.telephone" placeholder="Telefone" />
                    </span>
                </div>
                <div class="col-lg-4 mb-4">
                    <span class="p-input-icon-left w-full">
                        <Dropdown :disabled="loading || this.disabled" v-model="this.data.genre_film"
                            :options="genre_film_options" optionValue="name" optionLabel="name"
                            placeholder="Gênero de filme preferido" class="w-full" />
                    </span>
                </div>
                <div class="col-lg-4 mb-4">
                    <span class="p-input-icon-left w-full">
                        <Dropdown :disabled="loading || this.disabled" v-model="this.data.genre_music"
                            :options="genre_music_options" optionValue="name" optionLabel="name"
                            placeholder="Gênero musical preferido" class="w-full" />
                    </span>
                </div>
                <div class="col-lg-4 mb-4">
                    <span class="p-input-icon-left w-full">
                        <Dropdown :disabled="loading || this.disabled" v-model="this.data.genre_sport"
                            :options="genre_sport_options" optionValue="name" optionLabel="name"
                            placeholder="Gênero de esporte preferido" class="w-full" />
                    </span>
                </div>
                <div class="col-lg-12 mb-4">
                    <b>Imagem do usuário:</b>
                    <span class="p-input-icon-left w-full">
                        <InputText @change="(event) => onFileChange(event)" class="w-full"
                            :disabled="loading || this.disabled" v-model="this.data.avatar" placeholder="Arquivo"
                            type="file" />
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>
    
<script lang="ts">


import { useVuelidate } from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'

import InputText from 'primevue/inputtext'
import InputMask from 'primevue/inputmask'
import Dropdown from 'primevue/dropdown'
import Button from 'primevue/button'


export default {
    components: { InputText, Button, Dropdown, InputMask },
    data() {
        return {
            data: {
                email: '',
                password: '',
                name: '',
                genre_film: '',
                genre_music: '',
                genre_sport: '',
                description: ''
            },
            genre_music_options: [
                { name: "Axé" },
                { name: "Blues" },
                { name: "Country" },
                { name: "Eletrônica" },
                { name: "Forró" },
                { name: "Funk" },
                { name: "Gospel" },
                { name: "HipHop" },
                { name: "Jazz" },
                { name: "MPB" },
                { name: "Música clássica" },
                { name: "Pagode" },
                { name: "Pop" },
                { name: "Rap" },
                { name: "Reggae" },
                { name: "Rock" },
                { name: "Samba" },
                { name: "Sertanejo" }
            ],
            genre_film_options: [
                { name: "Ação" },
                { name: "Aventura" },
                { name: "Cinema de arte" },
                { name: "Chanchada" },
                { name: "Comédia" },
                { name: "Comédia de ação" },
                { name: "Comédia de terror" },
                { name: "Comédia dramática" },
                { name: "Comédia romântica" },
                { name: "Dança" },
                { name: "Documentário" },
                { name: "Docuficção" },
                { name: "Drama" },
                { name: "Espionagem" },
                { name: "Faroeste" },
                { name: "Fantasia" },
                { name: "Fantasia científica" },
                { name: "Ficção científica" },
                { name: "Filmes com truques" },
                { name: "Filmes de guerra" },
                { name: "Mistério" },
                { name: "Musical" },
                { name: "Filme policial" },
                { name: "Romance" },
                { name: "Terror" },
                { name: "Thriller" }
            ],
            genre_sport_options: [
                { name: "Atletismo" },
                { name: "Badminton" },
                { name: "Basquete" },
                { name: "Basquete 3x3" },
                { name: "Beisebol Softbol" },
                { name: "Biatlo" },
                { name: "Bobsled" },
                { name: "Boxe" },
                { name: "Breaking" },
                { name: "Canoagem de Velocidade" },
                { name: "Canoagem Slalom" },
                { name: "Ciclismo BMX Freestyle" },
                { name: "Ciclismo BMX Racing" },
                { name: "Ciclismo de Estrada" },
                { name: "Ciclismo de Pista" },
                { name: "Ciclismo Mountain Bike" },
                { name: "Combinado nórdico" },
                { name: "Cricket" },
                { name: "Curling" },
                { name: "Escalada" },
                { name: "Esgrima" },
                { name: "Esqui alpino" },
                { name: "Esqui cross-country" },
                { name: "Esqui de Montanha" },
                { name: "Esqui estilo livre" },
                { name: "Flag Football" },
                { name: "Futebol" },
                { name: "Futsal" },
                { name: "Ginástica Acrobática" },
                { name: "Ginástica Artística" },
                { name: "Ginástica de Trampolim" },
                { name: "Ginástica Rítmica" },
                { name: "Golfe" },
                { name: "Handebol" },
                { name: "Handebol de Praia" },
                { name: "Hipismo" },
                { name: "Hóquei no gelo" },
                { name: "Hóquei sobre Grama" },
                { name: "Judô" },
                { name: "Karatê" },
                { name: "Lacrosse" },
                { name: "Levantamento de Peso" },
                { name: "Luge" },
                { name: "Luta" },
                { name: "Maratona Aquática" },
                { name: "Nado Artístico" },
                { name: "Natação" },
                { name: "Patinação artística" },
                { name: "Patinação de velocidade" },
                { name: "Patinação de velocidade em pista curta" },
                { name: "Patinação de Velocidade Inline" },
                { name: "Pentatlo Moderno" },
                { name: "Polo Aquático" },
                { name: "Remo" },
                { name: "Rugby Sevens" },
                { name: "Salto de esqui" },
                { name: "Saltos Ornamentais" },
                { name: "Skate" },
                { name: "Skeleton" },
                { name: "Snowboard" },
                { name: "Squash" },
                { name: "Surfe" },
                { name: "Taekwondo" },
                { name: "Tênis" },
                { name: "Tênis de Mesa" },
                { name: "Tiro com Arco" },
                { name: "Tiro Esportivo" },
                { name: "Triatlo" },
                { name: "Vela" },
                { name: "Vôlei" },
                { name: "Vôlei de Praia" },
            ],
            loading: false
        }
    },
    setup() {
        return { v$: useVuelidate() }
    },
    validations() {
        let obj
        if (String(this.$route.href).indexOf('/insert') != -1) {
            obj = {
                data: {
                    name: { required },
                    email: { required, email },
                    password: { required },
                }
            }
        } else {
            obj = {
                data: {
                    name: { required },
                    email: { required, email }
                }
            }
        }
        return obj
    },
    created() {
        this.disabled = String(this.$route.fullPath).split('/')[2] == 'view'
        this.buscar()
    },
    methods: {
        async registrar() {

            if ((!await this.v$.$validate())) {
                this.ToastrError('Atenção! Verifique os campos, e tente novammente!')
                return;
            }

            this.loading = true
            let id = this.$route.params.id
            await this.sendRequestAPI('POST', '/api/user' + (id ? '?_method=PUT' : ''), this.data, 'multipart/form-data;')
            this.$router.push(`/admin/usuario`)
        },
        async buscar() {
            let id = this.$route.params.id
            if (!id) return;
            this.loading = true
            this.data = (await this.sendRequestAPI('GET', `/api/user/${id}`)).data
            this.loading = false
        },
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            console.log(files)
            this.data.avatar = files[0];
        },
    }
}

</script>

<style>
.w-full {
    width: 100%;
}

.p-dropdown-items {
    padding: 0px !important;
}
</style>





