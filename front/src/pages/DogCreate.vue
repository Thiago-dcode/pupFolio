<template>
    <q-page id="main" padding class="flex flex-center">

        <q-form id="form-create" @submit="onSubmit" @reset="onReset" class="q-pa-md shadow-1">
            <q-input v-model="form.name" label="Dog name" hint="Your dog name" lazy-rules
                :rules="[val => val && val.length > 0 || 'Please type something']" />
            <q-input v-model="form.description" hint="Tell us about your dog" label="Description" type="textarea" autogrow
                :rules="[val => val && val.length > 0 || 'Please type something']"></q-input>
            <q-select outlined hint="Your dog breed" :pending="isPending" v-model="form.breed" option-label="name"
                option-value="id" :options="breedList" label="Breed" />
            <q-select outlined hint="Your dog size" :pending="isPending" v-model="form.size" option-label="name"
                option-value="id" :options="sizeList" label="Size" />
            <div id="file-color">

                <div id="image-div">
                    <q-file counter accept="image/*" use-chips v-model="form.image" label="Pick your dog image"
                        @update:model-value="handleUpload">
                        <template #prepend>

                            <q-icon name="pets"></q-icon>

                        </template>
                    </q-file>
                    <q-img :src="imageUrl" spinner-color="white" style="max-height: 80px;" width="100px" fit></q-img>
                </div>
                <div class="text-subtitle6">Your dog color
                <q-color title="Dog color" default-view="spectrum" v-model="form.color" no-header-tabs style="width: 250px;"
                    class="my-picker" />

                </div>

            </div>
            <div id="button-div">
                <q-btn label="Submit" type="submit" color="primary" />
                <q-btn label="Reset" type="reset" color="primary" flat class="q-ml-sm" />
            </div>
        </q-form>

    </q-page>
</template>
<script>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default {
    setup() {

        const router = useRouter()
        const form = ref({})
        const isPending = ref(true)
        const breedList = ref([])
        const sizeList = ref([])
        const apiUrl = process.env.API;
        const imageUrl = ref('');
        const handleImage = (e) => {

            console.log(e)
        }
        const handleUpload = () => {

            imageUrl.value = ''

            if (form.value.image) {

                imageUrl.value = URL.createObjectURL(form.value.image);
            }
        }

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

            } finally {
                isPending.value = false
            }
        });

        return {
            form,
            breedList,
            sizeList,
            isPending,
            handleUpload,
            handleImage,
            imageUrl,

            async onSubmit() {

                try {
                    const formData = {
                        name: form.value.name,
                        description: form.value.description,
                        breed: form.value.breed.id,
                        size: form.value.size.id,
                        image: form.value.image,
                        color: form.value.color,
                    };

                  

                    const response = await axios.post(`${apiUrl}/api/dogs`, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                        },
                    });
                    console.log(response.data.dog.id);

                    router.push({path:`/dogs/${response.data.dog.id}`})



                } catch (error) {
                    console.error('Error submitting form:', error.response?.data);

                }

            },

            onReset() {
                form.value = {}

            }
        }
    }
}
</script>

<style>
#form-create {


    width: 100%;
    max-width: 700px;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    align-items: center;
    justify-content: center;
}

#form-create>* {
    width: 100%;
}

#file-color {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-around;
}

#image-div {


    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    gap: 2rem;

}



#image-div img {

    object-fit: contain;
}

#button-div {
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>