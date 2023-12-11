<template>
    <div class="p-2">
        <div class="p-1 d-flex align-items-center mb-1 card-contact-container">
            <div class="p-2">
                <Skeleton shape="circle" size="5rem"></Skeleton>
            </div>
            <div>
                <div class="username-title"><Skeleton width="10rem" class="mb-2"></Skeleton></div>
                <div class="last-message"><Skeleton width="8rem" class="mb-2"></Skeleton></div>
            </div>
        </div>
    </div>
</template>


<script>

import Skeleton from 'primevue/skeleton'
export default {
    props: ['friend'],
    components: { Skeleton }
}
</script>

<style>

.card-contact-container {
    box-shadow: 1px solid black;
    height: 100px;
    box-shadow: 2px 2px #cecece;
    border: 1px solid #cecece;
    border-radius: 5px;
}

.username-title {
    font-weight: 700;
    color: black;
}

</style>