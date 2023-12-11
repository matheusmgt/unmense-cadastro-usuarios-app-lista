<template>
    <div class="mt-2 p-5">
        <div class="card p-3">
            <Skeleton height="50px" width="180px"/>
            <br>
            <Skeleton height="350px" />
            <br>
            <center>
                <Skeleton height="50px" width="280px"/>
            </center>
        </div>
    </div>
</template>

<script>

import Skeleton from 'primevue/skeleton'

export default {
    components: { Skeleton }
}

</script>