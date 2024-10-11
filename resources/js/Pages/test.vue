<script setup>
import { Head } from "@inertiajs/vue3";
import { onMounted } from "vue";
onMounted(() => {
    console.log(route('welcome'));
});
</script>

<template>
    <Head title="Welcome" />
    <h1>Welcome</h1>
    <p>Hello, welcome to your first Inertia app!</p>
    <h1 class="text-3xl font-bold underline">Hello world!</h1>
</template>
