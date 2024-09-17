<script setup>
import { ref, onMounted } from 'vue';
import { defineEmits } from 'vue';

const recognition = ref(null);
const recognitionStarted = ref(false);
const loaderVisible = ref(false);
const error = ref('');
const interimText = ref('');
const finalText = ref(''); // Store final transcript

// Emit function for sending speech text to the parent component
const emit = defineEmits(['onSpeechResult']);

const handleRecognitionResult = (e) => {
    let final = '';
    let interim = '';

    Array.from(e.results).forEach(result => {
        if (result[0].isFinal) {
            final += result[0].transcript.trim() + ' ';
        } else {
            interim += result[0].transcript;
        }
    });

    interimText.value = interim; // Show interim text while dictating
    finalText.value = final; // Store the final transcript temporarily
};

const startRecognition = () => {
    if (!recognitionStarted.value && recognition.value) {
        recognition.value.start();
        recognitionStarted.value = true;
        loaderVisible.value = true;
        error.value = '';
    }
};

const stopRecognition = () => {
    if (recognitionStarted.value && recognition.value) {
        recognition.value.stop();
        recognitionStarted.value = false;
        loaderVisible.value = false;

        // Emit final transcript when dictation stops
        emit('onSpeechResult', finalText.value);
        finalText.value = ''; // Clear finalText after emitting
    }
};

onMounted(() => {
    window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    if (window.SpeechRecognition) {
        recognition.value = new SpeechRecognition();
        recognition.value.interimResults = true;
        recognition.value.continuous = true;

        recognition.value.addEventListener("result", handleRecognitionResult);

        recognition.value.addEventListener("end", () => {
            if (recognition.value.continuous && recognitionStarted.value) {
                recognition.value.start();
            }
        });

        recognition.value.addEventListener("error", (e) => {
            error.value = 'Speech recognition error: ' + e.error;
            recognitionStarted.value = false;
            loaderVisible.value = false;
        });
    } else {
        error.value = 'SpeechRecognition not supported by this browser.';
    }
});
</script>

<template>
    <div>
        <button @click="startRecognition" :disabled="recognitionStarted" class="text-white bg-blue-500 p-2 rounded">
            Start
        </button>
        <button @click="stopRecognition" :disabled="!recognitionStarted" class="text-white bg-gray-500 p-2 rounded">
            Stop
        </button>

        <div v-if="loaderVisible" class="mt-2 text-gray-500">Listening...</div>
        <p v-if="interimText" class="text-gray-600 mt-2">Interim: {{ interimText }}</p>
        <p v-if="error" class="text-red-500 mt-2">{{ error }}</p>
    </div>
</template>
