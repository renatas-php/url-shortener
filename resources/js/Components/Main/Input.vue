<template>
    <input type="text" :placeholder="placeholder" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" class="h-[60px] lg:h-[80px] w-[80%] rounded-[50px] border-[3px] border-[#000] text-[28px] px-[16px] text-center max-w-[800px]">
</template>
<script setup>
    defineProps({
        placeholder: {
            type: String
        },
        modelValue: {
            type: String
        },
    });
</script>