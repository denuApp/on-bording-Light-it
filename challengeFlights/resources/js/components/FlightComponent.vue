<template>
    <div>
        Flight Component, {{greeting}}
    </div>
</template>

<script>

import { ref } from 'vue'
export default {
    setup(){
        let greeting = ref('hello there')

        return {greeting}
    }
}

</script>

<style>

</style>
