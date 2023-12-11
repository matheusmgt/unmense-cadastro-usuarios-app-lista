<template>
    <div class="card-container-header p-2 d-flex">
        <InputText maxlength="255" style="width: 90%" v-model="this.message" v-on:keyup.enter="this.send_message()"/>
        <Button    @click="this.send_message()" :loading="this.loading" style="width: 10%" icon="fa-solid fa-paper-plane" severity="primary" :label="''"/>
    </div>
</template>

<script>

import InputText from 'primevue/inputtext'
import Button from 'primevue/button'

export default {
    components: { Button, InputText },
    props: ['chat_id'],
    data() {
        return {
            loading: false,
            message: ''
        }
    },
    methods: {
        async send_message() {
            
            if(!this.message) {
                this.ToastrError('Informe sua mensagem!!')
                return;
            }

            this.loading = true
            await this.sendRequestAPI('POST', '/api/chat', {
                message: this.message,
                user_receive_id: this.chat_id
            })
            this.message = ''
            this.loading = false
            this.scrollDown()

            this.ToastrSuccess('Mensagem enviada com sucesso!')

        },
        scrollDown() {
          setTimeout(function () {
            var objDiv = document.getElementById("list-messages");
            objDiv.scrollTop = objDiv?.scrollHeight;
          }, 500)
        }
    }
}

</script>

<style>

.card-container-header {
    box-shadow: 1.5px 1.5px #cecece;
    border: 1px solid #cecece;
    display: flex; align-items: center;
    gap: 15px;
    font-size: 16px;
    font-weight: 700;
}

</style>