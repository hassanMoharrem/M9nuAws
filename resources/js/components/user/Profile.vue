<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id="updateUser_easy" class="p-3 ">
                    <form @submit.prevent="UpdateUser" enctype="multipart/form-data"
                           class="mx-2 px-4 py-5 rounded-3 bg-white">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-5 text-center">
                                    <div id="file-upload-filename"
                                         class="text-right text-truncate w-75 name-file-upload position-absolute"></div>
                                    <label for="file-upload-communication-comments-edite"
                                           class="btn text-muted text-center p-1 mb-0 mx-auto position-relative bg-image-border-profile p-0 bg-sub shadow-sm">
                                        <img id="selected-update-image" v-if="user_update.image" class="w-100 h-100 object-fit-contain" :src="user_update.image" alt="">
                                        <img id="selected-update-image" v-else class="w-100 h-100 object-fit-contain" style="display:none;" src="" alt="">
                                    </label>
                                    <small class="text-label d-block py-2 font-12 fw-light">{{ __('Click to Edit Your Image',this.lang)}}</small>
                                    <input type="file" v-on:change="selectedFileEdit" class="input-file start-0 file-upload-communication-comments-create"
                                           id="file-upload-communication-comments-edite"/>
                                    <div class="file-upload-filename-communication-comments-create mx-auto w-100 text-truncate"></div>
                                    <span v-if="flashMsg.image"
                                          class="text-danger fw-400 font-12">{{ flashMsg.image[0] }}</span>

                                </div>
                                <div class="form-group mb-0 text-center">
                                    <div id="file-upload-filename"
                                         class="text-right text-truncate w-75 name-file-upload position-absolute"></div>
                                    <label for="file-upload-communication-comments-edite-background"
                                           class="btn text-muted text-center p-1 mb-0 mx-auto position-relative bg-image-border-profile p-0 bg-sub shadow-sm">
                                        <img id="selected-update-background" v-if="user_update.background" class="w-100 h-100 object-fit-contain p-1" :src="user_update.background" alt="">
                                        <img id="selected-update-background" v-else class="w-100 h-100 object-fit-contain p-1" style="display:none;" src="" alt="">
                                    </label>
                                    <small class="text-label d-block py-2 font-12 fw-light">{{ __('Click to Edit Your Background',this.lang)}}</small>
                                    <input type="file" v-on:change="selectedFileEditBackground" class="input-file start-0 file-upload-communication-comments-create"
                                           id="file-upload-communication-comments-edite-background"/>
                                    <div class="file-upload-filename-communication-comments-create mx-auto w-100 text-truncate"></div>
                                    <span v-if="flashMsg.image"
                                          class="text-danger fw-400 font-12">{{ flashMsg.background[0] }}</span>

                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
<!--                                    <div class="col-md-6 mb-2">-->
<!--                                        <div class="form-group mb-3 text-start">-->
<!--                                            <label class="fw-400 text-label font-14 text-primary">Company Name</label>-->
<!--                                            <div class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary position-relative">-->
<!--                                                <span>{{ user_update.company_name }}</span>-->
<!--                                                <span class="position-absolute top-0 end-0 bg-danger text-white rounded-1 shadow-sm font-10 px-2">No control</span>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6 mb-2">-->
<!--                                        <div class="form-group mb-3 text-start">-->
<!--                                            <label class="fw-400 text-label font-14 text-primary">Company Name Ar</label>-->
<!--                                            <div class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary position-relative">-->
<!--                                                <span>{{ user_update.company_name_ar }}</span>-->
<!--                                                <span class="position-absolute top-0 end-0 bg-danger text-white rounded-1 shadow-sm font-10 px-2">No control</span>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group mb-3 text-start">
                                            <label class="fw-400 text-label font-14 text-primary">{{ __('First Name',this.lang)}}</label>
                                            <input type="text" v-model="user_update.f_name"
                                                   class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary">
                                            <span v-if="flashMsg.f_name"
                                                  class="text-danger fw-400 font-12">{{ flashMsg.f_name[0] }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group mb-3 text-start">
                                            <label class="fw-400 text-label font-14 text-primary">{{ __('Last Name',this.lang)}}</label>
                                            <input type="text" v-model="user_update.l_name"
                                                   class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary">
                                            <span v-if="flashMsg.l_name"
                                                  class="text-danger fw-400 font-12">{{ flashMsg.l_name[0] }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group mb-3 text-start">
                                            <label class="fw-400 text-label font-14 text-primary">{{ __('First Name Arabic',this.lang)}}</label>
                                            <input type="text" v-model="user_update.f_name_ar"
                                                   class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary">
                                            <span v-if="flashMsg.f_name_ar"
                                                  class="text-danger fw-400 font-12">{{ flashMsg.f_name_ar[0] }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group mb-3 text-start">
                                            <label class="fw-400 text-label font-14 text-primary">{{ __('Last Name Arabic',this.lang)}}</label>
                                            <input type="text" v-model="user_update.l_name_ar"
                                                   class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary">
                                            <span v-if="flashMsg.l_name_ar"
                                                  class="text-danger fw-400 font-12">{{ flashMsg.l_name_ar[0] }}</span>
                                        </div>
                                    </div>
<!--                                    <div class="col-md-6 mb-2">-->
<!--                                        <div class="form-group mb-3 text-start ">-->
<!--                                            <label class="fw-400 text-label font-14 text-primary">Email</label>-->
<!--                                            <div class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary position-relative">-->
<!--                                                <span>{{ user_update.email }}</span>-->
<!--                                                <span class="position-absolute top-0 end-0 bg-danger text-white rounded-1 shadow-sm font-10 px-2">No control</span>-->
<!--                                            </div>-->

<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group mb-3 text-start">
                                            <label class="fw-400 text-label font-14 text-primary">{{ __('Password',this.lang)}}</label>
                                            <input type="password" v-model="user_update.password"
                                                   class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary">
                                            <span v-if="flashMsg.password"
                                                  class="text-danger fw-400 font-12">{{ flashMsg.password[0] }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group mb-3 text-start">
                                            <label class="fw-400 text-label font-14 text-primary">{{ __('Phone',this.lang)}}</label>
                                            <input type="text" v-model="user_update.phone"
                                                   class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary">
                                            <span v-if="flashMsg.phone" class="text-danger font-12 fw-400">{{ flashMsg.phone[0] }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group mb-3 text-start">
                                            <label class="fw-400 text-label font-14 text-primary">{{ __('Whatsapp',this.lang)}}</label>
                                            <input type="text" v-model="user_update.whatsapp"
                                                   class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary">
                                            <span v-if="flashMsg.whatsapp" class="text-danger font-12 fw-400">{{ flashMsg.whatsapp[0] }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group mb-3 text-start">
                                            <label class="fw-400 text-label font-14 text-primary">{{ __('Instagram',this.lang)}}</label>
                                            <input type="text" v-model="user_update.instagram"
                                                   class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary">
                                            <span v-if="flashMsg.instagram" class="text-danger font-12 fw-400">{{ flashMsg.instagram[0] }}</span>
                                        </div>
                                    </div>
<!--                                    <div class="col-md-6 mb-2">-->
<!--                                        <div class="form-group mb-3 text-start">-->
<!--                                            <label class="fw-400 text-label font-14 text-primary">Menu Url</label>-->
<!--                                            <div class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary position-relative">-->
<!--                                                <span>{{ user_update.menu_url }}</span>-->
<!--                                                <span class="position-absolute top-0 end-0 bg-danger text-white rounded-1 shadow-sm font-10 px-2">No control</span>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group mb-3 text-start">
                                            <label class="fw-400 text-label font-14 text-primary">{{ __('Country',this.lang)}}</label>
                                            <input type="text" v-model="user_update.country"
                                                   class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary">
                                            <span v-if="flashMsg.country" class="text-danger font-12 fw-400">{{ flashMsg.country[0] }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group mb-3 text-start">
                                            <label class="fw-400 text-label font-14 text-primary">{{ __('State',this.lang)}}</label>
                                            <input type="text" v-model="user_update.state"
                                                   class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary">
                                            <span v-if="flashMsg.state" class="text-danger font-12 fw-400">{{ flashMsg.state[0] }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group mb-3 text-start">
                                            <label class="fw-400 text-label font-14 text-primary">{{ __('Description',this.lang)}}</label>
                                            <textarea v-model="user_update.description" class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary" cols="30" rows="5"></textarea>
                                            <span v-if="flashMsg.description" class="text-danger font-12 fw-400">{{ flashMsg.description[0] }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group mb-3 text-start">
                                            <label class="fw-400 text-label font-14 text-primary">{{ __('Description Arabic',this.lang)}}</label>
                                            <textarea v-model="user_update.description_ar" class="form-control py-3 px-3 shadow-input mt-2 border-transparent bg-sub font-12 text-dark border-primary" cols="30" rows="5"></textarea>
                                            <span v-if="flashMsg.description_ar" class="text-danger font-12 fw-400">{{ flashMsg.description_ar[0] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center my-2">
                                    <button type="submit"
                                            class="btn px-4 bg-button font-14 text-label rounded-10 border-0">
                                        <span class="mx-2 py-2 px-4 text-white rounded-2 bg-primary">{{ __('Update',this.lang)}} <span v-if="this.loading_update === true"><i class="fas fa-spinner fa-spin text-white ms-1"></i></span></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div v-if="showSuccessMsg">
            <alert-message :successMsg="this.successMsg"></alert-message>
        </div>


    </div>


</template>

<script>
import {reactive} from "vue/dist/vue.esm-bundler";
import AlertMessage from "../layout/alertMessage.vue";

export default {
    components: {AlertMessage},
    props: [
        'user_data',
        'user_data_update',
        'lang',
    ],
    data() {
        const user = reactive({
            name: '',
            password: '',
            email: '',
            phone: '',
        })


        return {
            users: [],
            user_update: [],
            user,
            flashMsg: [],
            loading: false,
            loading_update: false,
            loading_data: false,
            showSuccessMsg: false,
            successMsg: '',
            image: '',
            background: '',
            key_index: null,
        }
    },

    methods: {
        // async getDate() {
        //     this.loading = true;
        //     axios.post(this.user_data_show)
        //         .then(response => {
        //             this.user_update = response.data;
        //             this.loading = false;
        //         })
        //         .catch((err) => {
        //             this.loading = false;
        //             console.log(err);
        //         });
        // },
        selectedFileEdit(event) {
            this.image = event.target.files[0];
            document.getElementById("selected-update-image").src= URL.createObjectURL(this.image);
            document.getElementById('selected-update-image').style.display = 'block';
        },
        selectedFileEditBackground(event) {
            this.background = event.target.files[0];
            document.getElementById("selected-update-background").src= URL.createObjectURL(this.background);
            document.getElementById('selected-update-background').style.display = 'block';
        },
        async UpdateUser() {
            this.loading_update = true;
            let formDataEdit = new FormData();
            formDataEdit.append('image', this.image ? this.image : '');
            formDataEdit.append('background', this.background ? this.background : '');
            formDataEdit.append('f_name', this.user_update.f_name ? this.user_update.f_name : '');
            formDataEdit.append('l_name', this.user_update.l_name ? this.user_update.l_name : '');
            formDataEdit.append('f_name_ar', this.user_update.f_name_ar ? this.user_update.f_name_ar : '');
            formDataEdit.append('l_name_ar', this.user_update.l_name_ar ? this.user_update.l_name_ar : '');
            formDataEdit.append('email', this.user_update.email ? this.user_update.email : '');
            formDataEdit.append('password', this.user_update.password ? this.user_update.password : '');
            formDataEdit.append('phone', this.user_update.phone ? this.user_update.phone : '');
            formDataEdit.append('whatsapp', this.user_update.whatsapp ? this.user_update.whatsapp : '');
            formDataEdit.append('instagram', this.user_update.instagram ? this.user_update.instagram : '');
            formDataEdit.append('country', this.user_update.country ? this.user_update.country : '');
            formDataEdit.append('state', this.user_update.state ? this.user_update.state : '');
            formDataEdit.append('description', this.user_update.description ? this.user_update.description : '');
            formDataEdit.append('description_ar', this.user_update.description_ar ? this.user_update.description_ar : '');
            const config = {
                headers: {'content-type': 'multipart/form-data','email':this.user_data.email}
            }
            axios.post(this.user_data_update , formDataEdit, config)
                .then((res) => {
                    localStorage.setItem('name', res.data.name);
                    this.user_update = res.data.data;
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
                    console.log(err);
                    this.flashMsg = err.response.data.message;
                });
        },
    },
    async created() {
        this.user_update = this.user_data
        // this.getDate();
        this.__ = window.__;
    },
}
</script>
