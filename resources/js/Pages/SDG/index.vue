<template>
    <div>
        <!-- Conditionally render the article component based on articleId -->
        <component :is="getArticleComponent(articleId)" />
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import Article1 from './article1.vue';
import Article2 from './article2.vue';
import Article3 from './article3.vue';
import Article4 from './article4.vue';
// Import other articles as needed

const props = defineProps({
    articleId: String,
});

// Mapping articleId to components
const articleComponents = {
    '1': Article1,
    '2': Article2,
    '3': Article3,
    '4': Article4,
    // Add other articles as needed
};

// Function to retrieve the article component based on articleId
const getArticleComponent = (id) => {
    return articleComponents[id] || null; // Return null if articleId is not found
};
</script>
