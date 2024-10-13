<template>
    <div class="container mx-auto pt-5">
        <nav class="mb-4">
            <Link href="/post/create" class="btn btn-primary">Create Menu</Link>
        </nav>

        <div class="post__block">
            <div class="post-card" v-for="post in posts" :key="post.id">
                <h2 class="post-title">{{ post.name }}</h2>
                <p class="post-description">{{ post.description }}</p>
                <Link :href="`/post/${post.id}`" class="link">Read more</Link> |
                <Link :href="`/post/edit/${post.id}`" class="btn btn-warning">Edit menu</Link> |
                <Link :href="`/post/delete/${post.id}`" method="DELETE" class="btn btn-danger">Delete menu</Link>
            </div>
        </div>
    </div>

</template>

<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    posts: Object
});
</script>

<style>
.container {
    max-width: 800px;
    margin: 0 auto;
}

.btn {
    display: inline-block;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    margin-right: 10px;
}

.btn-primary {
    background-color: #007bff;
}

.btn-warning {
    background-color: #ffc107;
}

.btn-danger {
    background-color: #dc3545;
}

.btn:hover {
    opacity: 0.9;
}

.post__block {
    margin-top: 20px;
}

.post-card {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 10px;
}

.post-title {
    font-size: 24px;
    margin-bottom: 10px;
}

.post-description {
    color: #666;
    margin-bottom: 15px;
}

.post-actions {
    display: flex;
    justify-content: space-between;
}
</style>