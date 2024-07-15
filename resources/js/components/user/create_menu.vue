<template>
    <div class="container">
        <div class="row justify-content-end">
<!--            <div class="col-md-6 mb-3 my-md-auto">-->
<!--                <h5 class="card-header">{{ __('Table', this.lang) }}</h5>-->
<!--            </div>-->
        </div>
        <table_data
            :data_request_product="data_request_product"
            :create_request_product="create_request_product"
            :create_request="create_request"
            :edit_request_product="edit_request_product"
            :delete_request_product="delete_request_product"
            :show_data_product="show_data_product"
            :sub_id="this.user.id"
            :data_update="category"
            :data="category"
            :dataRequest="data_request"
            :lang="this.lang"
            :__="__"
            :showData="show_data"
            :updateRequest="edit_request"
            :deleteRequest="delete_request">
        </table_data>
    </div>
</template>
<script>
import Create from "../layout/create.vue";
import Table_data from "../layoutSite/table_data.vue";

export default {
    components: {Table_data, Create},
    props:[
        'user',
        'data_request',
        'create_request',
        'edit_request',
        'delete_request',
        'show_data',
        'data_request_product',
        'create_request_product',
        'edit_request_product',
        'delete_request_product',
        'show_data_product',
        'lang'
    ],
    data() {

        return {
            __,
            category: {
                // 'image':'image',
                'name': 'text',
                'name_ar':'text',
                'visible':'switch',
            },

        }


    },
    async created() {
        this.__ = window.__;
    },

}
</script>
