<template>
    <AdminLayout>
        <div class="max-w-lg mx-auto mt-10">
            <h2 class="text-2xl font-bold mb-6">Add New Article Category</h2>
            <form @submit.prevent="submitForm">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input
                        type="text"
                        id="name"
                        v-model="form.name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required
                    />
                </div>
                <button
                    type="submit"
                    class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
                >
                    Save
                </button>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import AdminLayout from "@/Components/AdminLayout.vue";

const form = useForm({
    name: ''
});

function submitForm() {
    form.post(route('Category.store'), {
        onSuccess: () => form.reset(),
    });
}
</script>

<style scoped>
/* Add any styles here */
</style>
