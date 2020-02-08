<template>
    <paginate
    :page-count="maxPageNum"
    :click-handler="clickPaginate"
    :prev-text="'<'"
    :next-text="'>'"
    :container-class="'p-container--paginate__container'"
    :page-class="'p-container--paginate__page'"
    :page-link-class="'p-container--paginate__page-link'"
    :break-view-class="'p-container--paginate__break-view-class'"
    :prev-link-class="'p-container--paginate__prev-link'"
    :next-link-class="'p-container--paginate__next-link'"
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



