<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="tw-block tw-font-medium tw-text-sm tw-text-gray-700 tw-dark:text-gray-300">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
