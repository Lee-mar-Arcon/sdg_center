<template>
    <AdminLayout>   <!-- sidebar -->
        <div>
            <div class="flex justify-between">
                <p class="text-xl">List of Articles</p>
                <button to="create" class="mr-5 button-primary">
                    Add New Article
                </button>
            </div>
            <div class="mt-4">
                <table class="min-w-full">
                    <thead class="bg-gray-200">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">#</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Name</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="sdg in sdgCategories" :key="sdg.id">
                        <td >{{ sdg.id }}</td>
                        <td >{{ sdg.name }}</td>
                        <td class="text-sm text-white font-light px-6 py-4 flex gap-0">
                            <button href="#" class="p-1 w-1/4 rounded-full bg-blue-400 hover:bg-blue-900">Edit</button>
                            <button href="#" class="p-1 w-1/4 rounded-full bg-red-400 hover:bg-red-900">Delete</button>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Components/AdminLayout.vue";
import { defineProps } from 'vue';

const props = defineProps({
    sdgCategories: Array,
});

function editSdg(id) {
    // Handle edit action
    console.log('Edit', id);
}

function deleteSdg(id) {
    // Handle delete action
    console.log('Delete', id);
}
</script>

<style scoped>
/* Your styles here */
</style>
