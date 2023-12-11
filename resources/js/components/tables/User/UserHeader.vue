<template>
    <div class="mb-3">
        <Button icon="fas fa-plus" color="secondary" label="Adicionar" @click="this.$router.push('/usuario/insert')"/>
    </div>
</template>

<script>

import Button from 'primevue/button'

export default {
    components: { Button },
}


</script>