<script setup>
import { defineEmits, ref, watch } from "vue";

const props = defineProps({
    isOpen: {
        type: Boolean,
        default: false,
    },
    addingMetric: {
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
    }
});

const emit = defineEmits(["submit", "cancel"]);

</script>

<template>
    <div :class="{'translate-x-0': props.isOpen, 'translate-x-full': !props.isOpen}" class="fixed scrollbar-none overflow-y-auto right-0 top-0 bg-white transition-all duration-300 bottom-0 min-w-[350px] max-w-[350px] z-50 shadow-xl p-3">
        <div class="flex justify-between w-full p-2">
            <div class="font-bold text-slate-600">{{ props.addingMetric ? 'ADD NEW METRIC' : 'UPDATE METRIC' }}</div>
            <svg class="cursor-pointer" @click="emit('cancel')" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m8.382 17.025l-1.407-1.4L10.593 12L6.975 8.4L8.382 7L12 10.615L15.593 7L17 8.4L13.382 12L17 15.625l-1.407 1.4L12 13.41z"/></svg>
        </div>
        <form class="grid grid-cols-1 gap-y-4 pt-2 w-max-full" @submit.prevent="emit('submit')">
            <!-- sub category -->
            <div class="w-full">
                <p class="text-sm font-extrabold text-slate-800 ps-1 pb-1">Sub Category:</p>
                <input type="text" class="w-full" v-model="props.form.sub_category" placeholder="Sub Category" />
                <p class="text-red-500 text-sm" v-if="props.form.errors.sub_category">{{ props.form.errors.sub_category }}</p>
            </div>
            <!-- sdg id -->
            <div class="w-full">
                <p class="text-sm font-extrabold text-slate-800 ps-1 pb-1">Sub Category:</p>
                <select v-model="props.form.sdg_id">
                    <option v-for="sdg in props.sdgs" :key="sdg.id" :value="sdg.id">{{ sdg.name }}</option>
                </select>
                <p class="text-red-500 text-sm" v-if="props.form.errors.sdg_id">{{ props.form.errors.sdg_id }}</p>
            </div>
            <!-- Submit Button -->
            <button :disabled="props.form.processing" class="bg-blue-500 h-14 text-white py-2 rounded-md" type="submit">Submit</button>
        </form>
    </div>
    <div v-if="props.isOpen" @click="emit('cancel')" class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>
</template>
