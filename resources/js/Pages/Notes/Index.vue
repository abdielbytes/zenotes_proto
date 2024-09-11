<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

const form = useForm({
    message: '',
});
</script>

<template>
    <Head title="Notes" />

    <AppLayout title="Create Note">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('notes.store'), { onSuccess: () => form.reset() })">
                <div class="relative">
                    <textarea
                        v-model="form.message"
                        placeholder="Your note goes here"
                        class="block w-[21cm] h-[29.7cm] border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm resize-none overflow-auto"
                        style="min-width: 21cm; min-height: 29.7cm;"
                    ></textarea>
                    <InputError :message="form.errors.message" class="mt-2" />
                </div>
                <PrimaryButton class="mt-4">Save</PrimaryButton>
            </form>
        </div>
    </AppLayout>
</template>

<style scoped>
/* Add any component-specific styles here */
textarea {
    box-sizing: border-box; /* Ensure padding and border are included in the element's total width and height */
}
</style>
