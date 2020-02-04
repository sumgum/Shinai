<template>
    <p @click="toggleEvent" class="p-container--category__element"><i class="fa" :class="categoryClass" aria-hidden="true"></i> {{text}}</p>
</template>

<script>
export default {
    props: {id: Number, name: String, text: String, isChecked: Boolean},
    methods: {
        toggleEvent: function() {
            this.$emit('category-element-event', this.id)
        }
    },
    computed: {
        categoryClass: function() {
            return (this.isChecked)? 'fa-check-square':'fa-square-o'
        },
    },
}
</script>
