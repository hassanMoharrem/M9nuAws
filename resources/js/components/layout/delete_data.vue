<template>
    <button type="button" @click="deleteUser(rowId,index)" class="btn btn-primary ms-1 px-2" data-bs-toggle="modal" :data-bs-target="'#modalCenterDelete-'+rowId">
        <i class="fas fa-trash-alt"></i>
    </button>

    <div class="modal fade" :id="'modalCenterDelete-'+rowId" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitleDelete">{{ __('Delete',this.lang)}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center mb-0">{{ __('Are you sure to delete ?',this.lang)}}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" :id="'CloseDeleteData-'+rowId" data-bs-dismiss="modal" >{{ __('Close',this.lang)}}</button>
                    <button type="button" class="btn btn-danger" @click="DestroyUser">{{ __('Yes , Delete',this.lang)}}</button>
                </div>
            </div>
        </div>
    </div>
    <div v-if="showSuccessMsg">
        <alert-message :successMsg="this.successMsg"></alert-message>
    </div>
</template>
<script>
import AlertMessage from "./alertMessage.vue";

export default {
    components: {AlertMessage},
    props:[
        'lang',
        '__',
        'rowId',
        'index',
        'deleteRequest',
    ],data(){
        const del_id = null;
        return {
            del_id,
            key_index: null,
            loading_delete: false,
            showSuccessMsg: false,
            successMsg: '',
            flashMsg: [],
        }
    },methods:{
        async deleteUser(id, index) {
            this.del_id = id;
            this.key_index = index;
        },
        async DestroyUser() {
            this.loading_delete = true;
            const config = {
                headers: {'Accept-Language': this.lang}
            }
            axios.post(this.deleteRequest + '/' + this.del_id,config)
                .then((res) => {
                    // this.users.splice(this.key_index, 1)
                    this.$emit('data-deleted', this.del_id);
                    document.getElementById('CloseDeleteData-'+this.rowId).click();
                    if (res.data.status == 200 && res.data.success == true) {
                        this.loading_delete = false;
                        this.showSuccessMsg = true;
                        this.successMsg = res.data.message;
                        setTimeout(() => this.showSuccessMsg = false, 2500);
                    }
                })
                .catch((err) => {
                    this.loading_delete = false;
                    this.flashMsg = err.response.data.message;
                    console.log(err);
                });
        }
    }
}
</script>
