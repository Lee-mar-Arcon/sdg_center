<script setup>
import { Head, Link } from "@inertiajs/vue3";
// import { Head } from "@inertiajs/vue3";
import Footer from './Footer.vue';
import Header from './Header.vue';
import { ref, onMounted } from "vue";
import ColorThief from "colorthief";
const images = ref([
    "01.png",
    "02.png",
    "03.png",
    "04.png",
    "05.png",
    "06.png",
    "07.png",
    "08.png",
    "09.png",
    "010.png",
    "011.png",
    "012.png",
    "013.png",
    "014.png",
    "015.png",
    "016.png",
    "017.png",
    "mainLogo.png",
]);

const sdgDescriptions = ref([
    "No Poverty: End poverty in all its forms everywhere.",
    "Zero Hunger: End hunger, achieve food security and improved nutrition, and promote sustainable agriculture.",
    "Good Health and Well-being: Ensure healthy lives and promote well-being for all at all ages.",
    "Quality Education: Ensure inclusive and equitable quality education and promote lifelong learning opportunities for all.",
    "Gender Equality: Achieve gender equality and empower all women and girls.",
    "Clean Water and Sanitation: Ensure availability and sustainable management of water and sanitation for all.",
    "Affordable and Clean Energy: Ensure access to affordable, reliable, sustainable, and modern energy for all.",
    "Decent Work and Economic Growth: Promote sustained, inclusive, and sustainable economic growth, full and productive employment, and decent work for all.",
    "Industry, Innovation and Infrastructure: Build resilient infrastructure, promote inclusive and sustainable industrialization, and foster innovation.",
    "Reduced Inequality: Reduce inequality within and among countries.",
    "Sustainable Cities and Communities: Make cities and human settlements inclusive, safe, resilient, and sustainable.",
    "Responsible Consumption and Production: Ensure sustainable consumption and production patterns.",
    "Climate Action: Take urgent action to combat climate change and its impacts.",
    "Life Below Water: Conserve and sustainably use the oceans, seas, and marine resources for sustainable development.",
    "Life on Land: Protect, restore and promote sustainable use of terrestrial ecosystems, sustainably manage forests, combat desertification, and halt and reverse land degradation and halt biodiversity loss.",
    "Peace, Justice and Strong Institutions: Promote peaceful and inclusive societies for sustainable development, provide access to justice for all and build effective, accountable, and inclusive institutions at all levels.",
    "Partnerships for the Goals: Strengthen the means of implementation and revitalize the Global Partnership for Sustainable Development.",
    "Visit the SDG Website: Explore the Sustainable Development Goals at sdgs.un.org.",
]);
const items = [
    {
        image: "/article/image1.jpg",
        title: "Unity in Diversity: MinSU Unites for its Annual Culture and Arts Festival",
        category: "Student",
        alt: "Image 1",
        date: "October 29, 2024",

    },
    {
        image: "/article/image2.jpg",
        title: "PSA MIMAROPA recognizes MinSU as Most Responsive Agency",
        category: "Administration",
        alt: "Image 2",
        date: "October 29, 2024",
    },
    {
        image: "/article/image3.jpg",
        title: "ABEL students win Best Paper and Abstract Awards at 2024 ASREI Conference",
        category: "Academics",
        alt: "Image 3",
        date: "October 28, 2024",
    },
    {
        image: "/article/image4.jpg",
        title: "MinSU Clinches 9th Place at 2024 STRASUC Olympics",
        category: "Students",
        alt: "Image 3",
        date: "October 26, 2024",
    },
];
const cardBackColors = ref([]);

onMounted(() => {
    const colorThief = new ColorThief();

    images.value.forEach((image, index) => {
        const imgElement = new Image();
        imgElement.src = `/sdg/${image}`;
        imgElement.onload = () => {
            const dominantColor = colorThief.getColor(imgElement);
            cardBackColors.value[index] = `rgb(${dominantColor.join(",")})`;
        };
    });
});
import { defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia';
const props = defineProps({
    items: Array,
});

const goToArticle = (articleId) => {
    Inertia.visit(`/SDG/article${articleId}`);
};

</script>

<template>
    <Header></Header>
    <Head title="MinSU SDG Center" />
    <div class="min-h-screen flex justify-center items-center bg-gray-100 pt-[150px]">
        <div class="hidden md:block w-[10vw]"></div>
        <div class="w-[80vw] bg-white p-4 rounded-lg shadow-lg">
            <h1 class="gradient mb-[-5]"> <b>MINDORO STATE UNIVERSITY </b></h1>
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
                    v-for="(image, index) in images"
                    :key="index"
                    class="card w-40  mb-6 ml-2 "
                >
                    <div
                        class="card__content text-center relative p-24 transition-transform duration-1000 text-white font-bold"
                    >
                        <div
                            class="card__front absolute top-0 bottom-0 right-0 left-0 p-0 flex items-center justify-center"
                        >
                            <img
                                :src="`/sdg/${image}`"
                                :alt="`Image ${index + 1}`"
                                class="max-w-full"
                            />
                        </div>
                        <div
                            class="card__back absolute top-0 bottom-0 right-0 left-0 p-1 flex flex-col items-left justify-left text-left"
                            :style="{
                                backgroundColor:
                                    index === 17
                                        ? 'gray'
                                        : cardBackColors[index] || 'gray',
                            }"
                        >
                            <h2 class="mb-2"  v-if="index < 17">SDG {{ index + 1 }}</h2>
                            <h2 style="font-family: 'Century Gothic'"v-else>Sustainable Development Goals (SDGs)</h2>
                            <p  style="font-family: 'Century Gothic'; font-size: 12px; line-height: 1.2; text-align: left;" class="text-sm ml-1 mr-1" v-if="index < 17">
                                <a href="/news" style="font-weight: normal;">
                                {{ sdgDescriptions[index] }}
<!--                                <a href="/sdg/article/" class="text-blue-500 font-bold underline hover:text-blue-700 transition duration-300 ease-in-out">-->
<!--                                    Click here for more info-->
                                </a>
                            </p>

                            <p class="mt-2" v-else>
                                <a style="font-family: 'Century Gothic'"
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
                    v-for="(item, index) in items"
                    :key="index"
                    @click="goToArticle(index + 1)"
                    class="ml-1 mr-1 max-w-[13vw] mt-2 rounded overflow-hidden shadow-lg"
                >
                    <img
                        class="w-full h-36 object-cover"
                        :src="item.image"
                        :alt="item.alt"
                    />
                    <div class="px-2 py-2">
                        <div class="font-bold text-l mb-1">
                            {{ item.title }}
                        </div>
                    </div>
                    <div class="px-2 py-1 flex items-center justify-between">
                        <div class="font-bold text-s mb-1">
                            {{ item.category }}
                        </div>
                        <div class="flex">
                            <img
                                v-for="sdg in [1, 3, 5, 9]"
                                :key="sdg"
                                :src="'/sdg/0' + sdg + '.png'"
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
       {{ item.date }}
      </span>
                    </div>
                </div>
                <div
                    class="max-w-[10vw] h-[340px] mt-2 rounded overflow-hidden bg-slate-200 shadow-lg flex items-center justify-center"
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
        </div>
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

.body_home {
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

@import url("https://fonts.googleapis.com/css2?family=Play&display=swap");

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
.bounce {
    font-size: 6rem;
    width: 100%;
    font-family: "Austein Script";
    display: inline-flex;
    justify-content: center;
    /*-webkit-box-reflect: below -20px linear-gradient(transparent, #211e1e2e);*/
}
.bounce span {
    display: inline-flex;
    color: #63e422;
    font-family: "Play", sans-serif;
    animation: bounce 1s infinite;
}
@keyframes bounce {
    0%,
    50%,
    100% {
        transform: translateY(0);
    }
    25% {
        transform: translateY(-20px);
    }
}
.ten span:nth-of-type(1) {
    animation-delay: 0.1s;
}
.ten span:nth-of-type(2) {
    animation-delay: 0.2s;
}
.ten span:nth-of-type(3) {
    animation-delay: 0.3s;
}
.ten span:nth-of-type(4) {
    animation-delay: 0.4s;
}
.ten span:nth-of-type(5) {
    animation-delay: 0.5s;
}
.ten span:nth-of-type(6) {
    animation-delay: 0.6s;
}

@import url("https://fonts.googleapis.com/css2?family=Pacifico&display=swap");

.gradient {
    /*background-image: linear-gradient(*/
    /*    90deg,*/
    /*    rgba(94, 114, 235, 1) 0%,*/
    /*    rgba(255, 145, 144, 1) 56%,*/
    /*    rgba(254, 193, 149, 1) 100%*/
    /*);*/
    color: #005c2b;
    /*-webkit-background-clip: text;*/
    /*animation: move 1s infinite;*/
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Roboto Bold";
    font-size: 4vmin;
    line-height: 1;
}

@keyframes move {
    50% {
        background-image: linear-gradient(
            262deg,
            rgba(94, 114, 235, 1) 0%,
            rgba(255, 145, 144, 1) 56%,
            rgba(254, 193, 149, 1) 100%
        );
    }
}
</style>
