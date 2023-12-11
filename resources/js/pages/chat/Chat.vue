<template>
    <div class="row col-lg-12">
        <div class="col-lg-3 col-md-12 col-sm-12 bg-dark">
            <ChatButbar />
            <ContactList />
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12" v-if="this.$route.params.user_receive_id">
            <center>
                <ChatContainer />
            </center>
        </div>
    </div>
</template>
    
<script>

import InputText from 'primevue/inputtext'
import Button from 'primevue/button'
import Card from 'primevue/card';
import ContactList from '../../components/ContactList/ContactList.vue'
import ChatContainer from '../../components/ChatMessage/ChatContainer.vue'
import ChatButbar from '../../components/ChatButbar/ChatButbar.vue'
import Divider from 'primevue/divider';


export default {
    components: { InputText, Button, Card, ContactList, ChatContainer, ChatButbar, Divider },
    data() {
        return {
            messages: [],
            friends: [],
            data: {
                message: ''
            }
        }
    },
    async created() {

        // this.friends = (await this.sendRequestAPI('GET', '/api/user')).data
        // this.buscar(true)

        // var objDiv = document.getElementById("chat-container");
        // objDiv.scrollTop = objDiv?.scrollHeight;

    },
    update() {
        alert('mudou')
    },
    methods: {
        async buscar(first = false) {
            this.messages = (await this.sendRequestAPI('GET', `/api/chat/${this.$route.params.user_receive_id}`)).data

            if (first) {
                var objDiv = document.getElementById("chat-container");
                objDiv.scrollTop = objDiv?.scrollHeight;
            }
            this.buscar()
        },
        async send_message() {

            this.loading = true

            await this.sendRequestAPI('POST', '/api/chat', {
                message: this.data.message,
                user_receive_id: this.$route.params.user_receive_id
            })

            this.loading = false

            this.data.message = ''

            var objDiv = document.getElementById("chat-container");
            objDiv.scrollTop = objDiv?.scrollHeight;
        }
    }
}

</script>

<style>
.bg-green {
    background-color: green;
}

.bg-dark {
    background-color: red;
}

</style>
