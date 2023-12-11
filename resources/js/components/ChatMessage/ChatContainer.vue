<template>
    <div class="pt-1">
        <ChatHeader     :chat_id="this.$route.params.user_receive_id" />
        <ChatMessage    :chat_id="this.$route.params.user_receive_id" />
        <ChatInputForm  :chat_id="this.$route.params.user_receive_id" />
    </div>
</template>

<script>

import ChatHeader from './ChatHeader.vue'
import ChatMessage from './ChatMessage.vue'
import ChatInputForm from './ChatInputForm.vue'

export default {
    components: { ChatHeader, ChatMessage, ChatInputForm }
}

</script>