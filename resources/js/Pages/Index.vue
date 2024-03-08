<template>
<div class="container mx-auto pt-5">
   <div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>Posts</h4>
       <div>
        <Link  :href="`register`" class="text text-primary"> Create New User+</Link> |
        <Link  :href="`posts/create`" class="text text-success"> Create New+</Link>
       </div>
    </div>
    <div class="card-body">
        <div class="post__block" v-for="post in posts" :key="post.id">
        <h4>{{ post.title }}</h4>
        <p>{{ post.author }}</p>
        <Link  :href="`posts/${post.id}`"> Read More</Link> |
        <Link  :href="`posts/${post.id}/edit`"> Edit</Link> |
        <Link  :href="`posts/${post.id}`" method="delete" class="text text-danger">Delete</Link>
        <hr>
    </div>
    </div>
   </div>
</div>

</template>


<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    posts: Array
});


</script>
