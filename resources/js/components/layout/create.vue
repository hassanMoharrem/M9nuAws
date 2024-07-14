<template>
    <button type="button" class="btn btn-primary px-2" data-bs-toggle="modal" data-bs-target="#modalCreateData">
        <i class="fas fa-plus align-items-center me-1"></i> <span class=" align-items-center">{{ __('Create',this.lang)}}</span>
    </button>
    <div class="modal fade" id="modalCreateData" tabindex="-1" aria-labelledby="modalCreateDataTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateDataTitle">{{ __('Create',this.lang)}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form @submit.prevent="AddData" enctype="multipart/form-data">
                        <div class="row">
                            <template v-for="(row,index) in data " class="mb-3">
                                <div class="col-12"  v-if="row ==='image'">
                                    <div class="row justify-content-center">
                                        <div class="col-6 text-center">
                                            <div :id="'file-upload-filename'+index"
                                                 class="text-right text-truncate w-75 name-file-upload position-absolute"></div>
                                            <label :for="'file-upload-communication-comments-create'+index"
                                                       class="btn text-muted text-center p-1 mb-0 mx-auto position-relative bg-image-border p-0 bg-sub shadow-sm">
                                                <img :id="'selected-image'+index" class="w-100 h-100 object-fit-cover" style="display:none;" src="" alt="">
                                            </label>
                                            <small class="text-muted d-block py-2 font-12 fw-light">{{ __('Click to Add Your image', this.lang) }}</small>

                                            <input type="file" @click="indexImage(index)" v-on:change="selectedFile" class="input-file start-0 file-upload-communication-comments-create"
                                                   :id="'file-upload-communication-comments-create'+index"/>
                                            <div class="file-upload-filename-communication-comments-create mx-auto w-100 text-truncate"></div>
                                            <span v-if="flashMsg[index]"
                                                  class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                        </div>
                                    </div>
                                </div>

                                    <div v-else-if="row ==='text'" class="col-6 mb-2 text-start">
                                        <div v-if="index === 'menu_url'">
                                            <label class="form-label">{{__(index, this.lang)}}</label>
                                            <div class="position-relative">
                                                <input type="text" v-model="form[index]"
                                                       class="form-control ps-5" :placeholder="__(index, this.lang)">
                                                <div class="position-absolute h-100 align-items-center d-flex top-0 ps-2">
                                                    https://
                                                </div>
                                            </div>
                                            <span v-if="flashMsg[index]" class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                        </div>
                                        <div v-else>
                                            <label class="form-label">{{__(index, this.lang)}}</label>
                                            <input type="text" v-model="form[index]"
                                                   class="form-control" :placeholder="__(index, this.lang)">
                                            <span v-if="flashMsg[index]" class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                        </div>

                                    </div>
                                    <div v-else-if="row ==='email'" class="col-6 mb-2 text-start">
                                        <label class="form-label">{{__(index, this.lang)}}</label>
                                        <input type="email" v-model="form[index]"
                                               class="form-control" :placeholder="__(index, this.lang)">
                                        <span v-if="flashMsg[index]" class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                    </div>
                                    <div v-else-if="row ==='number'" class="col-6 mb-2 text-start">
                                        <label class="form-label">{{__(index, this.lang)}}</label>
                                        <input type="number" v-model="form[index]"
                                               class="form-control" :placeholder="__(index, this.lang)">
                                        <span v-if="flashMsg[index]" class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                    </div>
                                    <div v-else-if="row ==='password'" class="col-6 mb-2 text-start">
                                        <label class="form-label">{{__(index, this.lang)}}</label>
                                        <input type="password" v-model="form[index]"
                                               class="form-control" :placeholder="__(index, this.lang)">
                                        <span v-if="flashMsg[index]" class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                    </div>
                                <div v-else-if="row ==='date'" class="col-6 mb-2 text-start">
                                    <label class="form-label">{{__(index, this.lang)}}</label>
                                    <input type="date" v-model="form[index]"
                                           class="form-control" :placeholder="__(index, this.lang)">
                                    <span v-if="flashMsg[index]" class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                </div>
                                    <div v-else-if="row ==='switch'" class="col-6 mb-2 text-start">
                                        <div>
                                            <label class="form-label mt-2 w-100">{{__(index, this.lang)}}</label>
                                            <div class="form-check form-switch  align-middle ms-0 ps-0">
                                                <input class="form-check-input ms-0 ps-0" style="font-size: 20px" v-model="form[index]" type="checkbox" id="flexSwitchCheckChecked">
                                            </div>
                                        </div>
                                        <span v-if="flashMsg[index]" class="text-danger font-12 fw-400">{{ flashMsg[index][0] }}</span>
                                    </div>
                            </template>

                        </div>
                        <div class="modal-footer px-0 mb-0 pb-0 mt-2">
                            <button type="button" class="btn btn-outline-secondary" id="CloseCreateData" data-bs-dismiss="modal">{{ __('Close',this.lang)}}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Save changes',this.lang)}} <i v-if="loading_create" class="fas fa-spinner ms-1 fa-spin text-white"></i></button>
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
            'createRequest',
            'data',
            'lang',
            'sub_id',
            '__',
        ],
        data() {
            const form = {};
            for (const key in this.data) {
                form[key] = '';
            }
            return{
                image : {},
                form,
                showModal: false,
                loading_create: false,
                showSuccessMsg: false,
                flashMsg: [],
                successMsg: '',
                indexImageInput: '',

            }
        },
        methods:{
            async AddData() {
                this.loading_create = true;
                let formData = new FormData();
                for (let key in this.data) {
                    if (this.data.hasOwnProperty(key)) {
                        if (this.data[key] === 'image' && this.image !== null){
                            document.getElementById("selected-image"+key).src = "";
                            document.getElementById('selected-image'+key).style.display = 'none';
                            formData.append(key, this.image[key] ? this.image[key] : '');
                        }
                        if (this.sub_id != null){
                            formData.append('sub_id', this.sub_id ? this.sub_id : '');
                        }
                        formData.append(key, this.form[key] ? this.form[key] : '');
                    }
                }

                const config = {
                    headers: {'content-type': 'multipart/form-data','Accept-Language': this.lang}
                }
                axios.post(this.createRequest, formData, config)
                    .then((res) => {
                        this.$emit('data-created', res.data.data);
                        this.showModal = false;
                        this.form = []
                        this.image = {};
                        document.getElementById('CloseCreateData').click();
                        this.loading_create = false;
                        if (res.data.status == 200 && res.data.success == true) {
                            this.showSuccessMsg = true;
                            this.successMsg = res.data.message;
                            setTimeout(() => this.showSuccessMsg = false, 2500);
                        }
                        this.flashMsg = ''
                    })
                    .catch((err) => {
                        this.loading_create = false;
                        this.flashMsg = err.response.data.message;
                    });
            },
            selectedFile(e) {
                    this.image[this.indexImageInput] = e.target.files[0];
                    document.getElementById("selected-image"+this.indexImageInput).src= URL.createObjectURL(this.image[this.indexImageInput]);
                    // Show the image
                    document.getElementById('selected-image'+this.indexImageInput).style.display = 'block';
                },
            indexImage(index) {
                this.indexImageInput = index;
            },
            }
        }
</script>

