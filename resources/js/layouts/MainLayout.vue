<template>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"> <img class="rotating"
                        :src="'https://www.ummense.com/img/header/ummense.png'" /></a>
            </div>
            <div class="butbar-layout">
                <Button @click="this.$router.push('/chat')" label="Chat" icon="fas fa-message" /> <Button severity="danger"
                    @click="this.logout()" label="Logout" icon="fas fa-right-from-bracket" />
            </div>
        </div>
    </nav>

    <div>
        <router-view></router-view>
    </div>
</template>

<script>

import Button from 'primevue/button'
import './MainLayout.css'

export default {
    components: { Button }
}

</script>
