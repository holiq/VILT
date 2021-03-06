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
            <div class="mb-4">
                <Label for="password-confirm" value="Confirm Password"/>
                <Input type="password" id="password" v-model="form.password_confirmation" class="mt-password-confirm block w-full"/>
            </div>
            <div class="flex items-center justify-end mt-4">
                <Button>
                    Reset Password
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
        token: {
            type: String,
            required: true,
        },
        email: {
            type: String,
            default() {
                return '';
            },
        },
    },
    data() {
        return {
            form: {
                email: this.email,
                token: this.token,
                password: '',
                password_confirmation: '',
            },
        };
    },
    methods: {
        submit() {
            Inertia.post(route('password.update'), this.form, {
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
        title: 'Reset Password',
    },
};
</script>
