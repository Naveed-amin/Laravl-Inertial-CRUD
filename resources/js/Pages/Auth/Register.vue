<template>
    <div class="container mx-auto pt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    Register New User
                </h4>
                <Link :href="`/posts`" class="btn btn-sm btn-primary text-center">Back</Link>
            </div>
            <div class="card-body">
                <form @submit.prevent="form.post('/register')">
                    <div class="form-group">
                        <label for="post__title">Name</label>
                        <input class="form-control" type="text" v-model="form.name">
                        <div class="text text-danger" v-if="form.errors.name">{{ form.errors.name }}</div>
                    </div>
                    <div class="form-group">
                        <label for="post__email">Email</label>
                        <input class="form-control" type="email" v-model="form.email">
                        <div class="text text-danger" v-if="form.errors.email">{{ form.errors.email }}</div>
                    </div>
                    <div class="form-group">
                        <label for="post__user_type">User Type</label>
                        <select class="form-select" aria-label="Default select example" v-model="form.user_type">
                            <option selected disabled>Select User Type</option>
                            <option value="1">Admin</option>
                            <option value="2">Auther</option>
                            <option value="3">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="post__content">Password</label>
                        <input class="form-control" type="password" v-model="form.password"></input>
                        <div class="text text-danger" v-if="form.errors.password">{{ form.errors.password }}</div>
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
    name: '',
    email: '',
    user_type: '',
    password: '',
})

</script>
