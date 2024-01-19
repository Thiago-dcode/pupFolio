<template>
    <div>
        <h1>List of Dogs</h1>
        <DogCard />
    </div>
</template>
  
<script>
import DogCard from 'src/components/DogCard.vue';
import { defineComponent } from 'vue'

export default defineComponent({
    components: { DogCard },
    name: 'PageDog',
    setup(props) {

    }
})
</script>
  
<style scoped>
/* Add your component styles here if needed */
</style>
  