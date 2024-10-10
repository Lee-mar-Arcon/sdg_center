<script setup>
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

const images = ref([
    '01.png', '02.png', '03.png', '04.png', '05.png', '06.png',
    '07.png', '08.png', '09.png', '10.png', '11.png', '12.png',
    '13.png', '14.png', '15.png', '16.png', '17.png', 'mainLogo.png'
]);
</script>

<template>
    <Head title="Centered Layout" />
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2 justify-center items-center">
        <div
            v-for="(image, index) in images"
            :key="index"
            class="card relative p-2"
        >
            <div class="text-center text-white font-bold">
                <div class="flex items-center justify-center">
                    <img
                        :src="`/sdg/${image}`"
                        :alt="`Image ${index + 1}`"
                        class="max-w-full h-auto sm:max-w-[75px] md:max-w-[100px] lg:max-w-[120px]"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css?family=Oswald:400,700");

body {
    font-family: "Oswald", sans-serif;
}

.card {
    transition: transform 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
}
</style>
