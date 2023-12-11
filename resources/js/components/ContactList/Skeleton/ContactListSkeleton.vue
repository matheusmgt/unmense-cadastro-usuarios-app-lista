<template>
    <div class="contact-list-container">
        <div v-for="friend of friends">
            <ContactCardSkeleton/>
        </div>
    </div>
</template>
    
<script>

import ContactCardSkeleton from './ContactCardSkeleton.vue'

export default {
    components: { ContactCardSkeleton },
    data() {
        return {
            friends: [...Array(20).keys()],
        }
    },
}

</script>

<style>
.contact-list-container {
    max-height: 100vh;
    overflow: scroll;
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
    background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>