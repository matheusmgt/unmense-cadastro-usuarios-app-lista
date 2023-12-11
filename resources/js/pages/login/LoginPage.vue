<template>
    <div class="row col-lg-12">
        <div class="col-lg-6 col-md-12 col-sm-12 bg-container card">
            <img :src="'https://www.ummense.com/img/header/ummense.png'" />
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 center-vertically">
            <LoginForm class="card p-5" />
        </div>
    </div>
</template>
  
<script>

import './LoginPage.css'
import LoginForm from '../../components/forms/LoginForm.vue';

export default {
    components: { LoginForm },
}

</script>

