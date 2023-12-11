<template>
    <UserTableSkeleton v-if="this.loading" />
    <div v-else class="mt-2 p-3">
        <div class="card p-3">
            <UserHeader />
            <DataTable paginator :rows="15" :totalRecords="this.usuarios.length" :rowsPerPageOptions="[15, 25, 35, 45, 55]"
                :value="usuarios" tableStyle="min-width: 50rem">
                <Column header="">
                    <template #body="slotProps">
                        <Button size="small" severity="info" icon="fas fa-eye"
                            @click="this.$router.push(`/usuario/view/${slotProps.data.id}`)" /> <Button size="small"
                            severity="warning" icon="fas fa-edit"
                            @click="this.$router.push(`/usuario/update/${slotProps.data.id}`)" /> <Button size="small"
                            severity="danger" icon="fas fa-trash" @click="this.destroyConfirm(slotProps.data)" />
                    </template>
                </Column>
                <Column field="name" header="Nome">
                    <template #body="slotProps">
                        <div style="display: flex; align-items: center;">
                            <Avatar v-if="slotProps.data.avatar" :image="`${String(slotProps.data.avatar).replace('{{id}}', slotProps.data.id)}`" class="flex align-items-center justify-content-center mr-3" size="small" rounded />
                            <Avatar v-else icon="pi pi-user" class="mr-2" size="small" shape="circle" />
                            <div style="margin-left: 5px;">{{ slotProps.data.name }}</div>
                        </div>
                    </template>
                </Column>
                <Column field="email" header="Email"></Column>
                <Column field="telephone" header="Telefone">
                    <template #body="slotProps">
                        <div v-if="slotProps.data.telephone">{{ slotProps.data.telephone }}</div>
                        <div v-else>N/A</div>
                    </template>
                </Column>
                <Column field="genre_film" header="Gênero de Filme" headerClass="text-center">
                    <template #body="slotProps">
                        <div class="text-center">
                            <Badge v-if="slotProps.data.genre_film" :value="slotProps.data.genre_film" size="small" severity="success"></Badge>
                            <div v-else>N/A</div>
                        </div>
                    </template>
                </Column>
                <Column field="genre_music" header="Gênero Musical" headerClass="text-center">
                    <template #body="slotProps">
                        <div class="text-center">
                            <Badge v-if="slotProps.data.genre_music" :value="slotProps.data.genre_music" size="small" severity="warning"></Badge>
                            <div v-else>N/A</div>
                        </div>
                    </template>
                </Column>
                <Column field="genre_sport" header="Esporte">
                    <template #body="slotProps">
                        <div class="text-center">
                            <Badge v-if="slotProps.data.genre_sport" :value="slotProps.data.genre_sport" size="small" severity="info"></Badge>
                            <div v-else>N/A</div>
                        </div>
                    </template>
                </Column>
            </DataTable>
        </div>
    </div>
</template>

<script>

import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
import Button from 'primevue/button'
import Avatar from 'primevue/avatar'
import Badge from 'primevue/badge'
import UserHeader from './UserHeader.vue'
import UserTableSkeleton from './Skeleton/UserTableSkeleton.vue'

export default {
    components: { DataTable, Column, Button, UserHeader, UserTableSkeleton, Avatar, Badge },
    data() {
        return {
            loading: false,
            usuarios: []
        }
    },
    async created() {
        this.buscarDados()
    },
    methods: {
        async destroyConfirm(props) {
            this.confirmSwal('Atenção', `Você deseja apagar o usuário ${props.name}?`, 'warning', [this.destroyExec, props.id])
        },
        async destroyExec(id) {
            await this.sendRequestAPI('DELETE', `/api/user/${id}`)
            this.buscarDados()
        },
        async buscarDados() {
            this.loading = true
            this.usuarios = (await this.sendRequestAPI('GET', '/api/user')).data
            this.loading = false
        }
    }
}


</script>

<style>
button {
    border-radius: 5px;
}
.text-center {
    text-align: center !important;
}
</style>