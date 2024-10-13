<template>
    <div class="post__content">
        <!-- Post Title -->
        <h1 class="post-title">{{ post.name }}</h1>

        <!-- Post Type -->
        <p class="post-type">{{ post.type }}</p>

        <!-- Post Description -->
        <div class="post-description">
            {{ post.description }}
        </div>
    </div>
</template>

<script setup>
import { defineProps } from "vue";

// Props definition to receive the post data
defineProps({
    post: Object
});
</script>

<style>
.post__content {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.post-title {
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 10px;
}

.post-type {
    font-size: 18px;
    color: #555;
    margin-bottom: 20px;
}

.post-description {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
    white-space: pre-wrap;
}
</style>
