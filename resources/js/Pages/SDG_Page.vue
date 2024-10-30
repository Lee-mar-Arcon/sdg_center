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

const randomIndex = ref(Math.floor(Math.random() * images.value.length));
const randomImage = computed(() => images.value[randomIndex.value]);
const randomDescription = computed(
    () => sdgDescriptions.value[randomIndex.value]
);

const blurImageClass = computed(() => {
    return `blur-[${randomIndex.value * 5}px]`;
});

const isGrayedOut = (index) => {
    return index === randomIndex.value ? "opacity-30" : "";
};

const items = ref([
    {
        image: "https://picsum.photos/200/300?random=1",
        title: "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit",
        alt: "Image 1",
        date: "October 12, 2024",
    },
    {
        image: "https://picsum.photos/200/300?random=2",
        title: "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit",
        alt: "Image 2",
        date: "October 25, 2024",
    },
    {
        image: "https://picsum.photos/200/300?random=3",
        title: "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit",
        alt: "Image 3",
        date: "November 12, 2024",
    },
    {
        image: "https://picsum.photos/200/300?random=14",
        title: "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit",
        alt: "Image 1",
        date: "October 12, 2024",
    },
    {
        image: "https://picsum.photos/200/300?random=26",
        title: "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit",
        alt: "Image 2",
        date: "October 25, 2024",
    },
    {
        image: "https://picsum.photos/200/300?random=37",
        title: "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit",
        alt: "Image 3",
        date: "November 12, 2024",
    },
]);

const getRandomIcons = () => {
    const shuffledImages = [...images.value].sort(() => 0.5 - Math.random());
    const numberOfIcons = Math.floor(Math.random() * 5) + 1;
    return shuffledImages.slice(0, numberOfIcons);
};
const itemsPerPage = 3;
const currentPage = ref(1);

const totalPages = computed(() => {
    return Math.ceil(items.value.length / itemsPerPage);
});

const paginatedItems = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    console.log("Items:", items.value);  // Debug log
    return items.value.slice(start, start + itemsPerPage);
});

const previousPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
};

const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
    }
};
</script>

<template>
    <Head title="Centered Layout" />
    <div class="flex min-h-screen">
        <div
            class=" md:w-[20vw] m-4"
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
                                :class="isGrayedOut(index)"
                                class="max-w-[8vw] sm:max-w-[5vw] lg:max-w-[3.2vw] h-auto"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-grow mr-[-4vw] h-[80vh] md:h-[100vh]  p-16 rounded-lg">
            <div class="w-[50vw] flex items-center space-x-4">
                <img
                    :src="`/sdg/${randomImage}`"
                    :alt="`Random Image`"
                    :class="blurImageClass"
                    class="max-w-[10vw] h-auto"
                />
                <p class="text-lg text-black">
                    {{ randomDescription }}
                </p>
            </div>
            <div class="overflow-hidden">
        <div class="flex overflow-x-auto">
            <div
                v-for="(item, index) in paginatedItems"
                :key="index"
                class="max-w-[19vw] mt-8 rounded overflow-hidden shadow-lg flex-none"
            >
                <img
                    class="w-full h-48 object-cover p-3"
                    :src="item.image"
                    :alt="item.alt"
                />
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">
                        {{ item.title }}
                    </div>
                </div>
                <div class="px-6 pt-3 pb-5 flex flex-col items-start">
                    <span class="text-gray-700 font-semibold text-sm mr-2">
                        Date: {{ item.date }}
                    </span>
                    <div class="flex flex-wrap gap-2 mt-2">
                        <img
                            v-for="(icon, iconIndex) in getRandomIcons()"
                            :key="iconIndex"
                            :src="`/sdg/${icon}`"
                            alt="SDG Icon"
                            class="w-8 h-8"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-4">
            <button
                @click="previousPage"
                :disabled="currentPage === 1"
                class="px-4 py-2 bg-blue-500 text-white rounded-l"
            >
                Previous
            </button>
            <span class="px-4 py-2">
                Page {{ currentPage }} of {{ totalPages }}
            </span>
            <button
                @click="nextPage"
                :disabled="currentPage === totalPages"
                class="px-4 py-2 bg-blue-500 text-white rounded-r"
            >
                Next
            </button>
        </div>
    </div>
        </div>
    </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css?family=Oswald:400,700");

.body_page {
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
