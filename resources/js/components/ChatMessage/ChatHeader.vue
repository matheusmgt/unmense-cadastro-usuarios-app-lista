<template>
    <ChatHeader v-if="this.loading" />
    <div v-else class="card-container-header p-2">
        <Avatar v-if="this.data.avatar" :image="`${String(this.data.avatar).replace('{{id}}', this.data.id)}`" class="mr-2" size="xlarge"
            shape="circle" style="    box-shadow: 1.5px 1.5px #cecece;" />
        <Avatar v-else icon="pi pi-user" class="mr-2" size="xlarge" shape="circle" />
        {{ data.name }}
    </div>
</template>

<script>

import Avatar from 'primevue/avatar'
import ChatHeader from './Skeleton/ChatHeader.vue'

export default {
    components: { Avatar, ChatHeader },
    props: ['chat_id'],
    data() {
        return {
            loading: false,
            data: {
                name: ''
            }
        }
    },
    created() {
        this.buscar()
    },
    watch: {
        chat_id: function (newVal, oldVal) { // watch it
            this.buscar()
        }
    },
    methods: {
        async buscar() {
            this.loading = true;
            this.data = (await this.sendRequestAPI('GET', `/api/user/${this.chat_id}`)).data
            this.loading = false;
        }
    }
}

</script>

<style>
.card-container-header {
    box-shadow: 1.5px 1.5px #cecece;
    border: 1px solid #cecece;
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 16px;
    font-weight: 700;
}
</style>