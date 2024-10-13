<template>
    <div class="post-create">
        <form @submit.prevent="form.post('/post')" class="form">
            <!-- Name Field -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" v-model="form.name" class="form-input" placeholder="Enter menu name" />
            </div>

            <!-- Description Field -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" v-model="form.description" class="form-textarea"
                    placeholder="Enter description"></textarea>
            </div>

            <!-- Type Field -->
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" id="type" v-model="form.type" class="form-input" placeholder="Enter type" />
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <input type="submit" value="Create New Menu" class="btn btn-submit" />
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3"

const form = useForm({
    name: '',
    description: '',
    type: ''
});
</script>

<style>
.post-create {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

.form-input,
.form-textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box;
}

.form-input:focus,
.form-textarea:focus {
    border-color: #007bff;
    outline: none;
}

.form-textarea {
    height: 100px;
    resize: vertical;
}

.btn-submit {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.btn-submit:hover {
    background-color: #0056b3;
}
</style>
