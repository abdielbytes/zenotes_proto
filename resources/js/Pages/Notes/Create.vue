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


<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speech Recognition App</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"></script>
</head>
<body>
  <div id="app">
    <div>
      <button @click="startRecognition" :disabled="recognitionStarted">Start</button>
      <button @click="stopRecognition" :disabled="!recognitionStarted">Stop</button>
    </div>

    <div v-if="loaderVisible" id="loader">Listening...</div>
    <p id="finalTranscript">{{ finalText }}</p>
    <p id="interimTranscript">{{ interimText }}</p>
    <p id="errorMessage" v-if="error">{{ error }}</p>
  </div>

  <script>
    const app = Vue.createApp({
      data() {
        return {
          recognition: null,
          recognitionStarted: false,
          finalText: '',
          interimText: '',
          loaderVisible: false,
          error: ''
        };
      },
      mounted() {
        // Check for SpeechRecognition support
        window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

        if (window.SpeechRecognition) {
          this.recognition = new SpeechRecognition();
          this.recognition.interimResults = true;
          this.recognition.continuous = true;

          // Handle speech recognition results
          this.recognition.addEventListener("result", (e) => {
            this.handleRecognitionResult(e);
          });

          // Handle recognition end
          this.recognition.addEventListener("end", () => {
            if (this.recognition.continuous && this.recognitionStarted) {
              this.recognition.start();
            }
          });

          // Handle errors
          this.recognition.addEventListener("error", (e) => {
            this.error = 'Speech recognition error: ' + e.error;
            this.recognitionStarted = false;
            this.loaderVisible = false;
          });
        } else {
          this.error = 'SpeechRecognition not supported by this browser.';
        }
      },
      methods: {
        startRecognition() {
          if (!this.recognitionStarted && this.recognition) {
            this.recognition.start();
            this.recognitionStarted = true;
            this.loaderVisible = true;
            this.error = '';
          }
        },
        stopRecognition() {
          if (this.recognitionStarted && this.recognition) {
            this.recognition.stop();
            this.recognitionStarted = false;
            this.loaderVisible = false;
          }
        },
        handleRecognitionResult(e) {
          let finalText = '';
          let interimText = '';

          Array.from(e.results).forEach(result => {
            if (result[0].isFinal) {
              finalText += result[0].transcript;
            } else {
              interimText += result[0].transcript;
            }
          });

          this.finalText = finalText;
          this.interimText = interimText;
        }
      }
    });

    app.mount('#app');
  </script>

</body>
</html>
-->
<!--body {
  font-family: Arial, sans-serif;
  text-align: center;
  margin: 0;
  padding: 0;
  background-color: #f5f5f5;
}
section {
  margin: 50px auto;
  padding: 20px;
  max-width: 600px;
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
h1 {
  font-size: 2.5em;
  margin: 0;
  color: #333;
}
p {
  font-size: 1.2em;
  color: #666;
}
.container {
  margin-top: 20px;
}
.texts {
  margin: 20px 0;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  background-color: #fafafa;
  min-height: 100px;
  text-align: left;
}
button {
  margin: 10px;
  padding: 10px 20px;
  font-size: 16px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  background-color: #3498db;
  color: #fff;
}
button:disabled {
  background-color: #aaa;
  cursor: not-allowed;
}
.loader {
  border: 8px solid #f3f3f3;
  border-radius: 50%;
  border-top: 8px solid #3498db;
  width: 40px;
  height: 40px;
  animation: spin 2s linear infinite;
  margin: 20px auto;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.error {
  color: red;
  margin-top: 10px;
}-->
