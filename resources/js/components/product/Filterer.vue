<template>
  <select @change="this.setValue" v-model="selectedValue" :id="type + '-filter'">
    <option v-for="option in options" :value="option.id" :selected="0 == option.id">{{ option.name }}</option>
  </select>
</template>

<script>

export default {
  props: {
    type: String,
    options: Array
  },
  data() {
    return {
      selectedValue: 0
    }
  },
  methods: {
    setValue() {
      this.$emit(this.type + 'Selected', this.selectedValue);
    }
  }
}
</script>