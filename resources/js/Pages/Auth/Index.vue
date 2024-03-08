<template>
    <div class="container mx-auto pt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Posts</h4>
                <div>
                    <Link :href="`register`" class="text text-primary"> Create New User+</Link> |
                    <Link :href="`posts/create`" class="text text-success"> Create New+</Link>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user,index) in users" :key="user.id">
                            <td>{{ index+1 }}</td>
                        <!-- <td>{{ user.id }}</td> -->
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>user type</td>
                        <td>
                            <Link :href="`/auth/user/${user.id}/edit`" class="text text-primary">Edit</Link> |
                            <Link :href="`/auth/user/${user.id}`" method="delete" class="text text-danger">Delete</Link>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</template>


<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    users: Array
});


</script>
