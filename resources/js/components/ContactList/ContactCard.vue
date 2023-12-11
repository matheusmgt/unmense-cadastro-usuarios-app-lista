<template>
    <div class="p-2">
        <div :class="selectFriend.id == friend.id ? 'p-1 d-flex align-items-center mb-1 card-contact-container-selected' : 'p-1 d-flex align-items-center mb-1 card-contact-container'">
            <div class="p-2">
                <Avatar v-if="friend.avatar" :image="`${String(friend.avatar).replace('{{id}}', friend.id)}`"  class="mr-2" size="xlarge" shape="circle"/>
                <Avatar v-else icon="pi pi-user" class="mr-2" size="xlarge" shape="circle" />
            </div>
            <div>
                <div class="username-title">{{ friend.name }}</div>
                <div class="last-message">{{  String(friend.message).length > 40 ? String(friend.message).substring(0, 40) + '...' : friend.message }}</div>
            </div>
        </div>
    </div>
</template>


<script>
import Button from 'primevue/button'
import Avatar from 'primevue/avatar'

export default {
    props: ['friend', 'selectFriend'],
    components: { Button, Avatar }
}
</script>

<style>


.card-contact-container-selected {
    height: 100px;
    box-shadow: 1.5px 1.5px #000000;
    border-radius: 5px;
    background-color: rgb(49, 40, 40);
    color: white !important;
    cursor: pointer;
}

.card-contact-container-selected > div > .username-title {
    color: white !important;
}

.card-contact-container {
    height: 100px;
    box-shadow: 1.5px 1.5px #cecece;
    border: 1px solid #cecece;
    border-radius: 5px;
    background-color: white;
    cursor: pointer;
}

.username-title {
    font-weight: 700;
    color: black;
}

</style>