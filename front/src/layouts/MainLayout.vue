<template>
  <q-layout view="hHh Lpr fff">

    <q-header class="bg-primary text-white" height-hint="98">
      <q-toolbar>
        <q-toolbar-title>
          <q-avatar>
            <img src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg">
          </q-avatar>
          PupFolio
        </q-toolbar-title>
      </q-toolbar>

      <q-tabs align="center">

        <q-route-tab to="/dogs" label="Dogs" />
        <q-route-tab to="/breeds" label="Breeds" />
        <q-route-tab to="/new"><q-btn size="10px" round color="black" text="black" icon="pets" /></q-route-tab>

      </q-tabs>

    </q-header>

    <q-page-container>
      <router-view />
    </q-page-container>

  </q-layout>
</template>

<script>
import { defineComponent, ref } from 'vue'



export default defineComponent({
  name: 'MainLayout',

  components: {

  },

  setup() {
    const leftDrawerOpen = ref(false)

    return {

      leftDrawerOpen,
      toggleLeftDrawer() {
        leftDrawerOpen.value = !leftDrawerOpen.value
      }
    }
  }
})
</script>
