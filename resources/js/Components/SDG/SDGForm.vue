<script setup>
import { defineEmits, ref, watch } from "vue";

const props = defineProps({
    isOpen: {
        type: Boolean,
        default: false,
    },
    addingSDG: {
        type: Boolean,
        default: false,
    },
    form: {
        type: Object,
        required: true,
    }
});

const iconUrl = ref(null);
const imageInputRef = ref(null);
const iconInputRef = ref(null);

const emit = defineEmits(["submit", "cancel"]);

function handleFileInput(event, type) {
    const file = event.target.files[0];
    props.form[type] = file;

    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            if (type === 'image') {
                imageUrl.value = e.target.result;
            } else {
                iconUrl.value = e.target.result;
            }
        };
        reader.readAsDataURL(file);
    }
}

function cleanImagePreview() {
    iconUrl.value = null;
    iconInputRef.value.value = null;
}

watch(() => props.isOpen, (newValue) => {
    
    if (!newValue) {
        cleanImagePreview();
    }
});

</script>

<template>
    <div :class="{'translate-x-0': props.isOpen, 'translate-x-full': !props.isOpen}" class="fixed scrollbar-none overflow-y-auto right-0 top-0 bg-white transition-all duration-300 bottom-0 max-w-[350px] z-50 shadow-xl p-3">
        <div class="flex justify-between w-full p-2">
            <div class="font-bold text-slate-600">{{ props.addingSDG ? 'ADD NEW SDG' : 'UPDATE SDG' }}</div>
            <i @click="emit('cancel')" class="bi bi-x-circle cursor-pointer"></i>
        </div>
        <form class="grid grid-cols-1 gap-y-4 pt-2 h-screen w-max-full" @submit.prevent="emit('submit')">
            <!-- Icon Input -->
            <div class="w-max-full">
                <p class="text-sm font-extrabold text-slate-800 ps-1 pb-1">Icon:</p>
                <div v-if="iconUrl" class="mt-4 w-max-full">
                    <img :src="iconUrl" alt="Selected Image" class="w-full aspect-square object-cover" />
                </div>
                <div v-else class="bg-slate-200 border-dashed border-4 rounded-md border-slate-400 p-2 flex justify-center items-center aspect-square mb-2">
                    <span class="font-bold text-slate-500 text-lg">Icon preview</span>
                </div>
                <div class="w-max">
                    <input  class="w-max-full" type="file" ref="iconInputRef" @change="(event) => handleFileInput(event, 'icon')" />
                    <p class="text-red-500 text-sm" v-if="props.form.errors.icon">{{ props.form.errors.icon }}</p>
                </div>
            </div>
            <!-- name -->
            <div class="w-full">
                <p class="text-sm font-extrabold text-slate-800 ps-1 pb-1">Name:</p>
                <input type="text" class="w-full" v-model="props.form.name" placeholder="Name" />
                <p class="text-red-500 text-sm" v-if="props.form.errors.name">{{ props.form.errors.name }}</p>
            </div>
            <!-- SDG NO -->
            <div class="w-full">
                <p class="text-sm font-extrabold text-slate-800 ps-1 pb-1">SDG No:</p>
                <input type="text" class="w-full" v-model="props.form.sdg_no" placeholder="SDG No" />
                <p class="text-red-500 text-sm" v-if="props.form.errors.sdg_no">{{ props.form.errors.sdg_no }}</p>
            </div>
            <!-- description -->
            <div class="w-full">
                <p class="text-sm font-extrabold text-slate-800 ps-1 pb-1">Description:</p>
                <textarea class="w-full" v-model="props.form.description" placeholder="Description"></textarea>
                <p class="text-red-500 text-sm" v-if="props.form.errors.description">{{ props.form.errors.description }}</p>
            </div>
            <!-- background color -->
            <div class="w-full">
                <p class="text-sm font-extrabold text-slate-800 ps-1 pb-1">Background Color:</p>
                <input type="color" class="w-full min-h-[40px]" v-model="props.form.bg_color" placeholder="bg_color" />
                <p class="text-red-500 text-sm" v-if="props.form.errors.bg_color">{{ props.form.errors.description }}</p>
            </div>
            <!-- Submit Button -->
            <button :disabled="props.form.processing" class="bg-blue-500 text-white py-2 rounded-md" type="submit">Submit</button>
        </form>
    </div>
    <div v-if="props.isOpen" @click="emit('cancel')" class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>
</template>
