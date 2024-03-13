<template>
    <div class="flex flex-col gap-[8px] mb-[16px]" v-if="errors" v-for="error in errors">
        <span >{{ error[0] }}</span>
    </div>  
</template>
<script setup>
    defineProps({
        errors: Array,
    });
</script>