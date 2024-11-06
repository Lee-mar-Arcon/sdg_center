


<script setup>
import { onMounted, ref, watch } from "vue";
import { useForm } from '@inertiajs/vue3';
import IndicatorForm from "../../../Components/Indicator/IndicatorForm.vue";
import { Head, router } from '@inertiajs/vue3'

const props = defineProps({
    sdgs: {
        required: true,
        type: Object
    },
    metrics: {
        required: false,
        type: Object
    },
    indicators: {
        required: true,
        type: Object
    }
});

const confirmationIsOpen = ref(false)
const isOpen = ref(false);
const addingIndicator = ref(false);
const form = useForm({
    id: null,
    sdg_id: null,
    metric_id: null,
    evidence_1: null,
    evidence_2: null,
    indicator: null,
});

const deleteForm = useForm({id: null})

function toggleCanvas(isAdding, indicator = null) {
    isOpen.value = !isOpen.value;
    addingIndicator.value = isAdding;
    form.reset();
    form.clearErrors();
    if (!isAdding){
        form.sub_category = indicator.sub_category
        form.sdg_id = indicator.sdg_id
        form.id = indicator.id
    }
}

function handleSubmit() {
    // if(addingIndicator.value)
    //     form.post(route('admin.metric.store'), {
    //         onSuccess: () => {
    //             toggleCanvas(false);
    //             form.reset();
    //         },
    //         preserveScroll: true
    //     });
    // else {
    //     form.put(route('admin.metric.update', {metric: form.id}), {
    //         _method: 'put',
    //         onSuccess: () => {
    //             toggleCanvas(false);
    //             form.reset();
    //         },
    //         preserveScroll: true
    //     });
    // }
}
function handleDelete(id) {
    deleteForm.delete(route('admin.metric.destroy', {metric: id}), {
        onSuccess: () => {
            deleteForm.reset();
            confirmationIsOpen.value = false
        },
        preserveScroll: true
    });
}

function handleCancel() {
    toggleCanvas(false);
}

onMounted(()=> {
    Object.keys(route().params).forEach(key => form[key] = route().params[key])
    console.log(form)
})

function updateMetrics() {
    router.visit(route(route().current(), {sdg_id: form.sdg_id}), {
        only: ['metrics'],
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
            form.metric_id = null
        }
    })
}
</script>

<template>
    <div class="w-screen p-4">
        <Head title="SDGs" />
        <div class="mx-auto w-full">
            <IndicatorForm 
                @updateMetrics="updateMetrics"
                :isOpen="isOpen" 
                :sdgs="props.sdgs"
                :form="form" 
                :metrics="props.metrics"
                :addingIndicator="addingIndicator" 
                @submit="handleSubmit" 
                @cancel="handleCancel" 
            />
        </div>
    </div>
    <div class="w-screen p-4">
        <Head title="SDGs" />
        <div class="mx-auto w-full">
            <div class="w-full flex justify-between items-center mb-3 mt-12 pl-3">
                <div class="flex gap-x-3">
                    <div class="relative min-w-[200px]">
                        <select
                            class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded pl-3 pr-8 py-1.5 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md appearance-none cursor-pointer">
                            <option v-for="sdg in props.sdgs" :key="sdg.id" :value="sdg.id">{{ sdg.name }}</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="h-5 w-5 ml-1 absolute top-2 right-2.5 text-slate-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800">Sustainable Development Goal Indicators</h3>
                </div>
                <div class="w-full max-w-sm min-w-[200px]">      
                </div>
                <div class="relative">
                    <button @click="toggleCanvas(true)" class="bg-blue-500 h-min text-white px-4 py-2 rounded mb-4">
                        Add new indicator
                    </button>  
                </div>
            </div>
            <div class="relative flex flex-col w-full h-full overflow-y-auto text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
                <table class="w-auto text-left table-auto">
                    <thead>
                        <tr class="border-b border-slate-300 bg-slate-50">
                            <th class="p-4 text-sm font-normal leading-none text-slate-500">Indicator</th>
                            <th class="p-4 text-sm font-normal leading-none text-slate-500">Applied</th>
                            <th class="p-4 text-sm font-normal leading-none text-slate-500">Evidence 1</th>
                            <th class="p-4 text-sm font-normal leading-none text-slate-500">Evidence 2</th>
                            <th class="p-4 text-sm font-normal text-center w-48 leading-none text-slate-500">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="indicator in props.indicators" :key="indicator.id" class="hover:bg-slate-50">
                            {{ indicator }}
                            <td class="p-4 border-b border-slate-200 py-5 min-w-[17vw]">
                                <p class="block font-semibold text-sm text-slate-800">{{ indicator.sub_category }}</p>
                            </td>
                            <td class="p-4 border-b border-slate-200 py-5">
                                <div class="flex justify-center gap-x-2">
                                    <button @click="toggleCanvas(false, indicator)" class="bg-cyan-400 p-2 rounded-md shadow-sm text-cyan-50"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M10 15q-.425 0-.712-.288T9 14v-2.425q0-.4.15-.763t.425-.637l8.6-8.6q.3-.3.675-.45t.75-.15q.4 0 .763.15t.662.45L22.425 3q.275.3.425.663T23 4.4t-.137.738t-.438.662l-8.6 8.6q-.275.275-.637.438t-.763.162zm9.6-9.2l1.425-1.4l-1.4-1.4L18.2 4.4zM5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h6.5q.35 0 .575.175t.35.45t.087.55t-.287.525l-4.65 4.65q-.275.275-.425.638T7 10.75V15q0 .825.588 1.412T9 17h4.225q.4 0 .763-.15t.637-.425L19.3 11.75q.25-.25.525-.288t.55.088t.45.35t.175.575V19q0 .825-.587 1.413T19 21z"/></svg></button>
                                    <button @click="()=>{confirmationIsOpen = true, deleteForm.id = indicator.id}" class="bg-red-400 p-2 rounded-md shadow-sm text-red-50"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9 3h6v1h5v2h-1v4.3q-.425-.125-.987-.213T17 10t-1.012.075t-.988.2V8h-2v3.25q-.55.4-1.1.987T11 13.4V8H9v9h1q0 .975.35 2.088t.9 1.912H7q-.825 0-1.412-.587T5 19V6H4V4h5zm8 9q2.075 0 3.538 1.463T22 17t-1.463 3.538T17 22t-3.537-1.463T12 17t1.463-3.537T17 12m-.5 2v3.2l2.15 2.15l.7-.7l-1.85-1.85V14z"/></svg></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div v-if="confirmationIsOpen" :class="['fixed top-0 left-0 right-0 bottom-0 bg- bg-black bg-opacity-50']">
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="bg-white rounded-lg overflow-hidden shadow-lg z-10 w-11/12 md:w-1/3">
            <div class="p-5">
                <h2 class="text-lg font-bold mb-4">Confirm Deletion</h2>
                <p class="text-gray-700 mb-6">Are you sure you want to delete this item? This action cannot be undone!</p>
                <div class="flex justify-end space-x-4">
                <button @click="()=>{confirmationIsOpen = false}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Cancel</button>
                <button :disabled="deleteForm.processing" @click="handleDelete(deleteForm.id)" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>
