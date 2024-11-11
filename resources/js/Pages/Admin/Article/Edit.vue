<template>
    <AdminLayout>
        <div class="w-full py-10">
            <h1 class="text-2xl font-semibold">UPDATE ARTICLE</h1>
            <form @submit.prevent="submitForm">
                <!-- TITLE -->
                <div class="w-full min-w-[200px] pt-3">
                    <p class="pb-1 text-lg ps-1 font-semibold">Title</p>
                    <input v-model="form.title" class="w-full placeholder:text-slate-500 text-slate-700 text-lg border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 bg-white hover:border-slate-300 shadow-sm focus:shadow" placeholder="Title">
                    <p class="text-red-500 text-sm" v-if="form.errors.title">{{ form.errors.title }}</p>
                </div>
                <div class="w-full grid grid-cols-1 lg:grid-cols-2">
                    <div>
                        <!-- AUTHOR -->
                        <div class="w-full min-w-[200px] pt-3">
                            <p class="pb-1 text-lg ps-1 font-semibold">Author</p>
                            <input v-model="form.author" class="w-full placeholder:text-slate-500 text-slate-700 text-lg border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 bg-white hover:border-slate-300 shadow-sm focus:shadow" placeholder="Author">
                            <p class="text-red-500 text-sm" v-if="form.errors.author">{{ form.errors.author }}</p>
                        </div>
                    </div>
                    <div>
                        <!-- EVENT DATE -->
                        <div class="w-full min-w-[200px] pt-3">
                            <p class="pb-1 text-lg ps-1 font-semibold">Event Date</p>
                            <input type="date" v-model="form.event_date" class="w-full placeholder:text-slate-500 text-slate-700 text-lg border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 bg-white hover:border-slate-300 shadow-sm focus:shadow" placeholder="Title">
                            <p class="text-red-500 text-sm" v-if="form.errors.event_date">{{ form.errors.event_date }}</p>
                        </div>
                    </div>
                </div>
                <!-- CATEGORIES  -->
                <div class="w-full min-w-[200px] pt-3">
                    <p class="pb-1 text-lg ps-1 font-semibold">Categories</p>
                    <VueSelect
                    v-model="form.categories"
                    :is-multi="true"
                    :options="props.categories"
                    placeholder="Select Categories"
                    />
                    <p class="text-red-500 text-sm" v-if="form.errors.categories">{{ form.errors.categories }}</p>
                </div>
                <!-- SDGS  -->
                <div class="w-full min-w-[200px] pt-3 text-2xl">
                    <p class="pb-1 text-lg ps-1 font-semibold">SDGs:</p>
                    <VueSelect
                    v-model="form.sdgs"
                    :is-multi="true"
                    :options="props.sdgs"
                    placeholder="Select SDGs"
                    />
                    <p class="text-red-500 text-sm" v-if="form.errors.sdgs">{{ form.errors.sdgs }}</p>
                </div>
                <!-- IMAGES  -->
                <div class="w-full min-w-[200px] pt-3 text-2xl">
                    <h2 class="pb-4">Current Image/s</h2>
                    <dv class="flex w-full gap-x-4 justify-center">
                        <img class="h-[200px] aspect-video rounded object-cover shadow-lg border" v-for="link in props.article.images" :key="link" :src="getLink(link)" alt="">
                    </dv>
                    <p class="pb-1 text-lg ps-1 font-semibold">Images:</p>
                    <file-pond ref="filePondRef" v-bind:files="form.images" allow-multiple="true" max-files="10"/>
                    <p class="text-red-500 text-sm" v-if="form.errors.images">{{ form.errors.images }}</p>
                </div>
                <!-- CONTENT  -->
                <div class="w-full min-w-[200px] pt-3 text-lg pb-4">
                    <p class="pb-1 text-lg ps-1 font-semibold">Content:</p>
                    <trumbowyg v-if="isMounted" v-model="form.content" :config="trumbowygConfig" class="form-control" name="content"></trumbowyg>
                    <p class="text-red-500 text-sm" v-if="form.errors.content">{{ form.errors.content }}</p>
                </div>
                <button class="float-right rounded-md bg-blue-600 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-blue-700 focus:shadow-none active:bg-blue-700 hover:bg-blue-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2" type="submit">
                    Submit
                </button>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import vueFilePond from 'vue-filepond';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.esm.js';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.esm.js';
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview);
import AdminLayout from "@/Components/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { onMounted, ref, markRaw } from 'vue';
import VueSelect from "vue3-select-component";
import 'trumbowyg/dist/ui/trumbowyg.css';
import {format} from 'date-fns';

const isMounted = ref(false);
const Trumbowyg = ref(null);
const trumbowygConfig = ref(null);
const filePondRef = ref()
const props = defineProps({
    categories: {
        type: Object,
        required: true
    },
    sdgs: {
        type: Object,
        required: true
    },
    article: {
        type: Object,
        required: true
    },
    articleSDGs: {
        type: Object,
        required: true
    },
    articleCategories: {
        type: Object,
        required: true
    },
});

const form = useForm({
    id: props.article.id,
    categories: props.articleCategories,
    sdgs: props.articleSDGs,
    title: props.article.title,
    author: props.article.author,
    event_date: format(props.article.event_date, 'yyyy-MM-dd'),
    content: props.article.content,
    images: []
});

function submitForm() {
    const files = filePondRef.value.getFiles();
    const imageFiles = files.map(file => file.file);
    form.images = imageFiles;

    form.clearErrors()

    form.post(route('admin.article.update', {article: props.article.id}), {
        _method: "put",
    })
}

onMounted(async () => {
    Trumbowyg.value = markRaw((await import('vue-trumbowyg')).default);
    const { default: indentPlugin } = await import('trumbowyg/plugins/indent/trumbowyg.indent.js');
    const { default: colorsPlugin } = await import('trumbowyg/plugins/colors/trumbowyg.colors.js');
    const { default: emojiPlugin } = await import('trumbowyg/plugins/emoji/trumbowyg.emoji.js');
    const { default: fontsizePlugin } = await import('trumbowyg/plugins/fontsize/trumbowyg.fontsize.js');
    const { default: fontfamilyPlugin } = await import('trumbowyg/plugins/fontfamily/trumbowyg.fontfamily.js');
    trumbowygConfig.value = {
        btns: [
            ['undo', 'redo'],
            ['superscript', 'subscript'],
            ['formatting'],
            ['bold', 'italic', 'underline', 'em', 'fontsize', 'fontfamily'],
            ['emoji'],
            ['link'],
            ['foreColor', 'backColor'],
            ['indent', 'outdent'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull']
        ],
        plugins: {
            indent: indentPlugin,
            colors: colorsPlugin,
            emoji: emojiPlugin,
            fontsize: fontsizePlugin,
            fontfamily: fontfamilyPlugin
        }
    };
    isMounted.value = true;
});

function getLink(link){
    link = `${route().t.url}/storage/${link}`
    return link
}
</script>
