<template>
    <div>

    </div>
</template>

<script setup>
import { onMounted } from "vue"

const props = defineProps({
    subCategories: {
        type: Object,
        required: true
    }
})

onMounted(()=>{
    console.log(props.subCategories);
    
})
</script>

<style lang="scss" scoped>

</style>