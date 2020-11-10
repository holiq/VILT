<template>
    <AppLayout>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <div class="bg-white p-4 my-4">
            <div class="text-2xl font-medium">Welcome</div>
        </div>
    </AppLayout>
</template>

<script>
import { Inertia } from '@inertiajs/inertia'
import AppLayout from '@/Layouts/AppLayout'

export default {
    components: {
        AppLayout,
    },
    props: {
        errors: Object,
        status: String,
        user: String,
    },
    data() {
        return {
            form: {
            },
        };
    },
    methods: {
        
    },
    metaInfo: {
        title: 'Home',
    },
};
</script>
