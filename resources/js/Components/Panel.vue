<script setup>
defineProps({
    panelTitle: {
        type: String,
        required: true
    },
    panelDecription: {
        type: String,
        required: true
    }
})
</script>
<template>
<div>
    <div class="flex items-center">
        <slot name="icon" />

        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold flex justify-between flex-grow items-center">
            <h5 class="flex-grow">{{ panelTitle }}</h5>
            <slot name="action" />
        </div>
    </div>

    <div class="ml-12">
        <div class="mt-2 text-sm text-gray-500">
            {{ panelDecription }}
        </div>

        <div class="mt-5 space-y-4">
            <slot name="body" />
        </div>
    </div>
</div>
</template>
