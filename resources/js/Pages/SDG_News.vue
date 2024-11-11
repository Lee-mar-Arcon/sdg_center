<script setup>
import {Head, Link} from "@inertiajs/vue3";
import {ref, computed, onMounted, defineProps, watch} from "vue";
import Footer from "@/Pages/Footer.vue";
import Header from "../Components/Header.vue";

import {
    Menu as IconMenu,
} from '@element-plus/icons-vue';
import {ElTable, ElTableColumn, ElMenu, ElMenuItem, ElPagination} from 'element-plus';
import 'element-plus/es/components/table/style/css'; // Import necessary styles
import 'element-plus/es/components/table-column/style/css';
import pdfComponent from "../Components/pdfComponent.vue";

const handleOpen = (key, keyPath) => {
    console.log(key, keyPath);
};

const handleClose = (key, keyPath) => {
    console.log(key, keyPath);
};


const props = defineProps({
    list: {
        type: Array,
        required: true,

    },
    articles: {
        type: Array,
        required: true,
    }
});

const pdfLink = ref("")
const viewingPDF = ref(false)


// Selected SDG to display details
const selectedSdg = ref(null);

// Function to handle SDG selection
function selectSdg(sdg) {
    selectedSdg.value = sdg;
}

onMounted(() => {
    // Check if the list is not empty and if SDG 1 exists
    if (props.list && props.list.length > 0) {
        selectedSdg.value = props.list.find(sdg => sdg.id === 1) || props.list[0]; // Fallback to first SDG if SDG 1 is not found
    }
});


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
    if (!selectedSdg.value) {
        return props.articles; // If no SDG is selected, return all articles
    }
    // Filter the articles based on the selected SDG
    return props.articles.filter(article =>
        article.sdgs.some(sdg => sdg.id === selectedSdg.value.id)
    );
});

function displayPDF(link) {
    viewingPDF.value = true
    pdfLink.value = `${route().t.url}/storage/${link}`
}

function hidePDF() {
    viewingPDF.value = false
}

function goToArticle(id) {
    window.location.href = `/articles/${id}`;
}

const scrollToSection = (id) => {
    const target = document.getElementById(id);
    if (target) {
        const targetRect = target.getBoundingClientRect();
        const targetOffset = targetRect.top + window.pageYOffset;
        const windowHeight = window.innerHeight;

        // Calculate the offset to center the element
        const offset = targetOffset - (windowHeight / 2) + (targetRect.height / 2);

        window.scrollTo({
            top: offset,
            behavior: "smooth",
        });
    }
};

</script>

<template>
    <div class="layout-wrapper">
        <pdfComponent @hide="hidePDF" :viewingPDF="viewingPDF" :link='pdfLink'></pdfComponent>
        <Header class="header"></Header>
        <Head title="Per SDG"/>

        <div class="flex flex-col md:flex-row min-h-screen px-4 md:px-0">
            <!-- Sidebar for SDG Images -->
            <div
                class="hidden md:block fixed md:w-[20vw] top-0 left-0 p-2 overflow-y-auto pt-[200px] sidebar"
            >
                <Link href="/">
                    <p class="text-lg cursor-pointer underline underline-offset-1"> Sdg Home</p>
                </Link>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-1 items-center p-2">
                    <div v-for="sdg in list" :key="sdg.id" class="relative p-0">
                        <img
                            :src="`/storage/${sdg.icon}`"
                            :alt="sdg.name"
                            class="w-full max-w-[15vw] md:max-w-[8vw] lg:max-w-[5vw] cursor-pointer"
                            @click="selectSdg(sdg)"

                        />
                    </div>
                </div>

                <div v-if="selectedSdg">
                    <el-row class="tac pt-12 md:pt-16">
                        <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
                            <h5 class="mb-2 text-lg md:text-xl">Programs and Innovations</h5>
                            <template v-for="metric in selectedSdg.metrics">
                                <el-menu
                                    active-text-color="#083cff"
                                    default-active="1"
                                    text-color="#5c5c5c"
                                    @open="handleOpen"
                                    @close="handleClose"
                                    class="program-menu"
                                    v-if="metric.indicators.length"
                                >

                                    <el-menu-item v-for="question in metric.indicators"
                                                  @click="scrollToSection(question.id)"
                                    >
                                        <el-icon>
                                            <icon-menu/>
                                        </el-icon>
                                        <span class="ml-2 truncate-text">{{ metric.sub_category }}</span>
                                    </el-menu-item>
                                </el-menu>
                            </template>
                        </el-col>
                    </el-row>

                </div>
            </div>


            <!-- Main Content -->
            <div class="flex-grow p-4 md:p-8 rounded-lg main-content">
                <div class="flex flex-col md:flex-row items-center mb-4">
                    <img
                        v-if="selectedSdg !== null"
                        :src="`/storage/${selectedSdg.icon}`"
                        alt="Selected Image"
                        class="w-40 h-40 md:w-60 md:h-60 object-cover mb-4 md:mb-0 md:mr-10"
                    />
                    <p v-if="selectedSdg !== null" class="text-lg text-left w-full md:max-w-md">
                        {{ selectedSdg.description }}
                    </p>
                </div>

                <!-- Related Articles -->
                <h2 class="text-xl font-bold mb-4">Related Articles</h2>
                <div v-if="filteredArticles.length == 0" class="text-gray-500 text-center my-4">
                    No related articles
                </div>
                <!-- Article List -->
                <div class="flex flex-wrap gap-4 mb-4">
                    <div class="flex flex-wrap overflow-x-auto space-x-5 py-3 w-full justify-center">
                        <div
                            v-for="article in filteredArticles"
                            class="w-full md:max-w-[45%] lg:max-w-[30%] xl:max-w-[30%] rounded overflow-hidden shadow-lg"
                            style="max-width: 300px;"
                            :key="article.id"
                            @click="goToArticle(article.id)"
                        >
                            <img
                                class="w-full h-36 object-cover"
                                :src="`/storage/${article.images}`"
                                :alt="article.title"
                            />
                            <div class="px-4 py-2">
                                <div class="font-bold text-lg mb-1">
                                    {{ article.title }}
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-sm"></span>

                                </div>

                                <div class="flex items-center pt-2">

                                 <span v-for="sdg in article.sdgs" :key="sdg.id">
                                  <img
                                      :src="`/storage/${sdg.icon}`"
                                      :alt="sdg.name"
                                      class="w-full max-w-[10vw] md:max-w-[5vw] lg:max-w-[2vw] cursor-pointer ml-2"
                                      @click="selectSdg(sdg)"
                                  />
                                </span>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        viewBox="0 0 24 24"
                                        class="text-gray-700 ml-2"
                                    >
                                        <path
                                            fill="currentColor"
                                            d="M8 14q-.425 0-.712-.288T7 13t.288-.712T8 12t.713.288T9 13t-.288.713T8 14m4 0q-.425 0-.712-.288T11 13t.288-.712T12 12t.713.288T13 13t-.288.713T12 14m4 0q-.425 0-.712-.288T15 13t.288-.712T16 12t.713.288T17 13t-.288.713T16 14M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5z"
                                        />
                                    </svg>
                                    <span class="text-gray-700 font-semibold text-sm">{{ article.event_date }}</span>


                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div v-if="selectedSdg" class="flex-grow p-4 md:p-8 rounded-lg ">
                    <!-- Tables with Sections -->
                    <template v-for="metric in selectedSdg.metrics" :key="metric.id">
                        <div class="justify-content-center mb-4 ">
                            <div v-if="metric.indicators.length">
                                <h5 class="mb-3 font-bold">{{ metric.sub_category }}</h5>
                                <table v-for="question in metric.indicators" :key="question.id" :id="question.id"
                                       class="w-auto text-left table-auto">
                                    <thead>
                                    <tr class="border-b border-slate-300 bg-slate-50">
                                        <th class="p-4 text-sm font-normal leading-none text-slate-500">Metric</th>
                                        <th class="p-4 text-sm font-normal leading-none text-slate-500">Answer</th>
                                        <th class="p-4 text-sm font-normal text-center w-48 leading-none text-slate-500">Proof
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="hover:bg-slate-50">
                                        <td class="p-4 border-b border-slate-200 py-5 min-w-[17vw]">
                                            <p class="block font-semibold text-sm text-slate-800">{{ question.indicator }}</p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200 py-5 min-w-[17vw]">
                                            <p class="block font-semibold text-sm text-slate-800">{{ question.applied }}</p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200 py-5">
                                            <button @click="e => displayPDF(question.evidence_1)" class="text-blue-600">
                                                {{ question.evidence_1_name }}
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </template>

                </div>

            </div>

        </div>

        <Footer class="footer"></Footer>
    </div>
</template>

<style scoped>
html, body {
    height: 100%;
    margin: 0;
}

/* Layout wrapper for the page */
.layout-wrapper {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
}

/* Header fixed to the top */
.header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 10;
}

/* Footer fixed to the bottom */
.footer {
    position: relative;
    margin-top: auto;
    padding: 20px;
    background: #f1f1f1;
    width: 100%;
    text-align: center;
}

/* Main content section */
.main-content {

    flex: 1;
    margin-top: 100px;
    padding-top: 60px; /* space for the header */
    padding-bottom: 60px; /* space for the footer */
    overflow: hidden;
}

/* Sidebar that sticks until the footer */
.sidebar {
    position: -webkit-sticky; /* For Safari */
    position: sticky;
    top: 0;
    height: 100%;
}

/* Content area for the sidebar */
.content-area {
    flex: 1;
    padding: 20px;
    overflow: auto;
}

.program-menu {
    max-width: 400px; /* Adjust to align with SDG grid */
    margin: 0 auto; /* Center the menu */
    border-right: none; /* Remove right border if necessary */
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
