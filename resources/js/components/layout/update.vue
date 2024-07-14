<template>
    <button type="button" class="btn btn-primary px-2 ms-1" data-bs-toggle="modal" @click="editData(this.updateRowId, this.indexUpdate)" :data-bs-target="'#modalUpdateData-'+updateRowId">
        <i class="fas fa-edit align-items-center"></i>
    </button>
    <div class="modal fade" :id="'modalUpdateData-'+updateRowId" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" :id="'modalUpdateDataTitle-'+updateRowId">{{ __('Update',this.lang)}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" :id="'updateData_easy-'+updateRowId">
                    <form @submit.prevent="UpdateData" enctype="multipart/form-data">
                        <div class="row">
                            <template v-for="(row,index) in data_update" class="mb-3">
                                    <div v-if="row ==='image'" class="col-6 text-center">
                                        <div id="file-upload-filename"
                                             class="text-right text-truncate w-75 name-file-upload position-absolute"></div>
                                        <label :for="'file-upload-communication-comments-create'+index+updateRowId"
                                               class="btn text-muted text-center p-1 mb-0 mx-auto position-relative bg-image-border p-0 bg-sub shadow-sm">
                                            <img :id="'selected-update-image'+index+updateRowId" v-if="form_update[index] === ''" class="w-100 h-100 object-fit-cover 123" style="display:none;" src="" alt="">
                                            <img :id="'selected-update-image'+index+updateRowId" v-else class="w-100 h-100 object-fit-cover" :src="form_update[index]" alt="">
                                        </label>
                                        <small class="text-muted d-block py-2 font-12 fw-light">{{ __('Click to Add Your image' , this.lang) }}</small>

                                    <input type="file" @click="indexImage(index)" v-on:change="selectedFileEdit" class="input-file start-0 file-upload-communication-comments-create"
                                               :id="'file-upload-communication-comments-create'+index+updateRowId"/>
                                        <div class="file-upload-filename-communication-comments-create mx-auto w-100 text-truncate"></div>
                                        <span v-if="flashMsg[index]"
                                              class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                    </div>
                                    <div v-else-if="row ==='text'" class="col-6 mb-2 text-start">
                                        <label class="form-label">{{__(index,this.lang)}}</label>
                                        <input type="text" v-model="form_update[index]"
                                               class="form-control" :placeholder="__(index, this.lang)">
                                        <span v-if="flashMsg[index]" class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                    </div>
                                    <div v-else-if="row ==='email'" class="col-6 mb-2 text-start">
                                        <label class="form-label">{{__(index,this.lang)}}</label>
                                        <input type="email" v-model="form_update[index]"
                                               class="form-control" :placeholder="__(index, this.lang)">
                                        <span v-if="flashMsg[index]" class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                    </div>
                                    <div v-else-if="row ==='number'" class="col-6 mb-2 text-start">
                                        <label class="form-label">{{__(index,this.lang)}}</label>
                                        <input type="number" v-model="form_update[index]"
                                               class="form-control" :placeholder="__(index, this.lang)">
                                        <span v-if="flashMsg[index]" class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                    </div>
                                    <div v-else-if="row ==='password'" class="col-6 mb-2 text-start">
                                        <label class="form-label">{{__(index,this.lang)}}</label>
                                        <input type="password" v-model="form_update[index]"
                                               class="form-control" :placeholder="__(index, this.lang)">
                                        <span v-if="flashMsg[index]" class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                    </div>
                                <div v-else-if="row ==='date'" class="col-6 mb-2 text-start">
                                    <label class="form-label">{{__(index,this.lang)}}</label>
                                    <input type="date" v-model="form_update[index]"
                                           class="form-control" :placeholder="__(index, this.lang)">
                                    <span v-if="flashMsg[index]" class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                </div>
                                <div v-else-if="row ==='switch'" class="col-6 mb-2 text-start">
                                    <div>
                                        <label class="form-label mt-2 w-100">{{__(index,this.lang)}}</label>
                                        <div class="form-check form-switch align-middle ms-0 ps-0">
                                            <input class="form-check-input ms-0 ps-0" style="font-size: 20px" v-model="form_update[index]" type="checkbox" id="flexSwitchCheckChecked">
                                        </div>
                                    </div>
                                    <span v-if="flashMsg[index]" class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                </div>
                            </template>

                        </div>
                        <div class="modal-footer px-0 mb-0 pb-0 mt-2">
                            <button type="button" class="btn btn-outline-secondary" :id="'CloseUpdateData'+updateRowId" data-bs-dismiss="modal">{{ __('Close',this.lang)}}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Save changes',this.lang)}} <i v-if="loading_update" class="fas fa-spinner ms-1 fa-spin text-white"></i></button>
                        </div>
                    </form>

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

export default{
        components: {AlertMessage},
        props:[
            'updateRequest',
            'showData',
            'data_update',
            'lang',
            '__',
            'updateRowId',
            'indexUpdate',
        ],
        data() {
            return{
                image : {},
                form_update:[],
                showModal: false,
                loading_update: false,
                showSuccessMsg: false,
                flashMsg: [],
                successMsg: '',
                key_index: null,
                indexImageInput: '',
            }
        },
        methods:{
            async editData(id, index) {
                document.getElementById('updateData_easy-'+this.updateRowId).style.opacity='0';
                this.flashMsg = '';
                this.loading_data = true;
                axios.post(this.showData + '/' + id,[],{
                    headers:{'Accept-Language': this.lang}
                }).then((res) => {
                        this.form_update = res.data;
                        this.key_index = index;
                        this.loading_data = false;
                        document.getElementById('updateData_easy-'+this.updateRowId).style.transition='1.2s ease';
                        document.getElementById('updateData_easy-'+this.updateRowId).style.opacity='1';
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            async UpdateData() {
                this.loading_update = true;
                let formDataEdit = new FormData();
                for (let key in this.data_update) {
                    if (this.data_update.hasOwnProperty(key)) {
                        if (this.data_update[key] === 'image' && this.image !== null){
                            // document.getElementById("selected-update-image"+this.indexImageInput+this.updateRowId).src = "";
                            // document.getElementById('selected-update-image'+this.indexImageInput+this.updateRowId).style.display = 'none';
                            formDataEdit.append(key, this.image[key] ? this.image[key] : '');
                        }else {
                            formDataEdit.append(key, this.form_update[key] ? this.form_update[key] : '');
                        }

                    }
                }

                const config = {
                    headers: {'content-type': 'multipart/form-data','Accept-Language': this.lang}
                }
                axios.post(this.updateRequest + '/' + this.updateRowId, formDataEdit, config)
                    .then((res) => {
                        this.$emit('data-updated', [this.key_index , res.data.data]);
                        this.key_index = null;
                        document.getElementById('CloseUpdateData'+this.updateRowId).click();
                        document.getElementById('updateData_easy-'+this.updateRowId).style.opacity='0';
                        this.loading_update = false;
                        if (res.data.status == 200 && res.data.success == true) {
                            this.showSuccessMsg = true;
                            this.successMsg = res.data.message;
                            setTimeout(() => this.showSuccessMsg = false, 2500);
                        }
                        this.flashMsg = ''
                    })
                    .catch((err) => {
                        this.loading_update = false;
                        this.flashMsg = err;
                    });
            },
            selectedFileEdit(event) {
                this.image[this.indexImageInput] = event.target.files[0];
                document.getElementById("selected-update-image"+this.indexImageInput+this.updateRowId).src= URL.createObjectURL(this.image[this.indexImageInput]);
                document.getElementById('selected-update-image'+this.indexImageInput+this.updateRowId).style.display = 'block';
            },
            indexImage(index) {
                this.indexImageInput = index;
            },
            }
        }
</script>
