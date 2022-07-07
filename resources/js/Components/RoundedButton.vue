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
    <button
        :class="colors">
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
