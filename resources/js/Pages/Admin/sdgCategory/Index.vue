<template>
    <AdminLayout>   <!-- sidebar -->
        <div>
            <div class="flex justify-between">
                <p class="text-xl">List of SDG</p>
                <Link href="/admin/sdg/create" class="mr-5">
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
                    <tr v-for="sdg in sdgCategories" :key="sdg.id">
                        <td >{{ sdg.id }}</td>
                        <td >{{ sdg.name }}</td>
                        <td class="text-sm text-white font-light px-6 py-4 flex gap-0">
                            <Link :href="`/admin/sdg/${sdg.id}/edit`" class="p-1 w-1/4 rounded-full bg-blue-400 hover:bg-blue-900 text-center">
                                Edit
                            </Link>
                            <button
                                @click.prevent="confirmDelete(sdg.id)"
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
    sdgCategories: Array,
});

function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this item?")) {
        deleteSdg(id);
    }
}

function deleteSdg(id) {
    router.delete(`/admin/sdg/${id}`, {
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
