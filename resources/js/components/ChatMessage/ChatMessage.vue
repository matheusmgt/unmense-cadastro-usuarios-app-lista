<template>
    <ChatMessageSkeleton v-if="this.loading" />
    <div v-else class="card-container-message p-2" id="list-messages">
        <div v-for="message of messages"
            :class="message.user_receive_id == this.chat_id ? 'message-container-right' : 'message-container-left'">
            <Avatar v-if="message.user_send.avatar" :image="`${String(message.user_send.avatar).replace('{{id}}', message.user_send.id)}`" class="flex align-items-center justify-content-center mr-3" size="small" rounded />
            <Avatar v-else icon="pi pi-user" class="flex align-items-center justify-content-center mr-3" size="small" rounded />
            <div class="user-message">{{ message.message }}</div>
        </div>
    </div>
</template>

<script>

import Avatar from 'primevue/avatar'
import ChatMessageSkeleton from './Skeleton/ChatMessage.vue'

export default {
    components: { Avatar, ChatMessageSkeleton },
    props: ['chat_id'],
    data() {
        return {
            loading: false,
            messages: []
        }
    },
    created() {
        this.loading = true;
        this.buscar(true)
    },
    watch: {
        chat_id: function (newVal, oldVal) {
            this.messages = []
            this.loading = true
        }
    },
    methods: {
        async buscar(first = false) {

            let chat_id = this.chat_id 

            if(!this.$route.params.user_receive_id) return;

            if (!this.chat_id) return

            let messages = (await this.sendRequestAPI('GET', `/api/chat/${chat_id}`)).data

            if(chat_id != this.chat_id) {
                this.buscar();
                return;
            }

            if(messages.length != this.messages.length) {
                this.messages = messages
                this.scrollDown()
            }
            
            this.loading = false

            if(first) this.scrollDown()

            this.buscar()
        },
        scrollDown() {
          setTimeout(function () {
            var objDiv = document.getElementById("list-messages");
            objDiv.scrollTop = objDiv?.scrollHeight;
          }, 750)
        }
    }
}

</script>

<style>
.card-container-message {
    box-shadow: 1.5px 1.5px #cecece;
    border: 1px solid #cecece;
    gap: 15px;
    font-size: 16px;
    font-weight: 700;
    background-color: #cecece;
    height: 81.5vh;
    overflow: scroll;
    overflow-x: hidden;
}

.message-container-left {
    display: flex;
    gap: 5px;
    align-items: center;
    margin-bottom: 15px;
}

.message-container-left>.user-message {
    background-color: white;
    padding: 5px;
    border-radius: 10px;
}

.message-container-right>.user-message {
    background-color: rgb(112, 150, 112);
    color: white;
    padding: 5px;
    border-radius: 10px;
}

.message-container-right {
    display: flex;
    gap: 5px;
    align-items: center;
    margin-bottom: 15px;
    justify-content: right;
}
</style>