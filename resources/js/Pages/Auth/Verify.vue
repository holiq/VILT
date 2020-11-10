<template>
    <AuthenticationCard>
        <div class="mb-4 text-sm text-gray-600">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>
        <div class="mt-4 flex items-center justify-between">
            <form class="inline" @submit.prevent="submit">
                <Button>click here to request another</Button>.
            </form>
            <form class="inline" @submit.prevent="logout">
                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Logout
                </button>
            </form>
        </div>
    </AuthenticationCard>
</div>
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
        status: String,
    },
    methods: {
        logout() {
            axios.post(route('logout')).then(response => {
                window.location.href = "/";
            });
        },
        submit() {
            Inertia.post(route('verification.resend'), this.form, {
                preserveScroll: true,
                onProgress: (form) => {
                    document.querySelector('Button').classList.add('cursor-not-allowed', 'opacity-25');
                },
                onFinish: (form) => {
                    document.querySelector('Button').classList.remove('cursor-not-allowed', 'opacity-25');
                },
            });
        }
    },
    metaInfo: {
        title: 'Email Verification',
    },
};
</script>
