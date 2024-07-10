<template>
    <div class="card px-3">
        <div class="row">
            <div class="col-md-6 mb-3 my-md-auto">
                <h5 class="card-header">{{ __('Table', this.lang) }}</h5>
            </div>
            <div class="col-md-6 mb-3 my-md-auto text-end">
                <create :__="__" :sub_id="sub_id" :data="product" :createRequest="create_request" :lang="this.lang" @data-created="handleDataCreated"></create>
            </div>
        </div>
        <table_data :data_update="product" :dataRequest="product_data" :lang="this.lang" :__="__" :initial_data="all_data" :showData="show_data" :updateRequest="edit_request" :deleteRequest="delete_request"></table_data>
    </div>
</template>

<script>
import AlertMessage from "../layout/alertMessage.vue";
import Create from "../layout/Create.vue";
import TableData from "../layout/table_data.vue";
import Table_data from "../layout/table_data.vue";

export default {
    components: {Table_data, AlertMessage, Create, TableData},
    props: [
        'product_data',
        'create_request',
        'edit_request',
        'show_data',
        'delete_request',
        'sub_id',
        'lang',
    ],
    data(){
        return{
            product: {
                'image':'image',
                'name': 'text',
                'name_ar':'text',
                'description': 'text',
                'description_ar':'text',
                'price':'number',
                'visible':'switch',

            },
            all_data: []
        }
    },
    methods: {
    handleDataCreated(newData) {
        this.all_data.push(newData); // Add the new data to all_data
    }
},

    async created() {
        this.__ = window.__;
    },
}
</script>
