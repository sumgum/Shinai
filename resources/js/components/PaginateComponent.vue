<template>
    <paginate
    :page-count="maxPageNum"
    :click-handler="clickPaginate"
    :prev-text="'<'"
    :next-text="'>'"
    :container-class="'p-container--paginate__container'"
    :page-link-class="'p-container--paginate__paginate'"
    :active-class="'p-container--paginate__active'">
    </paginate>
</template>

<script>
import Paginate from 'vuejs-paginate';
Vue.component('paginate', Paginate);
    export default {
        props: ['maxPageNum'],
        methods: {
            clickPaginate: function(pageNum) {
                this.$emit('paginateHandler', pageNum)
            },
        },
    }
</script>



