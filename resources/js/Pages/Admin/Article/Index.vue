<template>
<AdminLayout>   <!--    sidebar-->
    <div>
        <div class="flex justify-between">
            <p class="text-xl">List of Articles</p>
            <button class="mr-5 button-primary"><a href="create">Add New Article</a></button>
        </div>
        <div class="mt-4">
            <table class="min-w-full">
                <thead class="bg-gray-200">
                <tr>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">#</th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Title</th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Category</th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Short Description</th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Content</th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Author</th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Event Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr
                    v-for="article in articles"
                    :key="articles.id"
                >
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ article.id}}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ article.title }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ article.category_id }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ article.short_description}}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ article.content}}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ article.author }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ article.event_date}}</td>
                    <td class="text-sm text-white font-light px-6  flex gap-0">
                        <button href="#" class="p-1   rounded-full bg-blue-400 hover:bg-blue-900">Edit</button>
                        <button href="#" class="p-1  rounded-full bg-red-400 hover:bg-red-900">Delete</button>
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
import { defineProps } from 'vue'

const props = defineProps({
    articles: Array,
})
</script>

<style scoped>

</style>
