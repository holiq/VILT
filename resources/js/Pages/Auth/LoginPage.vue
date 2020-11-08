<template>
    <AuthenticationCard>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <form @submit.prevent="submit">
            <div class="mb-4">
                <Label for="email" value="Email"/>
                <Input type="email" id="email" v-model="form.email" class="mt-1 block w-full"/>
                <span v-if="errors.email" class="text-red-500 text-sm font-medium">{{ errors.email[0] }}</span>
            </div>
            <div class="mb-4">
                <Label for="password" value="Password"/>
                <Input type="password" id="password" v-model="form.password" class="mt-1 block w-full"/>
                <span v-if="errors.password" class="text-red-500 text-sm font-medium">{{ errors.password[0] }}</span>
            </div>
            <div class="block mt-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember" v-model="form.remember">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                <inertia-link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </inertia-link>
                <Button class="ml-4">
                    Login
                </Button>
            </div>
        </form>
    </AuthenticationCard>
</template>

<script>
import { Inertia } from '@inertiajs/inertia'

import AuthenticationCard from '@/Components/AuthenticationCard'
import Button from '@/Components/Button'
import Input from '@/Components/Input'
import InputError from '@/Components/InputError'
import Label from '@/Components/Label'
    
export default {
    components: {
        AuthenticationCard,
        Button,
        Input,
        InputError,
        Label,
    },
    props: {
        canResetPassword: Boolean,
        errors: Object,
        status: String,
    },
    data() {
        return {
            form: {
                email: '',
                password: '',
                remember: false,
            },
        };
    },
    methods: {
        submit() {
            Inertia.post(route('login'), this.form, {
                preserveScroll: true,
                onProgress: (form) => {
                    document.querySelector('Button').classList.add('cursor-not-allowed', 'opacity-25');
                },
                onFinish: (form) => {
                    document.querySelector('Button').classList.remove('cursor-not-allowed', 'opacity-25');
                },
            });
        },
    },
    metaInfo: {
        title: 'Login',
    },
};
</script>
