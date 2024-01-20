<template>
    <q-card class="my-card" flat bordered>
        <q-card-section class="card-child child-1" horizontal>
            <q-card-section class="q-pt-xs">
                <div class="text-overline">Breed info</div>
                <router-link :to="`/dogs?breed=${breed.name }`">
                    <div class="text-h5 q-mt-sm q-mb-xs">{{ breed.name }}</div>
                </router-link>
             
               
            </q-card-section>

            <q-card-section class="col-5 flex flex-center">
                <q-img class="rounded-borders" src="https://cdn.quasar.dev/img/parallax2.jpg" />
            </q-card-section>
        </q-card-section>
        <div class="text-caption text-grey">
                    {{ breed.description }}
                </div>
      

        <q-card-section  class="extra-info card-child">
            <div class="child">
                <p>Lifespan</p>
                <span>{{ breed.lifespan }}</span>
            </div>
            <div  class="child">
                <p>Origin</p>
                <span>{{ breed.origin }}</span>
            </div>
        </q-card-section>
    </q-card>
</template>

<script >
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'DogCard',
   
    props: {
        breed: {
            type: Object,
            required: true
        },
        api: {
            type: String,
            required: true
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

<style scoped>

.my-card {
    height: 250px;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 350px;
    justify-content: space-between;
}
.child-1{

   display: flex;
   justify-content: space-between;
}
.my-card  .card-child{
    width: 100%;
}
.extra-info{

    display: flex;
    flex-direction: row;
    align-items: center;
   
    justify-content: space-around;
    
    
}
.extra-info .child{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}
.extra-info .child p {
    
    text-align: center;
    font-weight: 500;
    border-bottom: 1px solid black;
}

</style>