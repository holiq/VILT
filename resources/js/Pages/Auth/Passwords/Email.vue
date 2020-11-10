<template>
    <AuthenticationCard>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <form @submit.prevent="submit">
            <div class="mb-4 text-sm text-gray-600">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</div>
            <div class="mb-4">
                <Label for="email" value="Email"/>
                <Input type="email" id="email" v-model="form.email" class="mt-1 block w-full"/>
                <span v-if="errors.email" class="text-red-500 text-sm font-medium">{{ errors.email[0] }}</span>
            </div>
            <div class="flex items-center justify-end mt-4">
                <Button class="ml-4" >
                    EMAIL PASSWORD RESET LINK
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
        errors: Object,
        status: String,
    },
    data() {
        return {
            form: {
                email: '',
            },
        };
    },
    methods: {
        submit() {
            Inertia.post(route('password.email'), this.form, {
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
        title: 'Forgot Password',
    },
};
</script>
