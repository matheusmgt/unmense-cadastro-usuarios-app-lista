<template>
    <ContactListSkeleton v-if="loading"/>
    <div v-else class="contact-list-container">
        <div v-for="friend of friends">
            <ContactCard @click="this.selectFriend = friend; this.$router.push(`/chat/${friend.id}`)" :friend="friend" :selectFriend="this.selectFriend"/>
        </div>
    </div>
</template>
    
<script>

import ContactCard from './ContactCard.vue'
import ContactListSkeleton from './Skeleton/ContactListSkeleton.vue'

export default {
    components: { ContactCard, ContactListSkeleton },
    data() {
        return {
            friends: [],
            loading: true,
            selectFriend: ''
        }
    },
    async created() {
        this.buscar()
    },
    methods: {
        async buscar() {
            if(!(String(this.$route.href).indexOf('/chat') != -1)) return;
            this.friends = (await this.sendRequestAPI('GET', '/api/friend')).data
            this.loading = false;
            setTimeout(() => this.buscar(), 1000*3)
        },
    }
}

</script>

<style>
.contact-list-container {
    height: 93.4vh;
    max-height: 100vh;
    overflow: scroll;
    overflow-y: hidden;
    overflow-x: hidden;
}

/* width */
::-webkit-scrollbar {
    width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #cecece;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>