<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        required: true,
    },
    value: {
        default: null,
    },
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>

<template>
    <input
        type="checkbox"
        :value="value"
        v-model="proxyChecked"
        class="tw-rounded tw-dark:bg-gray-900 tw-border-gray-300 tw-dark:border-gray-700 tw-text-indigo-600 tw-shadow-sm tw-focus:ring-indigo-500 tw-dark:focus:ring-indigo-600 tw-dark:focus:ring-offset-gray-800"
    />
</template>
