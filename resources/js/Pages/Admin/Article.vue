<script setup>

import Header from "@/Pages/Header.vue";
import Footer from "@/Pages/Footer.vue";
</script>

<template>
    <Header></Header>
    <div class="min-h-screen flex justify-center items-center bg-gray-100 pt-[150px]">
        <div class="hidden md:block w-[10vw]"></div>

        <div class="hidden md:block w-[10vw]"></div>
    </div>
    <Footer></Footer>
</template>


<style>
@import url("https://fonts.googleapis.com/css?family=Oswald:400,700");

*,
*::before,
*::after {
    box-sizing: border-box;
    margin: 0;
}

body {
    height: 100vh;
    display: grid;
    place-items: center;
    font-family: "Oswald", sans-serif;
}

.card {
    perspective: 800px;
}

.card__content {
    transform-style: preserve-3d;
}

.card:hover .card__content {
    transform: rotateY(0.5turn);
}

.card__front,
.card__back {
    backface-visibility: hidden;
}

.card__back {
    transform: rotateY(0.5turn);
}
</style>

