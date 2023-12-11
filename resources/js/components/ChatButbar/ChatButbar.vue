<template>
    <div class="p-2 text-center">
        <Button @click="this.sidebar_profile = !this.sidebar_profile" label="Perfil" icon="fas fa-cog" severity="primary" size="small" /> <Button class="ml-1" label="Usuários" icon="fas fa-cog" severity="secondary" size="small" @click="this.$router.push('/admin/usuario')"/>  <Button @click="this.logout()" class="ml-1" label="Sair" icon="fas fa-right-from-bracket" severity="danger" size="small" />
  
        <Sidebar v-model:visible="sidebar_profile" header="Perfil" position="right">
            <SidebarUserForm />
        </Sidebar>
  </div>
</template>
<script>

import Button from 'primevue/button'
import Sidebar from 'primevue/sidebar'
import SidebarUserForm from '../forms/SidebarUserForm.vue'

export default {
    components: { Button, Sidebar, SidebarUserForm },
    data() {
        return {
            sidebar_profile: false
        }
    }
}

</script>