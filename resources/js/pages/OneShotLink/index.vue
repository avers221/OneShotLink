<script setup lang="ts">
import OneShotLinkLayout from '@/layouts/OneShotLink/OneShotLinkLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';
import { route } from 'ziggy-js';

const form = ref({
    body: '',
    ttl: '',
});

const serverMessage = ref('');
const serverErrors = ref('');

const submitForm = async () => {
    try {
        const response = await axios.post(route('link.create'), form.value);
        serverMessage.value = response.data;
    } catch (error) {
        // Если ошибка, показываем текст ошибки
        serverErrors.value = error.response.data.errors;
    }
};
</script>

<template>
    <Head title="One Shot Link" />

    <OneShotLinkLayout>
        <form class="mx-auto max-w-sm" @submit.prevent="submitForm">
            <div class="mb-5">
                <label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Введите содержимое ссылки</label>
                <input
                    type="text"
                    id="body"
                    v-model="form.body"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                />
            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Введите время актуальности ссылки</label>
                <input
                    type="number"
                    id="ttl"
                    v-model="form.ttl"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                />
            </div>
            <button
                type="submit"
                class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
                Submit
            </button>
        </form>

        <div class="mx-auto max-w-sm" v-if="serverMessage">
            <h1>Содержимое одноразовой ссылки:</h1>
            <p>{{ serverMessage.link }}</p>
        </div>
        <ul>
            <li v-for="error in serverErrors">
                <p class="mx-auto max-w-sm">
                    {{ error[0] }}
                </p>
            </li>
        </ul>
    </OneShotLinkLayout>
</template>
