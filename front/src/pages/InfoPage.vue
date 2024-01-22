<template>
    <q-page id="info-page">
       
            <q-btn style="padding: 0.2rem; margin: 1rem;" size="10px" round text="black">
                <a  style="text-decoration: none; color: inherit;" target="_blank"
                    href="https://www.figma.com/file/voOc29jcWfvbA1z3G1V9KK/europelanguagesjobs-thiago?type=design&node-id=0%3A1&mode=design&t=qYYRg2Ne9NpzEoDS-1">FIGMA</a>
            </q-btn>
      

        <q-img src="/maqueta.png"></q-img>

    </q-page>
</template>
<script>
import { useRouter } from 'vue-router';
import { onMounted } from 'vue';
export default {


    setup() {

        const route = useRouter()
        onMounted(() => {


        });

        return {


        };

    },

};
</script>

<style scoped>
#info-page {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
</style>