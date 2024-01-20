<template>
  <q-card class="my-card">
    <router-link :to="`/dogs/${dog.id}`">
      <q-img :src="fullImageUrl" ratio="1" />
    </router-link>
    <q-card-section>
      <div class="text-h6">{{ dog.name }}</div>
      <div class="text-subtitle2">{{ dog.breed.name }}</div>
    </q-card-section>

    <q-card-section class="q-pt-none">
      {{ dog.description }}
    </q-card-section>
  </q-card>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue';
import useRandomDogImage from './useRandomDogImage';
export default defineComponent({
  name: 'DogCard',
  props: {
    dog: {
      type: Object,
      required: true,
    },
    api: {
      type: String,
      required: true,
    },
  },
  setup({ dog, api }) {
   
    const { isLoading, fullImageUrl, getRandomDogImage } = useRandomDogImage();
    // Watch for changes in the dog prop
    onMounted( () => {
      if (!fullImageUrl.value) {
        getRandomDogImage(dog.breed.name)
      }
    });

    
    return {
      isLoading,
      fullImageUrl,


    };
  },

});
</script>
<style lang="sass" scoped>
.my-card
  
  width: 100%
 
  max-width: 250px
</style>