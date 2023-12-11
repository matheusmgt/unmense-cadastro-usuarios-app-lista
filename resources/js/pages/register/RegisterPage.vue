<template>
  <div class="row col-lg-12">
      <div class="col-lg-6 col-md-6 col-sm-12 col-6 bg-container">
          <img :src="'https://www.ummense.com/img/header/ummense.png'" />
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12 center-vertically">
          <RegisterForm class="card p-5" />
      </div>
  </div>
</template>

<script>

import RegisterForm from '../../components/forms/RegisterForm.vue';
import './RegisterPage.css'

export default {
  components: { RegisterForm },
}

</script>
