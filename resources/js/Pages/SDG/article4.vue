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
                            v-for="sdg in [4]"
                            :key="sdg"
                            :src="'/sdg/0' + sdg + '.png'"
                            class="object-cover mx-1 max-h-[40px] aspect-square"
                            alt="SDG Icon"
                        />
                    </div>
                </div>
                <p class="italic pt-2">{{ item.date }}</p>

                <article class="text-justify indent-10 pt-5">
                    Puerto Princesa City, Palawan — Competing with determination, prowess and skills, Mindoro State University (MinSU) clinched 9th place in the overall ranking at the 2024 Southern Tagalog Regional Association of State Universities and Colleges (STRASUC) Olympics. Themed “Unity in Diversity: Celebrating Athletic Excellence,” this year’s event was hosted by Palawan State University (PSU) from October 21 to 25, 2024, in Puerto Princesa City, Palawan.
                    MinSU athletes brought home 24 medals, including 7 gold, 6 silver, and 11 bronze, as follows:
                    Gold Medalists:
                    •	Borris Manalo - Long Jump, Triple Jump
                    •	Mickee Monterey - 400-meter run (Women’s Division)
                    •	Lawrence Dela Cruz - 10,000-meter run (Men’s Division)
                    •	Basketball 3x3 Women’s Team - Cheska Calingasan, Kriezza Arellano, Jea Abetria, Merylle Cuasay
                    •	Beach Volleyball Men’s Team - Allan Magadia, Nico Lusaya
                    Silver Medalists:
                    •	Kurt Luis Alibado - Shot-put (Men’s Division), Javelin Throw (Men’s Division)
                    •	Zaira Baculo - Chess (Women’s Division)
                    •	Borris Manalo - High Jump (Men’s Division)
                    •	Angelica Alcuran - Middleweight Combative Arnis
                    •	Sofia Claor - Cruiserweight Combative Arnis
                    Bronze Medalists:
                    •	Lawrence Dela Cruz - 5,000-meter run (Men’s Division)
                    •	E-Sports Team - John Karl Ragonjan, Marc Andrei Albay Santos, Kier Paolo Pineda, Niño Monsanto, Jayllord Panaligan, Kirk Adison Tolentino
                    •	Mickee Monterey - 100 M Dash (Women)
                    •	Morales Jhanzen - Long Jump
                    •	4x100 Mixed Relay Team - Mickee Monterey, Wen Gomez, Rendel Montero, Jhanzen Reil Morales
                    •	Kcale Castillo - Shot-put (Men’s Division)
                    •	Angelica Folloso - Badminton Singles (Women)
                    •	Jenalyn Rios - Javelin Throw (Women)
                    •	Eurie de Jesus - Heavyweight Combative Arnis
                    •	Bryle Maamo - Lightweight Combative Arnis
                    Palawan State University (PSU) emerged as the overall champion of the event, achieving a total of 123 gold, 91 silver, and 82 bronze medals, followed by Laguna State Polytechnic University with 76 gold, 54 silver, and 39 bronze medals.
                    The annual STRASUC Olympics is a prestigious event among state universities and colleges in Southern Tagalog. It brings together the best athletes from various institutions to compete in various sports discipline, fostering athletic excellence and camaraderie among the participating universities.

                </article>
                <div class="pt-8 flex items-end gap-x-3">
                    <span class="pe-2">Share:</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 509 509"><g fill-rule="nonzero"><path fill="#0866FF" d="M509 254.5C509 113.94 395.06 0 254.5 0S0 113.94 0 254.5C0 373.86 82.17 474 193.02 501.51V332.27h-52.48V254.5h52.48v-33.51c0-86.63 39.2-126.78 124.24-126.78 16.13 0 43.95 3.17 55.33 6.33v70.5c-6.01-.63-16.44-.95-29.4-.95-41.73 0-57.86 15.81-57.86 56.91v27.5h83.13l-14.28 77.77h-68.85v174.87C411.35 491.92 509 384.62 509 254.5z"/><path fill="#fff" d="M354.18 332.27l14.28-77.77h-83.13V227c0-41.1 16.13-56.91 57.86-56.91 12.96 0 23.39.32 29.4.95v-70.5c-11.38-3.16-39.2-6.33-55.33-6.33-85.04 0-124.24 40.16-124.24 126.78v33.51h-52.48v77.77h52.48v169.24c19.69 4.88 40.28 7.49 61.48 7.49 10.44 0 20.72-.64 30.83-1.86V332.27h68.85z"/></g></svg>
                    <svg class="h-8" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 509.64"><rect width="512" height="509.64" rx="115.61" ry="115.61"/><path fill="#fff" fill-rule="nonzero" d="M323.74 148.35h36.12l-78.91 90.2 92.83 122.73h-72.69l-56.93-74.43-65.15 74.43h-36.14l84.4-96.47-89.05-116.46h74.53l51.46 68.04 59.53-68.04zm-12.68 191.31h20.02l-129.2-170.82H180.4l130.66 170.82z"/></svg>
                    <svg class="h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 132.004 132"><defs><linearGradient id="b"><stop offset="0" stop-color="#3771c8"/><stop stop-color="#3771c8" offset=".128"/><stop offset="1" stop-color="#60f" stop-opacity="0"/></linearGradient><linearGradient id="a"><stop offset="0" stop-color="#fd5"/><stop offset=".1" stop-color="#fd5"/><stop offset=".5" stop-color="#ff543e"/><stop offset="1" stop-color="#c837ab"/></linearGradient><radialGradient id="c" cx="158.429" cy="578.088" r="65" xlink:href="#a" gradientUnits="userSpaceOnUse" gradientTransform="matrix(0 -1.98198 1.8439 0 -1031.402 454.004)" fx="158.429" fy="578.088"/><radialGradient id="d" cx="147.694" cy="473.455" r="65" xlink:href="#b" gradientUnits="userSpaceOnUse" gradientTransform="matrix(.17394 .86872 -3.5818 .71718 1648.348 -458.493)" fx="147.694" fy="473.455"/></defs><path fill="url(#c)" d="M65.03 0C37.888 0 29.95.028 28.407.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468C4 13.126 1.5 18.394.595 24.656c-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28 7.79-2.01 14.24-7.29 17.75-14.53 1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624C116.9 4 111.64 1.5 105.372.596 102.335.157 101.73.027 86.19 0H65.03z" transform="translate(1.004 1)"/><path fill="url(#d)" d="M65.03 0C37.888 0 29.95.028 28.407.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468C4 13.126 1.5 18.394.595 24.656c-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28 7.79-2.01 14.24-7.29 17.75-14.53 1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624C116.9 4 111.64 1.5 105.372.596 102.335.157 101.73.027 86.19 0H65.03z" transform="translate(1.004 1)"/><path fill="#fff" d="M66.004 18c-13.036 0-14.672.057-19.792.29-5.11.234-8.598 1.043-11.65 2.23-3.157 1.226-5.835 2.866-8.503 5.535-2.67 2.668-4.31 5.346-5.54 8.502-1.19 3.053-2 6.542-2.23 11.65C18.06 51.327 18 52.964 18 66s.058 14.667.29 19.787c.235 5.11 1.044 8.598 2.23 11.65 1.227 3.157 2.867 5.835 5.536 8.503 2.667 2.67 5.345 4.314 8.5 5.54 3.054 1.187 6.543 1.996 11.652 2.23 5.12.233 6.755.29 19.79.29 13.037 0 14.668-.057 19.788-.29 5.11-.234 8.602-1.043 11.656-2.23 3.156-1.226 5.83-2.87 8.497-5.54 2.67-2.668 4.31-5.346 5.54-8.502 1.18-3.053 1.99-6.542 2.23-11.65.23-5.12.29-6.752.29-19.788 0-13.036-.06-14.672-.29-19.792-.24-5.11-1.05-8.598-2.23-11.65-1.23-3.157-2.87-5.835-5.54-8.503-2.67-2.67-5.34-4.31-8.5-5.535-3.06-1.187-6.55-1.996-11.66-2.23-5.12-.233-6.75-.29-19.79-.29zm-4.306 8.65c1.278-.002 2.704 0 4.306 0 12.816 0 14.335.046 19.396.276 4.68.214 7.22.996 8.912 1.653 2.24.87 3.837 1.91 5.516 3.59 1.68 1.68 2.72 3.28 3.592 5.52.657 1.69 1.44 4.23 1.653 8.91.23 5.06.28 6.58.28 19.39s-.05 14.33-.28 19.39c-.214 4.68-.996 7.22-1.653 8.91-.87 2.24-1.912 3.835-3.592 5.514-1.68 1.68-3.275 2.72-5.516 3.59-1.69.66-4.232 1.44-8.912 1.654-5.06.23-6.58.28-19.396.28-12.817 0-14.336-.05-19.396-.28-4.68-.216-7.22-.998-8.913-1.655-2.24-.87-3.84-1.91-5.52-3.59-1.68-1.68-2.72-3.276-3.592-5.517-.657-1.69-1.44-4.23-1.653-8.91-.23-5.06-.276-6.58-.276-19.398s.046-14.33.276-19.39c.214-4.68.996-7.22 1.653-8.912.87-2.24 1.912-3.84 3.592-5.52 1.68-1.68 3.28-2.72 5.52-3.592 1.692-.66 4.233-1.44 8.913-1.655 4.428-.2 6.144-.26 15.09-.27zm29.928 7.97c-3.18 0-5.76 2.577-5.76 5.758 0 3.18 2.58 5.76 5.76 5.76 3.18 0 5.76-2.58 5.76-5.76 0-3.18-2.58-5.76-5.76-5.76zm-25.622 6.73c-13.613 0-24.65 11.037-24.65 24.65 0 13.613 11.037 24.645 24.65 24.645C79.617 90.645 90.65 79.613 90.65 66S79.616 41.35 66.003 41.35zm0 8.65c8.836 0 16 7.163 16 16 0 8.836-7.164 16-16 16-8.837 0-16-7.164-16-16 0-8.837 7.163-16 16-16z"/></svg>
                </div>
            </div>


            <div class="col-span-2 p-1 flex flex-col max-h-[500px] overflow-y-auto pt-[50px] ml-[-30px]">
                <h1 class="mb-5 font-bold">OTHER STORIES</h1>
                <article v-for="i in [1,2,3,3,3]" :key="i" class="flex pb-2">
                    <img src="../../../../public/sdg/04.png" class="object-cover aspect-square max-h-[80px] max-w-full" alt="">
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
        image: "/article/image4.jpg",
        title: "MinSU Clinches 9th Place at 2024 STRASUC Olympics",
        category: "Students",
        alt: "Image 4",
        date: "October 26, 2024",
    },

];
</script>
