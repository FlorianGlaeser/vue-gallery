<template>
  <div class="gallery">
    <img
      v-scroll-reveal.reset="{
        distance: '0px',
        scale: 0.9
      }"
      v-for="picture in gallery"
        :key="picture.id"
        :alt="picture.alt"
        :description="picture.description"
        :title="picture.title"
        :src="picture.src"
    />
  </div>
</template>

<script>
export default {
  data() {
    return {
      gallery: [],
    };
  },
  mounted() {
    axios
      .get(`/?hash=`+ this.$store.state.hash +`&data=gallery`)
      .then((response) => {
        this.gallery = response.data.gallery;
    }); 
  },
};
</script>

<style lang="scss">
.gallery {
  display: flex;
  flex-direction: column;
  align-items: center;
  
  img {
    margin: 10px;
  }
}
</style>
