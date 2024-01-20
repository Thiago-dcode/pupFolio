<template>
    <q-page id="main" padding class="flex flex-center">

        <q-form id="form-create" @submit="onSubmit" @reset="onReset" class="q-gutter-xl">
            <q-input v-model="form.name" label="Dog name" hint="Your doggy name" lazy-rules
                :rules="[val => val && val.length > 0 || 'Please type something']" />
            <q-input v-model="form.description" hint="Tell us about your dog" label="Description" type="textarea" autogrow
                :rules="[val => val && val.length > 0 || 'Please type something']"></q-input>
            <q-select outlined hint="Your doggy breed" :pending="isPending" v-model="form.breed" option-label="name"
                option-value="id" :options="breedList" label="Breed" />
            <q-select outlined hint="Your doggy size" :pending="isPending" v-model="form.size" option-label="name"
                option-value="id" :options="sizeList" label="Size" />
            <div id="file-color">

                <div id="image-div">
                    <q-file accept="image/*" use-chips v-model="form.image" label="Pick your dog image"
                        @update:model-value="handleUpload">
                    </q-file>
                    <q-img :src="imageUrl" spinner-color="white" style="max-height: 80px;" width="100px" fit></q-img>
                </div>
                <q-color default-view="spectrum" v-model="form.color" no-header-tabs style="width: 250px;"
                    class="my-picker" />



            </div>
            <div id="button-div">
                <q-btn label="Submit" type="submit" color="primary" />
                <q-btn label="Reset" type="reset" color="primary" flat class="q-ml-sm" />
            </div>
        </q-form>

    </q-page>
</template>
<script>
import { useQuasar } from 'quasar'
import { ref, onMounted } from 'vue'
import axios from 'axios'

export default {
    setup() {

        const form = ref({})

        const isPending = ref(true)
        const breedList = ref([])
        const sizeList = ref([])
        const accept = ref(false)
        const apiUrl = process.env.API;
        const imageUrl = ref('');
        const handleUpload = (e) => {
            imageUrl.value = null

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
            accept,
            breedList,
            sizeList,
            isPending,
            handleUpload,
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

                    console.log(formData.image);

                    const response = await axios.post(`${apiUrl}/api/dogs`, {image:form.value}, {
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    });

                    console.log('success', response.data);
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