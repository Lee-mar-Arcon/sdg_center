<template>
    <AdminLayout>
        <div class="mx-auto w-full">
            <div class="flex justify-between">
                <p class="text-xl">List of Category</p>
                <Link href="/admin/category/create" class="mr-5">
                    <button class="button-primary">
                        Add New Article
                    </button>
                </Link>
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
                    <tr v-for="category in categories" :key="categories.id">
                        <td >{{ category.id }}</td>
                        <td >{{ category.name }}</td>
                        <td class="text-sm text-white font-light px-6 py-4 flex gap-0">
                            <Link :href="`/admin/category/${category.id}/edit`" class="p-1 w-1/4 rounded-full bg-blue-400 hover:bg-blue-900 text-center">
                                Edit
                            </Link>
                            <button
                                @click.prevent="confirmDelete(category.id)"
                                class="p-1 w-1/4 rounded-full bg-red-400 hover:bg-red-900 text-center"
                            >
                                Delete
                            </button>
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
import {Link, router} from "@inertiajs/vue3";


const props = defineProps({
    categories: Array,
});

function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this item?")) {
        deleteSdg(id);
    }
}

function deleteSdg(id) {
    router.delete(`/admin/category/${id}`, {
        onSuccess: () => {
            // Optionally reload or redirect
            window.location.reload(); // or Inertia.visit('/admin/sdg');
        },
        onError: (error) => {
            console.error("Error deleting SDG category:", error);
            // Handle or display the error as needed
        }
    });
}
</script>

<style scoped>
/* Your styles here */
</style>
