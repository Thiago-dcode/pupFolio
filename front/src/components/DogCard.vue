<template>
   <q-card class="my-card">
      <img :src="image">

      <q-card-section>
        <div class="text-h6">Our Changing Planet</div>
        <div class="text-subtitle2">by John Doe</div>
      </q-card-section>

      <q-card-section class="q-pt-none">
        {{ description }}
      </q-card-section>
    </q-card>
</template>

<script >
export default {
  props: {
    name: String,
    description: String,
    image: String,
    breed: String,
    size:String,
    color: String


  },
  setup(props) {
   
  }
}
</script>