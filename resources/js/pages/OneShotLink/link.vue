<script setup lang="ts">
import OneShotLinkLayout from '@/layouts/OneShotLink/OneShotLinkLayout.vue';
import { Link } from '@/types/OneShotLink/link';

const props = defineProps<{
    link: Link;
    error: String;
}>();
</script>

<template>
    <OneShotLinkLayout>
        <div class="mx-auto max-w-sm mt-5">

            <div v-if="error" class="error">
                <h1>{{ error }}</h1>
            </div>

            <div v-else>
                <h1>Ваша одноразовая ссылка содержит:</h1>
                <p>{{ link.body }}</p>
            </div>

        </div>
    </OneShotLinkLayout>
</template>

<style scoped></style>
