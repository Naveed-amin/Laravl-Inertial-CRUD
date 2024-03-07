<template>
<div class="container mx-auto pt-5">

        <h4>{{ post.title }}</h4>
        <p>{{ post.author }}</p>
        <hr>
        <p>{{ post.content }}</p>
        <Link  :href="`/posts`">Home</Link>
</div>
</template>


<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    post: Array
});


</script>
