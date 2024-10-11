<script setup>
import { Head } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import ColorThief from "colorthief"; // Import ColorThief

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
    "10.png",
    "11.png",
    "12.png",
    "13.png",
    "14.png",
    "15.png",
    "16.png",
    "17.png",
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
</script>

<template>
    <Head title="Centered Layout" />
    <div class="min-h-screen flex justify-center items-center bg-gray-100">
        <div class="hidden md:block w-[10vw]"></div>
        <div class="w-[80vw] bg-white p-4 rounded-lg shadow-lg">
            <a href="https://sdgs.un.org/" target="_blank">
                <img
                    src="/sdg/mainLogo.png"
                    alt="Main Logo"
                    class="mx-auto mb-4 h-[15vh]"
                />
            </a>
            <div class="wrapper ten">
        <div>
            <h3 class="bounce">
                <span>C</span>
                <span>E</span>
                <span>N</span>
                <span>T</span>
                <span>E</span>
                <span>R</span>
            </h3>
        </div>
    </div>
            <p class="text-lg leading-relaxed text-justify">
                <strong>The Sustainable Development Goals (SDGs)</strong>, also
                known as the Global Goals, were adopted by the United Nations as
                a universal call to action to end poverty, protect the planet,
                and ensure that all people enjoy peace and prosperity. The 17
                SDGs are integrated—they recognize that action in one area will
                affect outcomes in others, and that development must balance
                social, economic, and environmental sustainability. This is a
                committed effort to prioritize progress so that
                <em>no one is left behind</em>.
            </p>
            <div
                class="min-h-screen mr-6 flex flex-wrap justify-center items-center gap-9 p-4"
            >
                <div
                    v-for="(image, index) in images"
                    :key="index"
                    class="card w-40 relative"
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
                            <h2 v-if="index < 17">SDG {{ index + 1 }}</h2>
                            <h2 v-else>Sustainable Development Goals (SDGs)</h2>
                            <p class="text-sm" v-if="index < 17">
                                {{ sdgDescriptions[index] }}
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
        </div>
        <div class="hidden md:block w-[10vw]"></div>
    </div>
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

@import url('https://fonts.googleapis.com/css2?family=Play&display=swap');

.bounce {
    font-size: 5rem;
    width: 100%;
    display: inline-flex;
    justify-content: center;
    -webkit-box-reflect: below -20px linear-gradient(transparent, #211e1e2e);
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

</style>
