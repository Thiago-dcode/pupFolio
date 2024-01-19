<template>
    <div>

        <q-inner-loading v-if="loading" :showing="visible" label="Please wait..." label-class="text-teal"
            label-style="font-size: 1.1em" />
        <div v-else-if="error">{{ error }}</div>
        <div v-else>
            <p v-if="dog">Dog Name: {{ dog.name }}</p>
            <p v-if="dog">Breed: {{ dog.breed.name }}</p>
            <p v-if="dog">Description: {{ dog.description }}</p>

        </div>
    </div>
</template>
<script>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
export default {
    setup() {

        const route = useRoute()

        const dog = ref(null);
        const loading = ref(true);
        const error = ref(null);
        const apiUrl = process.env.API;
        onMounted(async () => {
            try {
                // Access the dynamic route parameter in the setup function


                // Make an HTTP request to fetch the dog data based on the ID
                const response = await fetch(`${apiUrl}/api/dogs/${route.params.id}`);

                if (!response.ok) {
                    // Handle the case where the request was not successful
                    throw new Error('Failed to fetch dog data');
                }
                const data = await response.json();

                dog.value = data?.dog

            } catch (error) {
                // Handle any errors that occur during the fetch
                console.error('Error fetching dog data:', error);
                error.value = 'Failed to fetch dog data';
            } finally {
                // Set loading to false after the request is complete
                loading.value = false;
            }
        });

        return {
            dog,
            loading,
            error,
        };
    },
};
</script>
