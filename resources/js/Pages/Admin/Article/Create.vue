<template>
    <AdminLayout>
        <div class="flex flex-col items-center">
            <form @submit.prevent="createArticle">
                <div class="space-y-12">
                    <h2 class="text-xl/7 font-semibold text-gray-900">Add New Article</h2>

                    <!-- Featured Photo Upload -->
                    <div class="col-span-full mt-2">
                        <label class="block text-gray-900">Featured Photo</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <input type="file" id="file-upload" @change="handleFileUpload" class="sr-only" />
                            <label for="file-upload" class="cursor-pointer text-indigo-600 hover:text-indigo-500">
                                <span>Upload image</span>
                            </label>
                        </div>
                        <p class="text-xs text-gray-600">PNG, JPG, GIF up to 10MB</p>
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-gray-900">Title</label>
                        <input type="text" v-model="article.title" class="block w-full py-1.5" placeholder="Enter new title" />
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="short_description" class="block text-gray-900">Description</label>
                        <input type="text" v-model="article.short_description" class="block w-full py-1.5" placeholder="Enter short description" />
                    </div>

                    <!-- Category Dropdown -->
                    <div>
                        <label for="category" class="block text-gray-900">Category</label>
                        <select v-model="article.category_id" class="block w-full py-1.5">
                            <option v-for="category in articleCategories" :key="category.id" :value="category.id">{{ category.name }}</option>
                        </select>
                    </div>

                    <!-- SDG Category Checkboxes -->
                    <div>
                        <label class="font-semibold text-gray-900">SDG Category</label>
                        <div class="mt-6 grid gap-4">
                            <div v-for="goal in sdgCategories" :key="goal.id" class="flex items-center">
                                <input type="checkbox" :value="goal.id" v-model="selectedSDGs" class="h-4 w-4" />
                                <label class="ml-2 text-gray-900">{{ goal.name }}</label>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-gray-900">Content</label>
                        <textarea v-model="article.content" rows="3" class="block w-full py-1.5" placeholder="Enter content"></textarea>
                    </div>

                    <!-- Event Date -->
                    <div>
                        <label>Event Date</label>
                        <el-date-picker v-model="article.event_date" type="datetime" placeholder="Select date and time" :default-time="defaultTime" />
                    </div>

                    <!-- Author -->
                    <div>
                        <label for="author" class="block text-gray-900">Author</label>
                        <input type="text" v-model="article.author" class="block w-full py-1.5" placeholder="Enter author" />
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" @click="cancel" class="font-semibold text-gray-900">Cancel</button>
                        <button type="submit" class="bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Components/AdminLayout.vue";
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const article = ref({
    title: '',
    category_id: '',
    short_description: '',
    content: '',
    author: '',
    event_date: ''
});
const selectedSDGs = ref([]);
const articleCategories = ref([]);
const sdgCategories = ref([]);
const file = ref(null);
const defaultTime = new Date(2000, 1, 1, 12, 0, 0);

// Load categories on component mount
onMounted(async () => {
    try {
        const [articleCategoryResponse, sdgCategoryResponse] = await Promise.all([
            axios.get('/api/article-categories'),
            axios.get('/api/sdg-categories')
        ]);
        articleCategories.value = articleCategoryResponse.data;
        sdgCategories.value = sdgCategoryResponse.data;
    } catch (error) {
        console.error("Error loading categories:", error);
    }
});

// Handle file selection
const handleFileUpload = (event) => {
    file.value = event.target.files[0];
};

// Cancel action
const cancel = () => {
    router.push('/articles');
};

// Submit the article form
const createArticle = async () => {
    const formData = new FormData();
    formData.append('title', article.value.title);
    formData.append('category_id', article.value.category_id);
    formData.append('short_description', article.value.short_description);
    formData.append('content', article.value.content);
    formData.append('author', article.value.author);
    formData.append('event_date', article.value.event_date);

    // Attach selected SDG categories
    selectedSDGs.value.forEach((sdgId, index) => {
        formData.append(`sdg_categories[${index}]`, sdgId);
    });

    // Attach the photo file, if available
    if (file.value) {
        formData.append('photo', file.value);
    }

    try {
        await axios.post('/api/articles', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });
        router.push('/articles');
    } catch (error) {
        console.error("Error creating article:", error);
    }
};
</script>

<style scoped>
/* Add any scoped styles here */
</style>
