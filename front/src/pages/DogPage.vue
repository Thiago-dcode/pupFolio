<template>
    <q-page>

        <q-inner-loading v-if="loading" :showing="visible" label="Please wait..." label-class="text-teal"
            label-style="font-size: 1.1em" />
        <div v-else-if="error">{{ error }}</div>
        <Container v-else>



            <q-card class="my-card bg-blue-4 text-white">
                <div class="text-overline">Dog info</div>
                <q-card-section>
                    <div style="width: 100%;">
                       
                        <div class="text-h6">{{ dog.name }}</div>
                    </div>


                </q-card-section>

                <q-card-section>
                    {{ dog.description }}
                </q-card-section>

                <q-separator dark />

                <q-card-actions>
                    <q-btn flat>Color:</q-btn>
                    <div :style="`background:${dog.color}; width:20px; height:20px`"></div>
                </q-card-actions>
            </q-card>
            <q-card class="my-card">
                <q-img ratio="1" :src="!dog.image ? fullImageUrl : apiUrl + dog.image">

                </q-img>
            </q-card>

            <BreedCard :breed="dog.breed" />



        </Container>

    </q-page>
</template>
<script>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import BreedCard from 'src/components/BreedCard.vue';
import useRandomDogImage from 'src/components/useRandomDogImage';
import Container from 'src/components/Container.vue';
export default {
    components: { BreedCard, Container },
    setup() {
        
        const route = useRoute()
        const { isLoading, fullImageUrl, getRandomDogImage } = useRandomDogImage()
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
             
                console.log(apiUrl)
                if(!dog.value.image)
               { getRandomDogImage(dog.value.breed.name)}
             
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
            apiUrl,
            isLoading, fullImageUrl,

        };

    },

};
</script>

<style>
#container {
    width: 100%;
}

#parent {
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-around;

}
</style>