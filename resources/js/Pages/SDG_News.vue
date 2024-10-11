<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";

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
const currentPage = ref(1);
const itemsPerPage = 5;
const totalPages = computed(() =>
    Math.ceil(images.value.length / itemsPerPage)
);
const paginatedItems = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    return images.value.slice(start, start + itemsPerPage);
});
const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
    }
};

const prevPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
};
const getRandomIcons = () => {
    const shuffledImages = [...images.value].sort(() => 0.5 - Math.random());
    const numberOfIcons = Math.floor(Math.random() * 5) + 1;
    return shuffledImages.slice(0, numberOfIcons);
};
</script>
<template>
    <Head title="Centered Layout" />
    <div class="flex min-h-screen">
        <div
            class="hidden md:block md:w-[20vw] m-4"
            style="position: fixed; top: 0; left: 0"
        >
            <Link href="/home">
                <button
                    class="bg-blue-500 hover:bg-blue-700 mb-5 text-white font-bold py-2 px-4 rounded-full"
                >
                    SDG HOME
                </button>
            </Link>
            <div
                class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-1 items-center"
            >
                <div
                    v-for="(image, index) in images"
                    :key="index"
                    class="card relative p-0"
                >
                    <div class="text-center text-white font-bold">
                        <div class="flex items-center justify-center">
                            <img
                                :src="`/sdg/${image}`"
                                :alt="`Image ${index + 1}`"
                                class="max-w-[8vw] sm:max-w-[5vw] lg:max-w-[3.2vw] h-auto"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="flex-grow mr-[-4vw] h-[80vh] md:h-[100vh]     p-16 rounded-lg "
        >
            <div>
                <div
                    v-for="(image, index) in paginatedItems"
                    :key="index"
                    class="flex flex-col justify-center"
                >
                    <div
                        class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-gray-300"
                    >
                        <div
                            class="w-full md:w-1/3 bg-white grid place-items-center"
                        >
                            <img :src="`/sdg/${image}`" alt="SDG Image" />
                        </div>
                        <div
                            class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3"
                        >
                            <div class="flex justify-between items-center">
                                <p
                                    class="text-gray-500 font-medium hidden md:block"
                                >
                                    SDG Goal
                                </p>
                                <div class="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-yellow-500"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <p
                                        class="text-gray-600 font-bold text-sm ml-1"
                                    >
                                        4.96<span
                                            class="text-gray-500 font-normal"
                                            >(76 reviews)</span
                                        >
                                    </p>
                                </div>
                            </div>
                            <h3
                                class="font-black text-gray-800 md:text-3xl text-xl"
                            >
                                SDG {{ index + 1 }}
                            </h3>
                            <p class="md:text-lg text-gray-500 text-base">
                                {{ sdgDescriptions[index] }}
                            </p>
                            <div class="flex flex-wrap gap-2 mt-2">
                                <img
                                    v-for="(
                                        icon, iconIndex
                                    ) in getRandomIcons()"
                                    :key="iconIndex"
                                    :src="`/sdg/${icon}`"
                                    alt="SDG Icon"
                                    class="w-8 h-8"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex justify-center space-x-4">
                    <button
                        @click="prevPage"
                        :disabled="currentPage === 1"
                        class="bg-blue-500 text-white px-4 py-2 rounded disabled:bg-gray-300"
                    >
                        Previous
                    </button>
                    <button
                        @click="nextPage"
                        :disabled="currentPage === totalPages"
                        class="bg-blue-500 text-white px-4 py-2 rounded disabled:bg-gray-300"
                    >
                        Next
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden md:block w-[1vw]"></div>
    </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css?family=Oswald:400,700");

body {
    font-family: "Oswald", sans-serif;
    height: 100vh;
}

.card {
    transition: transform 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
}
</style>
