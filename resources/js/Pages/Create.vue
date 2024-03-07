<template>
    <div class="container mx-auto pt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    Create New Post
                </h4>
            <Link :href="`/posts`" class="btn btn-sm btn-primary text-center">Back</Link>
            </div>
            <div class="card-body">
                <form @submit.prevent="form.post('/posts')">
                    <div class="form-group">
                        <label for="post__title">Post Title</label>
                        <input class="form-control" type="text" v-model="form.title">
                        <div class="text text-danger" v-if="form.errors.title">{{ form.errors.title }}</div>
                    </div>
                    <div class="form-group">
                        <label for="post__author">Post Author</label>
                        <input class="form-control" type="text" v-model="form.author">
                        <div class="text text-danger" v-if="form.errors.author">{{ form.errors.author }}</div>
                    </div>
                    <div class="form-group">
                        <label for="post__content">Post Content</label>
                        <textarea class="form-control" type="text" v-model="form.content"></textarea>
                        <div class="text text-danger" v-if="form.errors.content">{{ form.errors.content }}</div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary" type="submit" :disabled="form.processing">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    title: '',
    author: '',
    content: '',
})

</script>
