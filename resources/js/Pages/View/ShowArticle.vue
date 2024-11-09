<script setup>
import { Head, Link } from "@inertiajs/vue3";
import {ref, computed, onMounted} from "vue";
import Footer from "@/Pages/Footer.vue";
import Header from "@/Pages/Header.vue";

import { defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia';

import {
    Menu as IconMenu,
} from '@element-plus/icons-vue';
import { ElTable, ElTableColumn, ElMenu, ElMenuItem, ElPagination } from 'element-plus';
import 'element-plus/es/components/table/style/css'; // Import necessary styles
import 'element-plus/es/components/table-column/style/css';
const handleOpen = (key, keyPath) => {
    console.log(key, keyPath);
};

const handleClose = (key, keyPath) => {
    console.log(key, keyPath);
};





const items = [
    { id: 1, image: "/article/image1.jpg", title: "Unity in Diversity: MinSU Unites for its Annual Culture and Arts Festival", category: "Student", alt: "Image 1", date: "October 29, 2024", sdgNumbers: [4] },
    { id: 2, image: "/article/image2.jpg", title: "PSA MIMAROPA recognizes MinSU as Most Responsive Agency", category: "Administration", alt: "Image 2", date: "October 29, 2024", sdgNumbers: [17] },
    { id: 3, image: "/article/image3.jpg", title: "ABEL students win Best Paper and Abstract Awards at 2024 ASREI Conference", category: "Academics", alt: "Image 3", date: "October 28, 2024", sdgNumbers: [4, 9] },
    { id: 4, image: "/article/image4.jpg", title: "MinSU Clinches 9th Place at 2024 STRASUC Olympics", category: "Students", alt: "Image 4", date: "October 26, 2024", sdgNumbers: [4] },
];

const metrics = [
    {
        sdg_id: 1,
        category: ["Proportion of students receiving financial aid to attend university","University anti-poverty programmes","Community anti-poverty programmes"],
    },
];

const questions = [
    {
        sdg_id: 1,
        question: "Bottom financial quintile admission target\n" +
            "Targets to admit students who fall into the bottom 20% of household income group (or a more tightly defined target) in the country.",
        answer: "Yes",
        proof1: "/proof.pdf",
        proof2: "",

    },
    {
        sdg_id: 1,
        question: "Bottom financial quintile student success\n" +
            "Graduation/completion targets for students who fall into the bottom 20% of household income group (or a more tightly defined target) in the country.",
        answer: "Yes",
        proof1: "/proof.pdf",
        proof2: "/proof.pdf",

    },
    {
        sdg_id: 1,
        question: "Low-income student support\n" +
            "Provide support (e.g. food, housing, transportation, legal services) for students from low income families to enable them to complete university.",
        answer: "Yes",
        proof1: "/proof.pdf",
        proof2: "/proof.pdf",

    },
];

// Reactive state to store the selected SDG
const selectedSdg = ref(null);

// Method to handle selection of an SDG
function selectSdg(sdg) {
    selectedSdg.value = sdg;
}
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
const itemsPerPage = 3;
const totalPages = computed(() => Math.ceil(images.value.length / itemsPerPage));
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

// Computed property to filter articles by selected SDG number
const filteredArticles = computed(() => {
    if (selectedImage.value === null) return items;
    const sdgNumber = selectedImage.value + 1; // Match SDG number (1-based index)
    return items.filter(item => item.sdgNumbers.includes(sdgNumber));
});

const getRandomIcons = () => {
    const shuffledImages = [...images.value].sort(() => 0.5 - Math.random());
    const numberOfIcons = Math.floor(Math.random() * 5) + 1;
    return shuffledImages.slice(0, numberOfIcons);
};

const props = defineProps({
    items: Array,
    sdgs: Array,
});

const goToArticle = (articleId) => {
    Inertia.visit(`/SDG/article${articleId}`);
};

// Refs to table sections for scrolling
const tableRefs = {
    "Proportion of students receiving financial aid to attend university": ref(null),
    "University anti-poverty programmes": ref(null),
    "Community anti-poverty programmes": ref(null),
};

// Scroll function
const scrollToSection = (id) => {
    const target = document.getElementById(id);
    if (target) {
        target.scrollIntoView({ behavior: "smooth", block: "start" });
    }
};


</script>

<template>
    <Header></Header>
    <Head title="Per SDG" />
    <div class="flex flex-col md:flex-row min-h-screen pt-[200px] px-4 md:px-0">

        <!-- Sidebar for SDG Images -->
        <div class=" fixed md:w-[20vw] h-full m-4 top-0 left-0 bg-white border border-right-2 overflow-y-auto pt-[150px]">
            <Link href="/">
                <button class="bg-blue-500 hover:bg-blue-700 mb-2 text-white font-bold py-2 px-4">
                    SDG HOME
                </button>
            </Link>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-1 items-center">
                <div
                    v-for="(sdg, index) in sdgs"
                    :key="index"
                    class="relative p-0 cursor-pointer"
                    @click="selectSdg(sdg)"
                >
                    <img
                        :src="`storage/${sdg.icon}`"
                    :alt="`SDG ${sdg.name}`"
                    class="w-full max-w-[15vw] md:max-w-[8vw] lg:max-w-[5vw]"
                    />
                </div>
            </div>

            <!--   Metrics-->
            <div class="px-4 md:px-8">
                <el-row class="tac pt-12 md:pt-16">
                    <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
                        <h5 class="mb-4 text-lg md:text-xl">Programs and Innovations</h5>
                        <el-menu
                            active-text-color="#083cff"
                            default-active="1"
                            text-color="#5c5c5c"
                            @open="handleOpen"
                            @close="handleClose"
                            class="program-menu"
                        >
                            <el-menu-item
                                v-for="(category, index) in metrics[0].category"
                                :key="index"
                                :index="String(index + 1)"
                                @click="scrollToSection(category)"
                            >
                                <el-icon><icon-menu /></el-icon>
                                <span class="ml-2 truncate-text">{{ category }}</span>
                            </el-menu-item>
                        </el-menu>
                    </el-col>
                </el-row>
            </div>
        </div>


        <!-- Main Content -->
        <div class="flex-grow p-4 md:p-8 rounded-lg ml-[350px]">
            <div v-if="selectedSdg" class="flex flex-col md:flex-row items-center">
                <img
                    :src="`storage/${selectedSdg.icon}`"
                    alt="Selected SDG Icon"
                    class="w-40 h-40 md:w-60 md:h-60 object-cover mb-4 md:mb-0 md:mr-10"
                />
                <div>
                    <h2 class="text-xl font-semibold">{{ selectedSdg.name }}</h2>
                    <p class="text-lg mt-2">{{ selectedSdg.description }}</p>
                </div>
            </div>
            <!-- Related Articles -->
            <h2 class="text-xl font-bold mb-4">Related Articles</h2>
            <div v-if="filteredArticles.length === 0" class="text-gray-500 text-center my-4">
                No related articles
            </div>

            <!-- Article List -->
            <div class="flex flex-wrap gap-4 mb-4">
                <!--                <button-->
                <!--                    @click="prevPage"-->
                <!--                    :disabled="currentPage === 1"-->
                <!--                    class="bg-gray-500 text-white px-4 py-2 rounded disabled:bg-gray-300"-->
                <!--                >-->
                <!--                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
                <!--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />-->
                <!--                    </svg>-->
                <!--                </button>-->

                <div class="flex flex-wrap overflow-x-auto space-x-5 py-3 w-full justify-center">
                    <div
                        v-for="(item, index) in filteredArticles"
                        :key="item.id"
                        @click="goToArticle(item.id)"
                        class="w-full md:max-w-[45%] lg:max-w-[30%] xl:max-w-[30%] rounded overflow-hidden shadow-lg"
                        style="max-width: 300px;"
                    >
                        <img
                            class="w-full h-36 object-cover"
                            :src="item.image"
                            :alt="item.alt"
                        />
                        <div class="px-4 py-2">
                            <div class="font-bold text-lg mb-1">
                                {{ item.title }}
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-sm">{{ item.category }}</span>
                                <img
                                    v-if="selectedImage !== null"
                                    :src="`/sdg/${images[selectedImage]}`"
                                    class="object-cover mx-1 max-h-6"
                                    alt="SDG Icon"
                                />
                            </div>
                            <div class="flex items-center pt-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    class="text-gray-700 mr-2"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M8 14q-.425 0-.712-.288T7 13t.288-.712T8 12t.713.288T9 13t-.288.713T8 14m4 0q-.425 0-.712-.288T11 13t.288-.712T12 12t.713.288T13 13t-.288.713T12 14m4 0q-.425 0-.712-.288T15 13t.288-.712T16 12t.713.288T17 13t-.288.713T16 14M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5z"
                                    />
                                </svg>
                                <span class="text-gray-700 font-semibold text-sm">{{ item.date }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex justify-center mt-5">
                        <el-pagination background layout="prev, pager, next" :total="100" />
                    </div>

                </div>




                <!--                <button-->
                <!--                    @click="nextPage"-->
                <!--                    :disabled="currentPage === totalPages"-->
                <!--                    class="bg-gray-500 text-white px-4 py-2 rounded disabled:bg-gray-300"-->
                <!--                >-->
                <!--                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
                <!--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />-->
                <!--                    </svg>-->
                <!--                </button>-->
            </div>
            <div class="flex-grow p-4 md:p-8 rounded-lg ">
                <!-- Tables with Sections -->
                <div v-for="(category, index) in metrics[0].category" :key="index" :id="category" class="justify-content-center mb-4 pt-[200px]">

                    <h5 class="mb-3 font-bold">{{ category }}</h5>
                    <el-table :data="questions" border style="width: 100%">
                        <el-table-column prop="question" label="Metric/Indicator" width="500" />
                        <el-table-column prop="answer" label="Answer" width="100" />
                        <el-table-column label="Proof1">
                            <template #default="{ row }">
                                <a v-if="row.proof1" :href="row.proof1" target="_blank" class="text-blue-500 underline">
                                    {{ row.proof1 }}
                                </a>
                                <span v-else>No proof available</span>
                            </template>
                        </el-table-column>
                        <el-table-column label="Proof2">
                            <template #default="{ row }">
                                <a v-if="row.proof2" :href="row.proof2" target="_blank" class="text-blue-500 underline">
                                    {{ row.proof2 }}
                                </a>
                                <span v-else>No proof available</span>
                            </template>
                        </el-table-column>
                    </el-table>
                </div>
            </div>

        </div>

    </div>
</template>

<style scoped>

.program-menu {
    max-width: 400px; /* Adjust to align with SDG grid */
    margin: 0 auto; /* Center the menu */
    border-right: none; /* Remove right border if necessary */
}
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

.truncate-item {
    max-width: 250px; /* Limit width to prevent extra line */
    overflow: hidden;
}

.truncate-text {
    max-width: 300px; /* Set a maximum width for text */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: inline-block;
}
/* Large screen and up */
@media (min-width: 1024px) {
    .truncate-text-lg {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
}


</style>
