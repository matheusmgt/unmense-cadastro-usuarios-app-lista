<template>
    <div class="card-container-header p-2">
        <Skeleton shape="circle" size="4rem"></Skeleton>
        <Skeleton width="10rem" class="mb-2"></Skeleton>
    </div>
</template>

<script>

import Skeleton from 'primevue/skeleton'

export default {
    components: { Skeleton }
}

</script>

<style>
.card-container-header {
    box-shadow: 1.5px 1.5px #cecece;
    border: 1px solid #cecece;
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 16px;
    font-weight: 700;
}
</style>