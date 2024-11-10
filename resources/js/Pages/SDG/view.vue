<template>
    <Header></Header>
    <div class="max-w-screen min-h-screen p-10 pt-[180px]">
        <div class="grid grid-cols-12 grid-flow-row">
            <div class="col-span-2 p-1 flex flex-col">

                <img src="../../../../public/sdg/02.png" class="p-2 mb-5 aspect-square l  max-w-[200px] max-h-[200px] ml-[50px]" alt="">
<!--                <h1 class="mb-5">IMAGES</h1>-->
<!--                <article v-for="i in [1,2,3,3,3]" :key="i" class="mb-5">-->
<!--                    <img src="../../../../public/sdg/02.png" class="aspect-video object-cover w-full max-w-full" alt="">-->
<!--                    <div class="line-clamp-1 text-start italic">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium labore minus cumque! Nobis, deleniti est sit placeat voluptates ab fugiat asperiores voluptatibus aspernatur voluptatem vero! Illo maxime ex a quos!</div>-->
<!--                </article>-->
            </div>


            <div class="col-span-8 p-10 mr-[50px]" v-for="(item, index) in items"
                 :key="index" style="border-width: thin">
                <Link href="/news">
                    <div class="flex justify-end mb-5  mt-[-40px] mr-[-40px]">
                        <button class="text-red-500 hover:text-red-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </Link>


                <div class="w-full"
                >
                    <img  class="aspect-video object-cover w-full mx-auto max-w-screen-lg max-h-[400px]"
                          :src="item.image"
                          :alt="item.alt">
                </div>

                <h1 class="text-3xl pt-5 text-justify">{{item.title}}</h1>
                <div class="">
                    <div class="font-bold text-l mt-2">
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
                <p class="italic pt-2">Jane Doe - July 26, 1999</p>

                <article class="text-justify indent-10 pt-5">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod animi esse illum assumenda consequuntur modi perferendis eum adipisci, distinctio aspernatur mollitia voluptate eius voluptates! Deserunt alias doloremque fugit eius recusandae.
                </article>
                <div class="pt-8 flex items-end gap-x-3">
                    <span class="pe-2">Share:</span>

                    <!-- Facebook Icon -->
                    <svg @click="shareOnFacebook" xmlns="http://www.w3.org/2000/svg" class="h-8 cursor-pointer" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 509 509">
                        <g fill-rule="nonzero">
                            <path fill="#0866FF" d="M509 254.5C509 113.94 395.06 0 254.5 0S0 113.94 0 254.5C0 373.86 82.17 474 193.02 501.51V332.27h-52.48V254.5h52.48v-33.51c0-86.63 39.2-126.78 124.24-126.78 16.13 0 43.95 3.17 55.33 6.33v70.5c-6.01-.63-16.44-.95-29.4-.95-41.73 0-57.86 15.81-57.86 56.91v27.5h83.13l-14.28 77.77h-68.85v174.87C411.35 491.92 509 384.62 509 254.5z"/>
                            <path fill="#fff" d="M354.18 332.27l14.28-77.77h-83.13V227c0-41.1 16.13-56.91 57.86-56.91 12.96 0 23.39.32 29.4.95v-70.5c-11.38-3.16-39.2-6.33-55.33-6.33-85.04 0-124.24 40.16-124.24 126.78v33.51h-52.48v77.77h52.48v169.24c19.69 4.88 40.28 7.49 61.48 7.49 10.44 0 20.72-.64 30.83-1.86V332.27h68.85z"/>
                        </g>
                    </svg>

                    <!-- Twitter Icon -->
                    <svg @click="shareOnTwitter" class="h-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 509.64">
                        <rect width="512" height="509.64" rx="115.61" ry="115.61"/>
                        <path fill="#fff" fill-rule="nonzero" d="M323.74 148.35h36.12l-78.91 90.2 92.83 122.73h-72.69l-56.93-74.43-65.15 74.43h-36.14l84.4-96.47-89.05-116.46h74.53l51.46 68.04 59.53-68.04zm-12.68 191.31h20.02l-129.2-170.82H180.4l130.66 170.82z"/>
                    </svg>

                </div>
            </div>


            <div class="col-span-2 p-1 flex flex-col max-h-[500px] overflow-y-auto pt-[50px] ml-[-30px]">
                <h1 class="mb-5 font-bold">OTHER STORIES</h1>
                <article v-for="i in [1,2,3,3,3]" :key="i" class="flex pb-2">
                    <img src="../../../../public/sdg/02.png" class="object-cover aspect-square max-h-[80px] max-w-full" alt="">
                    <div class="ps-2">
                        <h4>Title</h4>
                        <p class="italic line-clamp-3 text-justify text-sm whitespace-normal">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates nisi illum provident alias doloremque enim accusantium culpa temporibus praesentium laborum! Itaque odit eaque quaerat totam placeat, dolor magnam minima sapiente?</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <Footer></Footer>
</template>

<script setup>
import Header from "@/Pages/Header.vue";
import Footer from "@/Pages/Footer.vue";
import { Head, Link } from "@inertiajs/vue3";

const items = [
    {
        image: "https://picsum.photos/200/300?random=1",
        title: "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit",
        category: "Administration",
        alt: "Image 1",
        date: "October 21, 2024",
    },

];
function shareOnFacebook() {
    const url = window.location.href;
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`, '_blank');
}

function shareOnTwitter() {
    const url = window.location.href;
    const text = "Check out this content!";
    window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`, '_blank');
}

</script>
