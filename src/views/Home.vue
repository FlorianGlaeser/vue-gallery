<template>
  <div class="home">
    <h1>Gallery</h1>

    <button v-if="this.$store.state.login" @click="toggleComponent">Change to {{ changeMessage }}</button>
    <keep-alive>
      <component
        :is="component"
      ></component>
    </keep-alive>
  </div>
</template>

<script>
import TheLogin from '@/components/TheLogin'
import TheGallery from '@/components/TheGallery'

export default {
  name: 'Home',
  components: {
    TheLogin,
    TheGallery,
  },
  data() {
    return {
      component: TheLogin,
      changeMessage: "gallery",
    };
  },
  methods: {
    toggleComponent() {
      this.component = this.component === TheLogin
        ? TheGallery
        : TheLogin;
      this.changeMessage = this.changeMessage === "gallery"
        ? "login"
        : "gallery";
    },
  }
};
</script>
