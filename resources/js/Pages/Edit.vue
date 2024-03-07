<template>
    <div class="container mx-auto pt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    Update Post
                </h4>
            <Link :href="`/posts`" class="btn btn-sm btn-primary text-center">Back</Link>
            </div>
            <div class="card-body">
                <form @submit.prevent="submit">
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
                        <button class="btn btn-primary" type="submit" :disabled="form.processing">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import { onMounted } from "vue";
import { router } from '@inertiajs/vue3'


 const props = defineProps({
    post: Array
});

const form = useForm({
    title: '',
    author: '',
    content: '',
})
function submit() {
  router.put(`/posts/${props.post.id}`, form)
}
onMounted(() => {
  form.title = props.post.title;
  form.author = props.post.author;
  form.content = props.post.content;

});

</script>
