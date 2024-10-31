<template>
    <div>
        <slot></slot>
        <sdg-home></sdg-home>
    </div>
</template>

<script>
// import SDGHome from './SDG_Home.vue';
import SDGHome from './SDG_Home.vue';

export default {
    components: {
        SDGHome,
    },
};
</script>
