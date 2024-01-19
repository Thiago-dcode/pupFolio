<template>
    <q-page class="flex flex-center">

        <q-form @submit="onSubmit" @reset="onReset" class="q-gutter-md">
            <q-input filled v-model="name" label="Dog name" hint="Your doggy name" lazy-rules
                :rules="[val => val && val.length > 0 || 'Please type something']" />
            <q-input v-model="description" hint="Tell us about your dog" label="Description" filled type="textarea" autogrow></q-input>
            <q-select :pending="isPending" v-model="selectedBreed" option-label="name" option-value="id"
                :options="breedList" label="Breed" />
            <q-select :pending="isPending" v-model="selectedSize" option-label="name" option-value="id" :options="sizeList"
                label="Size" />
            <q-file color="teal" filled v-model="image" label="Your puppy image">
                <template v-slot:prepend>
                    <q-icon name="pets" />
                </template>
            </q-file>



            <div>
                <q-btn label="Submit" type="submit" color="primary" />
                <q-btn label="Reset" type="reset" color="primary" flat class="q-ml-sm" />
            </div>
        </q-form>

    </q-page>
</template>
<script>
import { useQuasar } from 'quasar'
import { ref, onMounted } from 'vue'

export default {
    setup() {
        const $q = useQuasar()
        const name = ref(null)
        const image = ref(null)
        const description = ref(null)
        const isPending = ref(true)
        const breedList = ref([])
        const sizeList = ref([])
        const accept = ref(false)
        const apiUrl = process.env.API;
        const selectedBreed = ref(null)
        const selectedSize = ref(null)
        onMounted(async () => {
          try {
              // Access the dynamic route parameter in the setup function

            // Make an HTTP request to fetch the dog data based on the ID
            const [sizeResponse, breedResponse] = await Promise.all([
                fetch(`${apiUrl}/api/sizes`),
                fetch(`${apiUrl}/api/breeds`),
            ]);

            if (!sizeResponse.ok || !breedResponse.ok) {
                throw new Error('Failed to fetch size or breed data or breed list');
            }
            const sizeData = await sizeResponse.json();

            const breedData = await breedResponse.json();
            sizeList.value = sizeData.sizes
            breedList.value = breedData.breeds
          } catch (error) {
            
          }finally{
            isPending.value =false
          }
        });

        return {
            name,
            image,
            description,
            breedList,
            sizeList,
            accept,
            selectedBreed,
            selectedSize,
            isPending,

            onSubmit() {
               
            },

            onReset() {
                name.value = null
                image.value = null
                description.value = null
             
            }
        }
    }
}
</script>