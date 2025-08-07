<script setup lang="ts">

import AppContent from "@/components/AppContent.vue";
</script>

<template>
    <AppContent variant="sidebar" class="overflow-x-hidden">
        <div class="
            text-5xl font-bold text-orange-500
            mt-32
        ">
            <slot />
        </div>
    </AppContent>
</template>
