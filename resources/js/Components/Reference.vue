<script setup>
import RoundedButton from './RoundedButton.vue';
import { defineEmits } from 'vue'

const emit = defineEmits(['remove', 'edit'])
defineProps({
    reference: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <li class="p-4">
        <div class="flex justify-between">
            <div>
                <p class="text-sm font-bold  truncate ">
                    {{ reference.full_name }}
                </p>
                <p class="text-sm text-gray-500 truncate">
                    {{ reference.email_address }}
                </p>
                <p class="text-sm text-gray-500 truncate">
                    {{ reference.phone_number }}
                </p>
            </div>
            <rounded-button
                @click="emit('remove', reference)"
                class="ml-2"
                bg-color="black"
                text-color="white"
                tooltip="Remove Reference"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x"
                    viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </rounded-button>
        </div>
    </li>

</template>
