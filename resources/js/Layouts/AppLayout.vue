<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <div class="flex justify-between max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
               <span>Navbar</span> 
               <form @submit.prevent="logout">
                   <button type="submit">
                       Logout
                   </button>
               </form>
            </div>
        </nav>
        <main>
            <slot></slot>
        </main>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia'
    export default {
        methods: {
            logout() {
                axios.post(route('logout')).then(response => {
                    window.location.href = "/";
                });
            },
        }
    }
</script>
