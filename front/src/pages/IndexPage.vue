<template>
    <div></div>
</template>
<script>
import { useRouter } from 'vue-router';
import { onMounted } from 'vue';
export default {

  
    setup() {

        const route = useRouter()
        onMounted( () => {
            route.push({path:'/dogs'})

        });

        return {


        };

    },

};
</script>

