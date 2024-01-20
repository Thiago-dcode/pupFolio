<template>
    <q-page class="flex flex-center ">
       <q-inner-loading v-if="loading" :showing="visible" label="Please wait..." label-class="text-teal"
            label-style="font-size: 1.1em" />
        <Container v-else>
            <DogCard v-for="dog in dogs" :key="dog.id" :api="apiUrl + '/'" :dog="dog" />
        </Container>

    </q-page>
</template>
  
<script>
import Container from 'src/components/Container.vue'
import DogCard from 'src/components/DogCard.vue';
import axios from 'axios';
import { useRoute } from 'vue-router';
import { defineComponent, ref, onMounted } from 'vue';

export default defineComponent({
    components: { DogCard, Container },
    name: 'DogsPage',
    setup() {
        const loading = ref(true);
        const dogs = ref([]);
        const apiUrl = process.env.API;
        const route = useRoute()
    
        // Fetch dogs when the component is mounted
        onMounted(async () => {
            try {
               
                const response = await axios.get(`${apiUrl}/api/dogs${route.query.breed?`?breed=${route.query.breed}`:''}`);

                dogs.value = response.data?.dogs;
               
            } catch (error) {
                console.error('Error fetching dogs:', error);
            } finally {
                loading.value = false;
            }
        });

        return {
            loading,
            dogs,
            apiUrl
        };
    },
});
</script>
  
<style scoped></style>
  