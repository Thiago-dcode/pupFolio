<template>
  <q-card style="height: 400px;" class="my-card">
    <q-img :src="!dog.image ? fullImageUrl : api + dog.image" ratio="1" />

    <q-card-section>
      <router-link style="" :to="`/dogs/${dog.id}`">
        <div class="text-h6">{{ dog.name }}</div>
      </router-link>
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
    onMounted(() => {
      if (!dog.image) {
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