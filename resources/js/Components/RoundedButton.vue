<script setup>
import { computed} from 'vue';
import Popper from 'vue3-popper';
const props = defineProps({
    bgColor: {
        type: String,
        default: 'grey'
    },
    textColor: {
        type: String,
        default: 'white'
    },
    tooltip: {
        type: String,
        default: null
    }
})
const colors = computed(() => `bg-transparent border-2 border-${props.bgColor}-500 text-${props.bgColor}-500 text-lg rounded-full transition-colors duration-700 transform hover:bg-${props.bgColor}-500 hover:text-${props.textColor}-100 focus:border-${props.bgColor}-300`);

</script>
<template>
<Popper hover placement="top" :content="tooltip">
    <button v-if="bgColor === 'indigo'" class="text-purple-700 rounded-full p-0.5 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium  text-sm  text-center ml-1">
        <slot />
    </button>
    <button v-else class="text-gray-900 hover:text-white border p-0.5 border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm text-center ml-1">
        <slot />
    </button>
</Popper>
</template>
<style scoped>
:deep(.popper) {
    background: rgba(0, 0, 0, .6);
    padding: .2rem .5rem;
    border-radius: 5px;
    color: #fff;
    font-weight: bold;
    font-size: small
}

:deep(.popper #arrow::before) {
    background: rgba(0, 0, 0, .6);
}

:deep(.popper:hover),
:deep(.popper:hover > #arrow::before) {
    background: rgba(0, 0, 0, .6);
}
</style>
