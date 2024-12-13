<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { Inertia } from '@inertiajs/inertia';
import Footer from './Footer.vue';
import Header from './Header.vue';
import { ref, onMounted } from "vue";
import { computed } from 'vue';
onMounted(() => {
    console.log(props.articles)
});

function goToArticle(id) {
    window.location.href = `/articles/${id}`;
}
const props = defineProps({
    articles: Array,
    sdgs: Array
})

function getLink(path) {
    const domain = route().t.url;
    return domain + `/storage/${path}`
}
</script>

<template>
    <Header></Header>
    <Head title="MinSU SDG Center" />
    <div class="min-h-screen flex justify-center items-center bg-gray-100 pt-[150px]">
        <div class="hidden md:block w-[10vw]"></div>
        <div class="w-[80vw] max-w-screen bg-white p-4 rounded-lg shadow-lg">
            <h2 class="gradient mb-[-5]"> <b>MINDORO STATE UNIVERSITY </b></h2>
            <a href="https://sdgs.un.org/" target="_blank">
                <img
                    src="/sdg/mainLogo.png"
                    alt="Main Logo"
                    class="mx-auto mb-0 h-[15vh]"
                />
            </a>
                    <h3 class="bounce mt-[-30]">
                        Center
                    </h3>
            <div class="flex items-start mt-[-20] ml-[80px]">
                <img src="/sdg/pakudos.png" alt="Pakudos" class="mr-5 h-48" />
                <p class="text-lg leading-relaxed text-justify mb-6 mr-[100px]" style="font-size: 20px">
                    Welcome to the <strong>Mindoro State University Sustainable Development Goal (SDG) Center</strong>, a dedicated hub for promoting sustainable practices and initiatives within our academic community. It showcases a comprehensive collection of MinSU initiatives that align with the United Nations' Sustainable Development Goals.
                <br>
                    This center embodies our commitment to ensure that no one is left behind, fostering collaborative efforts among students, faculty, staff, community, and other stakeholders to pave the way for a sustainable and equitable future for all.
                </p>
            </div>
            <div class="mr-[100px] ml-[100px] grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6  flex-wrap justify-center items-center mt-5">
                <div
                    v-for="sdg in props.sdgs"
                    :key="sdg.id"
                    class="card w-40  mb-6 ml-2 "
                >
                    <div
                        class="card__content text-center relative p-24 transition-transform duration-1000 text-white font-bold"
                    >
                        <div
                            class="card__front absolute top-0 bottom-0 right-0 left-0 p-0 flex items-center justify-center"
                        >
                            <img
                                :src="getLink(sdg.icon)"
                                :alt="sdg.name"
                                class="max-w-full"
                            />
                        </div>
                        <div
                            class="card__back absolute top-0 bottom-0 right-0 left-0 p-1 flex flex-col items-left justify-left text-left"
                            :style="{
                                backgroundColor:
                                    sdg.id === 18
                                        ? 'gray'
                                        : sdg.bg_color || 'gray',
                            }"
                        >
                            <h2 class="mb-2"  v-if="sdg.id < 18">SDG {{ sdg.id }}</h2>
                            <h3 v-else>Sustainable Development Goals (SDGs)</h3>
                            <p  style="font-family: 'Century Gothic'; font-size: 12px; line-height: 1.2; text-align: left;" class="text-sm ml-1 mr-1" v-if="sdg.id < 18">
                                <a :href="`news/?sdg=${sdg.id}`" style="font-weight: normal">
                                    {{ sdg.description }}
                                    <!--                                <a href="/sdg/article/" class="text-blue-500 font-bold underline hover:text-blue-700 transition duration-300 ease-in-out">-->
                                    <!--                                    Click here for more info-->
                                </a>
                            </p>

                            <p class="mt-2" v-else>
                                <a
                                    href="https://sdgs.un.org/"
                                    class="text-white underline"
                                >Visit the SDG Website</a
                                >
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="ml-[120]" style="font-size: 20px"> <strong> Latest Articles </strong></h2>
            <div class="ml-[120] flex justify-start items-start flex-wrap gap-2">
                <div
                    v-for="(item, index) in props.articles"
                    :key="index"
                    @click="goToArticle(item.id)"
                    class="ml-1 mr-1 max-w-[13vw] mt-2 rounded overflow-hidden "
                >
                    <img
                        class="w-full h-36 object-cover"
                        :src="getLink(item.images)"
                    />
                    <div class="px-2 py-2 h-[60px]">
                        <div class="font-bold text-l mb-1 h-full overflow-hidden text-ellipsis">
                            {{ item.title }}
                        </div>
                    </div>
                    <div class="px-2 py-1 flex items-center justify-between" v-for="categories in item.categories">
                        <div class="font-bold text-s mb-1">
                            {{ categories.category }}
                        </div>
                        <div class="flex" v-for="sdg in item.sdgs">
                            <img
                                :src="getLink(sdg.icon)"
                                class="object-cover mx-0.5 max-h-[20px] aspect-square"
                                alt="SDG Icon"
                            />
                        </div>
                    </div>
                    <div class="px-2 pt-2 pb-3 flex items-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            class="text-gray-700 mr-1"
                        >
                            <path
                                fill="currentColor"
                                d="M8 14q-.425 0-.712-.288T7 13t.288-.712T8 12t.713.288T9 13t-.288.713T8 14m4 0q-.425 0-.712-.288T11 13t.288-.712T12 12t.713.288T13 13t-.288.713T12 14m4 0q-.425 0-.712-.288T15 13t.288-.712T16 12t.713.288T17 13t-.288.713T16 14M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5z"
                            />
                        </svg>
                        <span class="text-gray-700 font-semibold text-sm mr-1">
                            {{ item.event_date }}
                        </span>
                    </div>
                </div>
                <div
                    class="max-w-[10vw] h-[280px] mt-2 rounded overflow-hidden bg-slate-200 shadow-lg flex items-center justify-center"
                >
                    <div class="px-6 py-4 text-center">
                        <Link href="/news">
                            <div class="font-bold text-xl mb-2">See More</div>
                            <p class="text-gray-700">
                                Discover more amazing content!
                            </p>
                        </Link>
                    </div>
                </div>
            </div>

<!--            <div class="ml-[120] flex justify-start items-start flex-wrap gap-2">-->
<!--                <div-->
<!--                    v-for="(item, index) in items"-->
<!--                    :key="index"-->
<!--                    @click="goToArticle(index + 1)"-->
<!--                    class="ml-1 mr-1 max-w-[13vw] mt-2 rounded overflow-hidden shadow-lg"-->
<!--                >-->
<!--                    <img-->
<!--                        class="w-full h-36 object-cover"-->
<!--                        :src="item.image"-->
<!--                        :alt="item.alt"-->
<!--                    />-->
<!--                    <div class="px-2 py-2">-->
<!--                        <div class="font-bold text-l mb-1">-->
<!--                            {{ item.title }}-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="px-2 py-1 flex items-center justify-between">-->
<!--                        <div class="font-bold text-s mb-1">-->
<!--                            {{ item.category }}-->
<!--                        </div>-->
<!--                        <div class="flex">-->
<!--                            <img-->
<!--                                v-for="sdg in [1, 3, 5, 9]"-->
<!--                                :key="sdg"-->
<!--                                :src="'/sdg/0' + sdg + '.png'"-->
<!--                                class="object-cover mx-0.5 max-h-[20px] aspect-square"-->
<!--                                alt="SDG Icon"-->
<!--                            />-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="px-2 pt-2 pb-3 flex items-center">-->
<!--                        <svg-->
<!--                            xmlns="http://www.w3.org/2000/svg"-->
<!--                            width="20"-->
<!--                            height="20"-->
<!--                            viewBox="0 0 24 24"-->
<!--                            class="text-gray-700 mr-1"-->
<!--                        >-->
<!--                            <path-->
<!--                                fill="currentColor"-->
<!--                                d="M8 14q-.425 0-.712-.288T7 13t.288-.712T8 12t.713.288T9 13t-.288.713T8 14m4 0q-.425 0-.712-.288T11 13t.288-.712T12 12t.713.288T13 13t-.288.713T12 14m4 0q-.425 0-.712-.288T15 13t.288-.712T16 12t.713.288T17 13t-.288.713T16 14M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5z"-->
<!--                            />-->
<!--                        </svg>-->
<!--                        <span class="text-gray-700 font-semibold text-sm mr-1">-->
<!--       {{ item.date }}-->
<!--      </span>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div-->
<!--                    class="max-w-[10vw] h-[340px] mt-2 rounded overflow-hidden bg-slate-200 shadow-lg flex items-center justify-center"-->
<!--                >-->
<!--                    <div class="px-6 py-4 text-center">-->
<!--                        <Link href="/news">-->
<!--                            <div class="font-bold text-xl mb-2">See More</div>-->
<!--                            <p class="text-gray-700">-->
<!--                                Discover more amazing content!-->
<!--                            </p>-->
<!--                        </Link>-->

<!--                    </div>-->
<!--                </div>-->

<!--            </div>-->
        </div>
        <div class="hidden md:block w-[10vw]"></div>
    </div>
    <Footer></Footer>
</template>


<style>


@font-face {
    font-family: 'Austein Script';
    src: url('/fonts/Austein.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: 'Roboto Bold';
    src: url('/fonts/Roboto-Bold.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}
<style scoped>



.card, .card__content, .card__front, .card__back {
    box-shadow: none;
    border-radius: 0;
    border: none;
    background-color: transparent;
}


/* General Reset */
*,
*::before,
*::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

/* Responsive Container for main content */
.min-h-screen {
    padding: 20px;
}

.body_home {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-family: "Oswald", sans-serif;
}

/* Ensure card flip is dynamic and adapts to various screen sizes */
.card {
    perspective: 1000px;
    width: 100%;
    max-width: 180px; /* Controls the maximum size of the card */
    margin: 10px;
    transition: transform 0.6s ease-in-out;
    box-shadow: none;
}

.card__content {
    transform-style: preserve-3d;
    transition: transform 0.6s;
    box-shadow: none;
}

.card:hover .card__content {
    transform: rotateY(180deg);
}

/* Responsive styling for card content */
.card__front,
.card__back {
    box-shadow: none;
    background-color: transparent;
    backface-visibility: hidden;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
}

/* Card back content with responsive text */
.card__back {
    background-color: transparent;
    transform: rotateY(180deg);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 10px;
    font-size: 0.875rem; /* Default font size for mobile */
}

.card__front img {
    max-width: 100%;
    height: auto;
}

/* Larger screens adjust for readability */
@media (min-width: 768px) {
    .card {
        max-width: 200px;
    }
    .card__back {
        font-size: 1rem;
    }
}

/* Extra large screens */
@media (min-width: 1024px) {
    .card {
        max-width: 220px;
    }
    .card__back {
        font-size: 1.125rem;
    }
}

.gradient {
    color: #005c2b;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Roboto Bold";
    font-size: 3vw;
    text-align: center;
    line-height: 1;
}

.bounce {
    font-size: 5vw;
    width: 100%;
    font-family: "Austein Script";
    display: inline-flex;
    justify-content: center;
}

.bounce span {
    display: inline-flex;
    color: #63e422;
    font-family: "Play", sans-serif;
    animation: bounce 1s infinite;
}

@keyframes bounce {
    0%, 50%, 100% { transform: translateY(0); }
    25% { transform: translateY(-20px); }
}

/* Card layout for responsive grid */
.grid {
    display: grid;
    gap: 10px;
}

.grid-cols-6, .grid-cols-4 {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
}

@media (min-width: 768px) {
    .grid-cols-4 {
        grid-template-columns: repeat(4, 1fr);
    }
    .grid-cols-6 {
        grid-template-columns: repeat(6, 1fr);
    }
}

/* Responsive typography */
.text-lg {
    font-size: 1rem;
}

@media (min-width: 1024px) {
    .text-lg {
        font-size: 1.25rem;
    }
}

/* Article Card Adjustments */
.card {
    max-width: 100%;
    margin: auto;
}

.card__front img {
    width: 100%;
    height: auto;
}

@media (min-width: 768px) {
    .max-w-[13vw] {
    max-width: 20%;
}
    .ml-1, .mr-1 {
        margin-left: 1%;
        margin-right: 1%;
    }
}
</style>

