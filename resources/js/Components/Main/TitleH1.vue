<template>
    <h1 class="text-[32px] md:text-[60px] xl:text-[100px] mb-[60px]">{{ title }}</h1>
</template>
<script setup>
    defineProps({
        title: String,
        class: String,
    });
</script>