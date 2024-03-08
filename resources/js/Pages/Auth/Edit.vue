<template>
    <div class="container mx-auto pt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    Update User
                </h4>
            <Link :href="`/posts`" class="btn btn-sm btn-primary text-center">Back</Link>
            </div>
            <div class="card-body">
                <form @submit.prevent="submit">
                    <div class="form-group">
                        <label for="post__name">Name</label>
                        <input class="form-control" type="text" v-model="form.name">
                        <div class="text text-danger" v-if="form.errors.name">{{ form.errors.name }}</div>
                    </div>
                    <div class="form-group">
                        <label for="post__email">Email</label>
                        <input class="form-control" type="email" v-model="form.email">
                        <div class="text text-danger" v-if="form.errors.email">{{ form.errors.email }}</div>
                    </div>
                    <div class="form-group">
                        <label for="post__content">Password</label>
                        <input class="form-control" type="text" v-model="form.password"></input>
                        <div class="text text-danger" v-if="form.errors.password">{{ form.errors.password }}</div>
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
    user: Array
});

const form = useForm({
    name: '',
    email: '',
    password: '',
})
function submit() {
  router.put(`/auth/user/${props.user.id}`, form)
}
onMounted(() => {
  form.name = props.user.name;
  form.email = props.user.email;
  form.password = props.user.password;

});

</script>
