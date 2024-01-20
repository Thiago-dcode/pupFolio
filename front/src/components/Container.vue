<!-- eslint-disable vue/multi-word-component-names -->
<template>
    <div id="container" class="q-pa-md row items-start q-gutter-md"  >
        <slot></slot>
    </div>
</template>

<style scoped>
#container {

    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
}
</style>