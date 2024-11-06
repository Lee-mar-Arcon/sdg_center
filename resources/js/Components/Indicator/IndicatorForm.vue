<script setup>
import { defineEmits, ref, watch } from "vue";

const props = defineProps({
    isOpen: {
        type: Boolean,
        default: false,
    },
    addingIndicator: {
        type: Boolean,
        default: false,
    },
    form: {
        type: Object,
        required: true,
    },
    sdgs: {
        type: Object,
        required: true
    },
    metrics: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(["submit", "cancel", "updateMetrics"]);

function handleFileInput(event, input) {
    const file = event.target.files[0];
    props.form[input] = file;
}
</script>

<template>
    <div :class="{'translate-x-0': props.isOpen, 'translate-x-full': !props.isOpen}" class="fixed scrollbar-none overflow-y-auto right-0 top-0 bg-white transition-all duration-300 bottom-0 min-w-[650px] z-50 shadow-xl p-3">
        <div class="flex justify-between w-full p-2">
            <div class="font-bold text-slate-600">{{ props.addingIndicator ? 'ADD NEW INDICATOR' : 'UPDATE INDICATOR' }}</div>
            <svg class="cursor-pointer" @click="emit('cancel')" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m8.382 17.025l-1.407-1.4L10.593 12L6.975 8.4L8.382 7L12 10.615L15.593 7L17 8.4L13.382 12L17 15.625l-1.407 1.4L12 13.41z"/></svg>
        </div>
        <form class="grid grid-cols-1 gap-y-4 pt-2 w-max-full" @submit.prevent="emit('submit')">
            <!-- indicator -->
            <div class="w-full">
                <p class="text-sm font-extrabold text-slate-800 ps-1 pb-1">Indicator:</p>
                <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" v-model="props.form.indicator" placeholder="Sub Category" />
                <p class="text-red-500 text-sm" v-if="props.form.errors.indicator">{{ props.form.errors.indicator }}</p>
            </div>
            <!-- applied -->
            <div class="w-full">
                <p class="text-sm font-extrabold text-slate-800 ps-1 pb-1">Applied:</p>
                <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" v-model="props.form.applied" placeholder="Sub Category" />
                <p class="text-red-500 text-sm" v-if="props.form.errors.applied">{{ props.form.errors.applied }}</p>
            </div>
            <!-- sdg -->
            <div class="w-full">
                <p class="text-sm font-extrabold text-slate-800 ps-1 pb-1">SDG:</p>
                <select @change="emit('updateMetrics')" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded pl-3 pr-8 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md appearance-none cursor-pointer" v-model="props.form.sdg_id">
                    <option v-for="sdg in sdgs" :key="sdg.id" :value="sdg.id">{{ sdg.name }}</option>
                </select>
            </div>
            <!-- metric -->
            <div class="w-full">
                <p class="text-sm font-extrabold text-slate-800 ps-1 pb-1">Metric:</p>
                <select :disabled="!form.sdg_id" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded pl-3 pr-8 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md appearance-none cursor-pointer" v-model="props.form.metric_id">
                    <option v-for="metric in metrics" :key="metric.id" :value="metric.id">{{ metric.sub_category }}</option>
                </select>
                <p class="text-red-500 text-sm" v-if="props.form.errors.metric_id">{{ props.form.errors.metric_id }}</p>
            </div>
            <div class="w-full grid grid-cols-2 gap-2">
            <!-- Evidence 1 Input -->
            <div class="w-full col-span-1">
                <p class="text-sm font-extrabold text-slate-800 ps-1 pb-1">Supporting Document 1:</p>
                <div class="w-full">
                    <input accept=".pdf" class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500" type="file" @change="(event) => handleFileInput(event, 'evidence_1')" />
                    <p class="text-red-500 text-sm" v-if="form.errors.evidence_1">{{ form.errors.evidence_1 }}</p>
                </div>
            </div>
            <!-- Evidence 2 Input -->
            <div class="w-full col-span-1">
                <p class="text-sm font-extrabold text-slate-800 ps-1 pb-1">Supporting Document 1:</p>
                <div class="w-full">
                    <input accept=".pdf" class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500" type="file" @change="(event) => handleFileInput(event, 'evidence_2')" />
                    <p class="text-red-500 text-sm" v-if="form.errors.evidence_2">{{ form.errors.evidence_2 }}</p>
                </div>
            </div>
            </div>
            <!-- Submit Button -->
            <button :disabled="props.form.processing" class="bg-blue-500 h-14 text-white py-2 rounded-md" type="submit">Submit</button>
        </form>
    </div>
    <div v-if="props.isOpen" @click="emit('cancel')" class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>
</template>
