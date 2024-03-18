<script setup>
import { onMounted, onUnmounted, ref } from 'vue';

const props = defineProps({
    id: {
        type: String,
    },
    value: {
        type: String
    }
});


const closeOnEscape = (e) => {
    if (open.value && e.key === 'Escape') {
        open.value = false;
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));

const open = ref(false);
</script>

<template>
     <select :id="id" v-model="selected" @change="$emit('input', $event.target.value)" class="border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm mt-1 w-full">
            <slot name="content" />

    </select>
</template>

<script>
export default {
  props: ['id', 'value'],
  emits: ['input'],
  data() {
    return {
      selected: this.value
    };
  },
  watch: {
    value(newValue) {
      this.selected = newValue;
    }
  }
};
</script>