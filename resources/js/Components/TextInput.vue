<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: {
        type: String,
        required: true,
    },
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="tw-border-gray-300 tw-dark:border-gray-700 tw-dark:bg-gray-900 tw-dark:text-gray-300 tw-focus:border-indigo-500 tw-dark:focus:border-indigo-600 tw-focus:ring-indigo-500 tw-dark:focus:ring-indigo-600 tw-rounded-md tw-shadow-sm"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
