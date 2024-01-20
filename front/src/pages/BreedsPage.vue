<template>
    <q-page class="flex flex-center ">


        <q-inner-loading v-if="loading" :showing="visible" label="Please wait..." label-class="text-teal"
            label-style="font-size: 1.1em" />
        <Container v-else>

            <BreedCard v-for="breed in breeds" :key="breed.id" :api="apiUrl + '/'" :breed="breed" />

        </Container>
    </q-page>
</template>
  
<script>
import Container from 'src/components/Container.vue';
import BreedCard from 'src/components/BreedCard.vue';
import axios from 'axios';
import { defineComponent, ref, onMounted } from 'vue';

export default defineComponent({
    components: { BreedCard, Container },
    name: 'BreedPage',
    setup() {
        const loading = ref(true);
        const breeds = ref([]);
        const apiUrl = process.env.API;
        console.log(apiUrl)
        // Fetch breeds when the component is mounted
        onMounted(async () => {
            try {
                const response = await axios.get(`${apiUrl}/api/breeds`);

                breeds.value = response.data?.breeds;
                console.log(response.data?.breeds)
            } catch (error) {
                console.error('Error fetching breeds:', error);
            } finally {
                loading.value = false;
            }
        });

        return {
            loading,
            breeds,
            apiUrl
        };
    },
});
</script>
  
<style scoped></style>
  