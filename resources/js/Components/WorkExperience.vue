<script setup>
import RoundedButton from './RoundedButton.vue'
import {defineEmits} from 'vue'

const emit = defineEmits(['remove', 'edit'])
defineProps({
    experience: {
        type: Object,
        required: true
    }
})
</script>

<template>
<div class="rounded-md border p-5 shadow bg-white">
    <div class="flex w-full items-center justify-between border-b pb-3">
        <div class="text-lg font-bold text-slate-700">{{ experience.company_name }}</div>
        <rounded-button
            @click="emit('remove', experience)"
            bg-color="black"
            text-color="white"
            tooltip="Remove Work Experience"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path
                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>
        </rounded-button>
    </div>

    <div class="mt-4 mb-6">
        <div class="flex justify-between">
            <div class="mb-3 text-xl font-bold">{{ experience.job_title }}</div>
            <div class="text-sm text-neutral-600">{{ experience.date_from }} <span class="p-1 inline-block">to</span> {{ experience.is_current ? 'Current' : experience.date_to }}</div>
        </div>

        <div class="text-sm text-neutral-600">
            {{ experience.summary }}
        </div>
    </div>
</div>
</template>
