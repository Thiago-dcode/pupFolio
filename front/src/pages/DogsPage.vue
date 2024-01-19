<template>
    <q-page class="flex flex-center ">
        <h1>List of Dogs</h1>
        <q-inner-loading v-if="loading" :showing="visible" label="Please wait..." label-class="text-teal"
            label-style="font-size: 1.1em" />
        <div class="q-pa-md row items-start q-gutter-md" v-else>
            <DogCard v-for="dog in dogs" :key="dog.id" :api="apiUrl + '/'" :dog="dog" />
        </div>
    </q-page>
</template>
  
<script>
import DogCard from 'src/components/DogCard.vue';
import axios from 'axios';
import { defineComponent, ref, onMounted } from 'vue';

export default defineComponent({
    components: { DogCard },
    name: 'DogsPage',
    setup() {
        const loading = ref(true);
        const dogs = ref([]);
        const apiUrl = process.env.API;
        console.log(apiUrl)
        // Fetch dogs when the component is mounted
        onMounted(async () => {
            try {
                const response = await axios.get(`${apiUrl}/api/dogs`);

                dogs.value = response.data?.dogs;
                console.log(response.data?.dogs)
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
  