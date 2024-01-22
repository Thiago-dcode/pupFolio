<template>
  <q-layout view="hHh Lpr fff">

    <q-header class="bg-blue-9 text-white" height-hint="50">
      <q-toolbar>
        <q-toolbar-title>
          <q-avatar style="width: 70px; height: 70px;">
            <img :src="logo">
          </q-avatar>
          PupFolio
        </q-toolbar-title>
        <router-link  style="text-decoration: none; color: inherit;" to="/info"> <q-btn size="10px" round text="black" icon="info" /></router-link>

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

import logo from "assets/logo/logo.png"

export default defineComponent({
  name: 'MainLayout',

  components: {

  },

  setup() {
    const leftDrawerOpen = ref(false)

    return {
      logo,
      leftDrawerOpen,
      toggleLeftDrawer() {
        leftDrawerOpen.value = !leftDrawerOpen.value
      }
    }
  }
})
</script>
