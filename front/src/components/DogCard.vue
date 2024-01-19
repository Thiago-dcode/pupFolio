<template>
   
    <q-card class="my-card">
    <router-link :to="`/dogs/${dog.id}`">
      <q-img :src="fullImageUrl" ratio="1"/>
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

<script >
import { defineComponent } from 'vue'
export default defineComponent({
    name: 'DogCard',
    props: {
        dog: {
            type: Object,
            required: true
        },
        api:{
            type:String,
            required:true
        }

       
    },
    computed: {
    fullImageUrl() {
      return this.api + this.dog.image;
    }
  }
},
)

</script>

<style lang="sass" scoped>
.my-card
  
  width: 100%
 
  max-width: 250px
</style>