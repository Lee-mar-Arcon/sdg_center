<script setup>
import { Head, Link } from "@inertiajs/vue3";
import {ref, computed, onMounted} from "vue";
import Footer from "@/Pages/Footer.vue";
import Header from "@/Pages/Header.vue";
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

const items = [
    {
        image: "https://picsum.photos/200/300?random=1",
        title: "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit",
        category: "Administration",
        alt: "Image 1",
        date: "October 21, 2024",
    },
    {
        image: "https://picsum.photos/200/300?random=2",
        title: "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit",
        category: "Research",
        alt: "Image 2",
        date: "August 01, 2024",
    },
    {
        image: "https://picsum.photos/200/300?random=3",
        title: "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit",
        category: "Students",
        alt: "Image 3",
        date: "July 12, 2024",
    },
];

// State to track the selected image
const selectedImage = ref(null);

// Method to handle image selection
const selectImage = (index) => {
    selectedImage.value = index;
};

// Set default selected image to index 1 when component mounts
onMounted(() => {
    selectedImage.value = 0; // Set the default selected image to index 1
});

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
    <Header></Header>
    <Head title="Per SDG" />
    <div class="flex min-h-screen pt-[150px]">

        <div class="hidden md:block md:w-[20vw] m-4" style="position: fixed; top: 0; left: 0">
            <Link href="/home">
                <button class="bg-blue-500 hover:bg-blue-700 mb-5 text-white font-bold py-2 px-4 rounded-full pt-[150px]">
                    SDG HOME
                </button>
            </Link>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-1 items-center ">
                <div v-for="(image, index) in images" :key="index" class="relative p-0">
                    <img
                        :src="`/sdg/${image}`"
                        :alt="`Image ${index + 1}`"
                        class="max-w-[8vw] sm:max-w-[5vw] lg:max-w-[3.2vw] h-auto cursor-pointer"
                        @click="selectImage(index)"
                        :class="{ 'opacity-50': selectedImage === index }"
                    />
                </div>
            </div>
        </div>

        <div class="flex-grow ml-20 p-16 rounded-lg">
            <div class="flex items-center mb-10 pl-[180px]">
                <img
                    v-if="selectedImage !== null"
                    :src="`/sdg/${images[selectedImage]}`"
                    alt="Selected Image"
                    class="w-60 h-60 object-cover mr-10"
                />
                <p v-if="selectedImage !== null" class="text-lg text-left w-1/2 max-w-md">
                    {{ sdgDescriptions[selectedImage] }}
                </p>
            </div>
            <h2 class="text-xl font-bold mb-4">Related Articles</h2>
            <div class="flex items-center justify-between mb-4">
                <button
                    @click="prevPage"
                    :disabled="currentPage === 1"
                    class="bg-blue-500 text-white px-4 py-2 rounded disabled:bg-gray-300"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <div class="flex overflow-x-auto space-x-4 py-3">
                    <div
                        v-for="(item, index) in items"
                        :key="index"
                        class="max-w-[20vw] rounded overflow-hidden shadow-lg flex-none"
                    >
                        <img
                            class="w-full h-48 object-cover"
                            :src="item.image"
                            :alt="item.alt"
                        />
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">
                                {{ item.title }}
                            </div>
                        </div>
                        <div class="px-6 py-1 flex items-center justify-between">
                            <div class="font-bold text-lg mb-2">
                                {{ item.category }}
                            </div>
                            <div class="flex">
                                <img
                                    v-for="sdg in [1, 3, 5, 9]"
                                    :key="sdg"
                                    :src="'/sdg/0' + sdg + '.png'"
                                    class="object-cover mx-1 max-h-[40px] aspect-square"
                                    alt="SDG Icon"
                                />
                            </div>
                        </div>
                        <div class="px-6 pt-3 pb-5 flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                class="text-gray-700 mr-2"
                            >
                                <path
                                    fill="currentColor"
                                    d="M8 14q-.425 0-.712-.288T7 13t.288-.712T8 12t.713.288T9 13t-.288.713T8 14m4 0q-.425 0-.712-.288T11 13t.288-.712T12 12t.713.288T13 13t-.288.713T12 14m4 0q-.425 0-.712-.288T15 13t.288-.712T16 12t.713.288T17 13t-.288.713T16 14M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5z"
                                />
                            </svg>
                            <span class="text-gray-700 font-semibold text-sm mr-2">
                                Date: {{ item.date }}
                            </span>
                        </div>
                    </div>
                </div>

                <button
                    @click="nextPage"
                    :disabled="currentPage === totalPages"
                    class="bg-blue-500 text-white px-4 py-2 rounded disabled:bg-gray-300"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="hidden md:block w-[1vw]"></div>
    </div>
    <Footer></Footer>
</template>

<style>
@import url("https://fonts.googleapis.com/css?family=Oswald:400,700");

.body_news {
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
