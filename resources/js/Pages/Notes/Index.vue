<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

// Props to receive notes data from the backend
const props = defineProps(['notes']);
const isLoading = ref(false);

// Function to reload notes (optional)
const reloadNotes = async () => {
    isLoading.value = true;
    try {
        // Logic to fetch notes again, if needed
        await $inertia.get('/notes');
    } finally {
        isLoading.value = false;
    }
};
</script>

<template>
    <Head title="Notes" />

    <AppLayout title="My Notes">
        <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
      

            <!-- Loading Message -->
            <div v-if="isLoading" class="text-center py-4">Loading notes...</div>

            <!-- Notes List -->
            <div v-else class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
                <Link
                    v-for="(note, index) in notes"
                    :key="index"
                    :href="`/notes/${note.id}`" 
                    class="note-card bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow duration-300 cursor-pointer"
                >
                    <h3 class="text-lg font-semibold text-gray-800">{{ note.title }}</h3>
                </Link>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.note-card {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 20px;
}

.note-card:hover {
    background-color: #f0f0f0; /* Optional hover effect */
}
</style>
