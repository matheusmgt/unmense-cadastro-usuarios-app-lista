
<template>
    <SidebarUserFormSkeleton v-if="this.loading" />
    <div v-else class="mt-2">
        <div>
            <div class="row">
                <div class="col-lg-12 text-center mb-2">
                    <Avatar v-if="this.data.avatar" :image="`${String(this.data.avatar).replace('{{id}}', this.data.id)}`"
                        class="flex align-items-center justify-content-center mr-3" size="xlarge" rounded />
                    <Avatar v-else icon="pi pi-user" class="mr-2" size="xlarge" shape="circle" />
                </div>
                <div class="col-lg-12 mb-4">
                    <b>Imagem do usuário:</b>
                    <span class="p-input-icon-left w-full">
                        <InputText @change="(event) => onFileChange(event)" class="w-full" v-model="this.data.avatar_file"
                            placeholder="Arquivo" type="file" />
                    </span>
                </div>
                <div class="col-lg-12 mb-4">
                    <b>Nome</b>
                    <span class="p-input-icon-left w-full">
                        <i class="fa-solid fa-user"></i>
                        <InputText maxlength="255" class="w-full" v-model="this.data.name" placeholder="" />
                    </span>
                    <div class="input-errors" v-for="error of this.v$.data.name.$errors" :key="error.$uid">
                        <div class="error-msg text-left" style="text-align: left;"><i class="fas fa-warning"></i> {{
                            this.getLangError(error) }}</div>
                    </div>
                </div>
                <div class="col-lg-12 mb-4">
                    <b>Email</b>
                    <span class="p-input-icon-left w-full">
                        <i class="fa-solid fa-envelope"></i>
                        <InputText maxlength="255" class="w-full" v-model="this.data.email" placeholder="" type="email" />
                    </span>
                    <div class="input-errors" v-for="error of this.v$.data.email.$errors" :key="error.$uid">
                        <div class="error-msg text-left" style="text-align: left;"><i class="fas fa-warning"></i> {{
                            this.getLangError(error) }}</div>
                    </div>
                </div>
                <div class="col-lg-122 mb-4">
                    <b>Status</b>
                    <span class="p-input-icon-left w-full">
                        <i class="fa-solid fa-message"></i>
                        <InputText maxlength="255" class="w-full" v-model="this.data.description" placeholder="" />
                    </span>
                </div>
                <div class="col-lg-12 mb-4">
                    <b>Telefone</b>
                    <span class="p-input-icon-left w-full">
                        <i class="fa-solid fa-mobile"></i>
                        <InputMask class="w-full" mask="(99) 99999-9999" :disabled="loading || this.disabled"
                            v-model="this.data.telephone" placeholder="" />
                    </span>
                </div>
                <div class="col-lg-12 mb-4">
                    <span class="p-input-icon-left w-full">
                        <b>Gênero de filme preferido:</b>
                        <Dropdown v-model="this.data.genre_film" :options="genre_film_options" optionValue="name"
                            optionLabel="name" placeholder="" class="w-full" />
                    </span>
                </div>
                <div class="col-lg-12 mb-4">
                    <span class="p-input-icon-left w-full">
                        <b>Gênero musical preferido:</b>
                        <Dropdown v-model="this.data.genre_music" :options="genre_music_options" optionValue="name"
                            optionLabel="name" placeholder="" class="w-full" />
                    </span>
                </div>
                <div class="col-lg-12 mb-4">
                    <span class="p-input-icon-left w-full">
                        <b>Gênero de esporte preferido</b>
                        <Dropdown v-model="this.data.genre_sport" :options="genre_sport_options" optionValue="name"
                            optionLabel="name" placeholder="" class="w-full" />
                    </span>
                </div>
                <div class="col-lg-12 mb-4 text-center">
                    <Button @click="this.registrar()" label="SALVAR ALTERAÇÕES" icon="fas fa-save" />
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
import Avatar from 'primevue/avatar'
import SidebarUserFormSkeleton from './Skeleton/SidebarUserFormSkeleton.vue'


export default {
    components: { InputText, Button, Dropdown, InputMask, Avatar, SidebarUserFormSkeleton },
    setup() {
        return { v$: useVuelidate() }
    },
    data() {
        return {
            data: {
                email: '',
                password: '',
                name: '',
                genre_film: '',
                genre_music: '',
                genre_sport: '',
                description: '',
                _method: 'PUT'
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
    validations() {
        return {
            data: {
                name: { required },
                email: { required, email }
            }
        }
    },
    created() {
        this.buscar()
    },
    methods: {
        async registrar() {

            if ((!await this.v$.$validate())) {
                this.ToastrError('Atenção! Verifique os campos, e tente novammente!')
                return;
            }

            let response = await this.sendRequestAPI('POST', '/api/user?_method=PUT', this.data, 'multipart/form-data;')

            if(response.data.error) {
                this.ToastrError(response.data.error)
            } else {
                this.ToastrSuccess('Usuário criado com sucesso')
            }
        },
        async buscar() {
            this.loading = true
            this.data = (await this.sendRequestAPI('GET', `/api/get_user_logged`)).data
            this.loading = false
        },
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
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





