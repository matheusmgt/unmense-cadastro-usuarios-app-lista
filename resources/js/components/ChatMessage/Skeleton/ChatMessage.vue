<template>
    <div class="card-container-message-skeleton">
        <Skeleton style="width: 100%; height: 100%;" class="mb-2"></Skeleton>
    </div>
</template>

<script>

import Skeleton from 'primevue/skeleton'

export default {
    components: { Skeleton }
}

</script>

<style>

.card-container-message-skeleton {
    height: 80vh;
}

</style>