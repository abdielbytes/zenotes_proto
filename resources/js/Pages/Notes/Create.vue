<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue'; // Ensure you have this component
import { useForm, Head } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    note: '',
});
</script>

<template>
    <Head title="Notes" />

    <AppLayout title="Create Note">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('notes.store'), { onSuccess: () => form.reset() })">
                <div class="relative mb-4">
                    <input 
                        v-model="form.title" 
                        placeholder="Note Title" 
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm p-2 mb-4 text-lg"
                        type="text"
                    />
                    <InputError :message="form.errors.title" class="mt-2" />
                </div>
                <div class="relative">
                    <textarea
                        v-model="form.note"
                        placeholder="Your note goes here"
                        class="block w-[21cm] h-[29.7cm] border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm resize-none overflow-auto p-4"
                        style="min-width: 21cm; min-height: 29.7cm;"
                    ></textarea>
                    <InputError :message="form.errors.note" class="mt-2" />
                </div>
                <PrimaryButton class="mt-4">Save</PrimaryButton>
            </form>
        </div>
    </AppLayout>
</template>

<style scoped>
textarea {
    box-sizing: border-box; /* Ensure padding and border are included in the element's total width and height */
}
input {
    border: 1px solid #d1d5db; /* Light gray border */
    padding: 10px; /* Add padding to make it look cleaner */
    font-size: 16px; /* Set font size */
}
</style>
