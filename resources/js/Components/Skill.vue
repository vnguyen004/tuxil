<script setup>
import RoundedButton from './RoundedButton.vue';

defineProps({
    name: {
        type: String,
        required: true
    },
    since: {
        type: String,
        required: true
    },
    desc: {
        type: String,
        required: true
    }
})
</script>

<template>
<div class="rounded-md border p-4 shadow bg-white">
    <div class="flex w-full items-center justify-between border-b pb-2">
        <div class="text-lg font-bold text-slate-700">{{ name }}</div>
        <div class="flex justify-between items-center">
            <div class="bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                {{ since }} </div>
            <rounded-button class="ml-2" bg-color="black" text-color="white"
                tooltip="Remove Skill">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </rounded-button>
        </div>
    </div>
    <div class="mt-2">
        <div class="text-sm text-neutral-600">{{ desc }}</div>
    </div>
</div>
</template>
