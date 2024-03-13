<template>
    <form class="h-screen flex justify-center flex-col items-center px-[16px] lg:px-[32px]">
        <TitleH1
            :title="'Nuorodų trumpintuvas'">
        </TitleH1>
        <ErrorsElement
            :errors="errors">
        </ErrorsElement> 
        <Input
            :modelValue="orginalUrl"
            :placeholder="'Įveskite nuorodą'"
            @update:modelValue="(newValue) => (orginalUrl = newValue)">
        </Input>
        <a :href="results.data.orginal_url" target="_blank" v-if="results.data" class="unerline text-[22px] lg:text-[36px] mt-[16px] ">{{ results.data }}</a>
        <CtaButton 
            :title="'Trumpink'"
            :addUrl="addUrl"
            v-on:shortenUrl="shortenUrl">
        </CtaButton> 
    </form>
</template>

<script setup>

// Imports 
import TitleH1 from '../Components/Main/TitleH1.vue';
import ErrorsElement from '../Components/Main/ErrorsElement.vue';
import CtaButton from '../Components/Main/CtaButton.vue';
import Input from '../Components/Main/Input.vue';
import axios from 'axios'
import { ref } from 'vue';

// Props & Emit
const props = defineProps({
    //orginalUrl: { type: String }
});

// Refs
const results = ref('');
const errors = ref({});
const addUrl = ref(false);
const orginalUrl = ref('');

// Methods
function shortenUrl()
{
    addUrl.value = true;
    console.log(orginalUrl);
    axios.post('/api/shorten-url', 
        { 
            orginalUrl: orginalUrl.value,
        })
        .then(response => {
            results.value = response.data;
            errors.value = '';
            addUrl.value = false;
        })
        .catch(function (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors
                addUrl.value = false;
            }
        });
}

</script>