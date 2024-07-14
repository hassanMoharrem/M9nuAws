<template>
    <div class="bg-white p-3 rounded-3">
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="accordionExample">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="font-18 text-primary px-2 pb-4"><i class="fas fa-list font-18 me-2"></i>{{ __('Menu Page',this.lang)}} :</h4>
                        </div>
                        <div class="col-6 text-end">
                            <create :__="__" :sub_id="sub_id" :data="data" :createRequest="create_request" :lang="this.lang" @data-created="handleDataCreated"></create>
                        </div>
                    </div>

                    <div class="px-3 py-3 rounded-3 border mb-3 w-100 d-md-flex d-none">
                        <template v-for="head in header">
                            <h5 v-if="head === 'id'" class="font-16 px-2 bg-none mb-0 border-0 text-start wtd-10">
                                {{ __(head, this.lang) }}</h5>
                            <h5 v-else class="font-16 px-2 bg-none mb-0 border-0 text-start wtd-15">
                                {{ __(head, this.lang) }}</h5>
                        </template>
                        <h5 class="font-16 px-2 bg-none mb-0 border-0 text-start wtd-15">{{ __('Actions',this.lang)}}</h5>
                    </div>
                    <div class="accordion px-3 py-2 rounded-3 shadow-sm mb-3  border-bottom"  v-if="this.all_data.data.length > 0"
                         v-for="(data , index) in this.all_data.data" :key="data.id">
                        <table class="table mb-0">
                            <tbody>
                            <tr>
                                <td v-for="(k,index1) in data" class="align-middle"
                                    :class="index1 ==='id' ? 'bg-none mb-0 border-0 text-start wtd-10' : 'bg-none mb-0 border-0 text-start wtd-15'">
                                    <p class="mb-0" v-if="index1 === 'id'">{{ startIndex + index + 1 }}</p>
                                    <p class="mb-0" v-else-if="index1 === 'visible'">
                                    <span v-if="data[index1] === 1"
                                          class="text-success rounded px-1 px-md-2 py-1 border-success border font-12 d-inline-block w-sm-45px text-center">{{ __('Active',this.lang)}}</span>
                                        <span v-if="data[index1] === 0"
                                              class="text-danger rounded px-1 px-md-2 py-1 border-danger border font-12 d-inline-block w-sm-45px text-center">{{ __('inActive',this.lang)}}</span>
                                    </p>
                                    <p class="mb-0" v-else-if="index1 === 'status'">
                                    <span v-if="data[index1] === 1"
                                          class="bg-success rounded px-2 py-1 text-white fa-sm">{{ __('Active',this.lang)}}</span>
                                        <span v-if="data[index1] === 0"
                                              class="bg-danger rounded px-2 py-1 text-white fa-sm">{{ __('inActive',this.lang)}}</span>
                                    </p>
                                    <p class="mb-0 font-12-sm text-truncate w-sm-35px"
                                       v-else-if="index1 !== 'image' && index1 !== 'background' && index1 !=='password'">
                                        {{ data[index1] ? truncateText(data[index1]) : __('Null', this.lang) }}</p>
                                    <p class="mb-0" v-else-if="index1 ==='password'">تم إخفاؤها</p>
                                    <img width="40" class="rounded-1 object-fit-contain d-none d-md-block" v-else-if="index1 ==='image'"
                                         :src="data[index1] ? data[index1] : '../assets/images/logo.png'" alt="">
                                    <img width="40" class="rounded-1 object-fit-contain d-none d-md-block" v-else-if="index1 ==='background'"
                                         :src="data[index1] ? data[index1] : '../assets/images/logo.png'" alt="">
                                </td>
                                <td class="bg-none mb-0 border-0 align-middle">
                                    <a v-if="show_sub" :href="show_sub+'/'+data.id" class="btn btn-primary me-1 px-2">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <div class="d-inline-block mb-2 mb-md-0">
                                        <delete_data v-if="deleteRequest" :__="__" :lang="lang" :rowId="data.id" :index="index"
                                                     :key="'delete-data'+index" :deleteRequest="deleteRequest"
                                                     @data-deleted="handleDataDeleted"></delete_data>
                                    </div>
                                    <update v-if="updateRequest && showData" :__="__" :lang="lang" :updateRowId="data.id"
                                            :indexUpdate="index" :key="'edit-data'+index" :showData="showData"
                                            :updateRequest="updateRequest" :data_update="data_update"
                                            @data-updated="handleDataUpdated"></update>
                                    <div class="d-block d-md-none" :id="'heading'+data.id">
                                        <button class="accordion-button btn collapsed-btn bg-none rounded-3 border-0 px-2 py-2 w-100 w-md-75 none-arrow"
                                                type="button"
                                                @click="!this.do_request_product[data.id] ? [ startPageProduct(data.id) , getProduct(data.id)] : ''"
                                                data-bs-toggle="collapse"
                                                :data-bs-target="'#collapseExample'+data.id"
                                                aria-expanded="false"
                                                style="background-color: rgb(244, 245, 249) !important; color: black;"
                                                :aria-controls="'#collapseExample'+data.id">
                                            <i class="fa-solid fa-plus me-1 font-12 align-middle" ></i><span class="font-12 align-middle">{{ __('Products',this.lang)}}</span>
                                        </button>
                                    </div>
                                </td>
                                <td class="bg-none mb-0 border-0 text-center align-middle">
                                    <div class="d-none d-md-block" :id="'heading'+data.id">
                                        <button class="accordion-button btn collapsed-btn me-3 bg-none rounded-3 border-0 px-3 py-2 w-100 w-md-75"
                                                type="button"
                                                @click="!this.do_request_product[data.id] ? [ startPageProduct(data.id) , getProduct(data.id)] : ''"
                                                data-bs-toggle="collapse"
                                                :data-bs-target="'#collapseExample'+data.id"
                                                aria-expanded="false"
                                                style="background-color: rgb(244, 245, 249) !important; color: black;"
                                                :aria-controls="'#collapseExample'+data.id">
                                            <i class="fa-solid fa-plus me-2 font-14" ></i><span class="font-14">{{ __('Show Products',this.lang)}}</span>
                                        </button>
                                    </div>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="accordion-collapse collapse" :id="'collapseExample'+data.id" :aria-labelledby="'heading'+data.id" data-bs-parent="#accordionExample" >
                            <div class="card-body px-1 py-1">
                                <div class="border-top">
                                    <div class="row justify-content-between pt-3">
                                        <div class="col-md-6 my-auto">
                                            <h4 class="font-16 text-primary px-2 mb-0"><i class="fas fa-list font-16"></i>
                                                {{ __('Products',this.lang)}} :</h4>
                                        </div>
                                        <div class="col-md-6 my-auto text-end">
                                            <button type="button" class="btn btn-primary px-2" @click="changeId(data.id)" data-bs-toggle="modal"
                                                    :data-bs-target="'#modalCreateDataProduct'+data.id">
                                                <i class="fas fa-plus align-items-center me-1"></i> <span
                                                class=" align-items-center">{{ __('Create',this.lang)}}</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="modal fade" :id="'modalCreateDataProduct'+data.id" tabindex="-1"
                                         :aria-labelledby="'modalCreateDataTitleProduct'+data.id" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" :id="'modalCreateDataTitleProduct'+data.id">{{ __('Create',this.lang)}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form @submit.prevent="AddProduct(data.id)" enctype="multipart/form-data">
                                                        <div class="row" v-if="product[data.id]">
                                                            <div class="col-12">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-6 text-center">
                                                                        <label
                                                                            :for="'file-upload-communication-comments-createimageProduct'+data.id"
                                                                            class="btn text-muted text-center p-1 mb-0 mx-auto position-relative bg-image-border p-0 bg-sub shadow-sm"><img
                                                                            :id="'selected-imageProduct'+data.id"
                                                                            class="w-100 h-100 object-fit-cover"
                                                                            style="display: none;" src=""
                                                                            alt="">
                                                                        </label>
                                                                        <small
                                                                            class="text-muted d-block py-2 font-12 fw-light">{{ __('Click to Add Your image',this.lang)}}</small>
                                                                        <input type="file" v-on:change="selectedFileProduct"
                                                                               class="input-file start-0 file-upload-communication-comments-create"
                                                                               :id="'file-upload-communication-comments-createimageProduct'+data.id">
                                                                        <div
                                                                            class="file-upload-filename-communication-comments-create mx-auto w-100 text-truncate"></div>
                                                                        <span v-if="flashMsg[data.id] ? flashMsg[data.id].image : false"
                                                                              class="text-danger fw-400 font-12">{{ flashMsg[data.id].image[0] }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group mb-2 text-start">
                                                                    <label
                                                                        class="fw-400 text-label font-12 text-primary">{{ __('Name', this.lang) }}</label>
                                                                    <input type="text" v-model="product[data.id].name"
                                                                           class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                    <span v-if="flashMsg[data.id] ? flashMsg[data.id].name : false"
                                                                          class="text-danger fw-400 font-12">{{ flashMsg[data.id].name[0] }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group mb-2 text-start">
                                                                    <label
                                                                        class="fw-400 text-label font-12 text-primary">{{ __('Name Arabic', this.lang) }}</label>
                                                                    <input type="text" v-model="product[data.id].name_ar"
                                                                           class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                    <span v-if="flashMsg[data.id] ? flashMsg[data.id].name_ar : false"
                                                                          class="text-danger fw-400 font-12">{{ flashMsg[data.id].name_ar[0] }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group mb-2 text-start">
                                                                    <label
                                                                        class="fw-400 text-label font-12 text-primary">{{ __('Description', this.lang) }}</label>
                                                                    <input type="text" v-model="product[data.id].description"
                                                                           class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                    <span v-if="flashMsg[data.id] ? flashMsg[data.id].description : false"
                                                                          class="text-danger fw-400 font-12">{{ flashMsg[data.id].description[0] }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group mb-2 text-start">
                                                                    <label
                                                                        class="fw-400 text-label font-12 text-primary">{{ __('Description Arabic', this.lang) }}</label>
                                                                    <input type="text" v-model="product[data.id].description_ar"
                                                                           class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                    <span v-if="flashMsg[data.id] ? flashMsg[data.id].description_ar : false"
                                                                          class="text-danger fw-400 font-12">{{ flashMsg[data.id].description_ar[0] }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group mb-2 text-start">
                                                                    <label
                                                                        class="fw-400 text-label font-12 text-primary">{{ __('Price', this.lang) }}</label>
                                                                    <input type="number" v-model="product[data.id].price"
                                                                           class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                    <span v-if="flashMsg[data.id] ? flashMsg[data.id].price : false"
                                                                          class="text-danger fw-400 font-12">{{ flashMsg[data.id].price[0] }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div><label class="form-label mt-2 w-100 font-12 text-primary">{{__('visible',this.lang)}}</label>
                                                                    <div
                                                                        class="form-check form-switch align-middle ms-0 ps-0">
                                                                        <input class="form-check-input ms-0 ps-0" v-model="product[data.id].visible"
                                                                               style="font-size: 20px;" type="checkbox"
                                                                        ></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer px-0 mb-0 pb-0 mt-2">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                    :id="'CloseCreateDataProduct'+data.id" data-bs-dismiss="modal">
                                                                {{ __('Close', this.lang) }}
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('Save changes', this.lang) }} <i v-if="this.loading_create_product[data.id]"
                                                                                                       class="fas fa-spinner ms-1 fa-spin text-white"></i></button>
                                                        </div>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 justify-content-center" style="min-height: 150px" :id="'showTable_easy-'+data.id">
                                        <div class="col-md-3 d-block d-md-none" v-for="(row , index5) in this.products[data.id]" :key="row.id">
                                            <div class="bg-white border border-light shadow-sm text-start rounded-10 position-relative mb-3">
                                                <div class="position-relative d-inline-block rounded-10 w-40 hover_image">
                                                    <div class="position-absolute rounded-10-left  w-100 h-100 overlay-2"></div>
                                                    <img :src="row.image ? row.image : '../../assets/site/images/logo.png'" :class="row.image ? 'cover d-inline-block  rounded-10-left border-end border-light w-100' : 'contain d-inline-block  rounded-10-left border-end border-light w-100 p-2'" alt="" height="90px">
                                                </div>
                                                <div class="w-60 d-inline-block align-top px-3 py-2 hover_image_60">
                                                    <h4 class="font-12 text-primary w-95px-sm text-truncate" v-if="this.lang === 'en'">{{ row.name }}</h4>
                                                    <h4 class="font-12 text-primary w-95px-sm text-truncate" v-else>{{ row.name_ar }}</h4>
                                                    <p class="mt-1 mb-2 font-12 w-135px-sm text-truncate" v-if="this.lang === 'en'">{{ row.description}}</p>
                                                    <p class="mt-1 mb-2 font-12 w-135px-sm text-truncate" v-else>{{ row.description_ar}}</p>
                                                </div>
                                                <div class="position-absolute end-0 bottom-0 bg-primary m-2 rounded-pill px-2 py-0  ">
                                                    <span class="font-12 mb-0 text-white">price : {{ row.price}}</span>
                                                </div>
                                                <div class="position-absolute top-0 end-0 px-2">
                                                    <button type="button" class="btn p-0" data-bs-toggle="modal"
                                                            data-bs-dismiss="modal" :data-bs-target="'#CloseDeleteProduct-'+data.id+row.id"
                                                            aria-label="Close"><i class="fas fa-times text-primary font-12"></i></button>
                                                    <button type="button" class="btn p-0 mx-2" data-bs-toggle="modal"
                                                            @click="editDataProduct(data.id,row.id, index5)"
                                                            :data-bs-target="'#modalUpdateData-'+data.id+row.id">
                                                        <i class="fa-solid fa-pencil text-primary font-12"></i>
                                                    </button>
                                                </div>
                                                <div class="modal fade" :id="'CloseDeleteProduct-'+data.id+row.id" tabindex="-1" style="display: none;" aria-hidden="true">
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
                                                                <button type="button" class="btn btn-outline-secondary" :id="'CloseDeleteDataProduct1-'+data.id+row.id" data-bs-dismiss="modal" >{{ __('Close',this.lang)}}</button>
                                                                <button type="button" class="btn btn-danger" @click="DestroyProduct(data.id,row.id,index5)">{{ __('Yes , Delete',this.lang)}}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" :id="'modalUpdateData-'+data.id+row.id" tabindex="-1" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" :id="'modalUpdateDataTitle-'+data.id+row.id">Update User</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" :id="'updateData_easy1-'+data.id+row.id">
                                                                <form @submit.prevent="UpdateDataProduct(data.id,row.id)" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-12 text-center">
                                                                            <div id="file-upload-filename"
                                                                                 class="text-right text-truncate w-75 name-file-upload position-absolute"></div>
                                                                            <label :for="'file-upload-communication-comments-update-product'+data.id+row.id"
                                                                                   class="btn text-muted text-center p-1 mb-0 mx-auto position-relative bg-image-border p-0 bg-sub shadow-sm">
                                                                                <img :id="'selected-update-image-product'+data.id+row.id" v-if="product_update.image === ''" class="w-100 h-100 object-fit-cover 123" style="display:none;" src="" alt="">
                                                                                <img :id="'selected-update-image-product'+data.id+row.id" v-else class="w-100 h-100 object-fit-cover" :src="product_update.image" alt="">
                                                                            </label>
                                                                            <small class="text-muted d-block py-2 font-12 fw-light">{{ __('Click to Add Your '+index+' Image' , this.lang) }}</small>

                                                                            <input type="file" @click="indexImageProduct(data.id,row.id)" v-on:change="selectedFileEditProduct" class="input-file start-0 file-upload-communication-comments-create"
                                                                                   :id="'file-upload-communication-comments-update-product'+data.id+row.id"/>
                                                                            <div class="file-upload-filename-communication-comments-create mx-auto w-100 text-truncate"></div>
                                                                            <span v-if="flashMsgUpdate['image']"
                                                                                  class="text-danger font-12 fw-400">{{ flashMsgUpdate['image'][0] }}</span>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group mb-2 text-start">
                                                                                <label
                                                                                    class="fw-400 text-label font-12 text-primary">{{ __('Name', this.lang) }}</label>
                                                                                <input type="text" v-model="product_update.name"
                                                                                       class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                                <span v-if="flashMsgUpdate[data.id] ? flashMsgUpdate[data.id].name : false"
                                                                                      class="text-danger fw-400 font-12">{{ flashMsgUpdate[data.id].name[0] }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group mb-2 text-start">
                                                                                <label
                                                                                    class="fw-400 text-label font-12 text-primary">{{ __('Name Arabic', this.lang) }}</label>
                                                                                <input type="text" v-model="product_update.name_ar"
                                                                                       class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                                <span v-if="flashMsgUpdate[data.id] ? flashMsgUpdate[data.id].name_ar : false"
                                                                                      class="text-danger fw-400 font-12">{{ flashMsgUpdate[data.id].name_ar[0] }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group mb-2 text-start">
                                                                                <label
                                                                                    class="fw-400 text-label font-12 text-primary">{{ __('Description', this.lang) }}</label>
                                                                                <input type="text" v-model="product_update.description"
                                                                                       class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                                <span v-if="flashMsgUpdate[data.id] ? flashMsgUpdate[data.id].description : false"
                                                                                      class="text-danger fw-400 font-12">{{ flashMsgUpdate[data.id].description[0] }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group mb-2 text-start">
                                                                                <label
                                                                                    class="fw-400 text-label font-12 text-primary">{{ __('Description Arabic', this.lang) }}</label>
                                                                                <input type="text" v-model="product_update.description_ar"
                                                                                       class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                                <span v-if="flashMsgUpdate[data.id] ? flashMsgUpdate[data.id].description_ar : false"
                                                                                      class="text-danger fw-400 font-12">{{ flashMsgUpdate[data.id].description_ar[0] }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group mb-2 text-start">
                                                                                <label
                                                                                    class="fw-400 text-label font-12 text-primary">{{ __('Price', this.lang) }}</label>
                                                                                <input type="number" v-model="product_update.price"
                                                                                       class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                                <span v-if="flashMsgUpdate[data.id] ? flashMsgUpdate[data.id].price : false"
                                                                                      class="text-danger fw-400 font-12">{{ flashMsgUpdate[data.id].price[0] }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 mb-2 text-start">
                                                                            <div>
                                                                                <label class="form-label mt-2 w-100">visible</label>
                                                                                <div class="form-check form-switch align-middle ms-0 ps-0">
                                                                                    <input class="form-check-input ms-0 ps-0" style="font-size: 20px" v-model="product_update.visible" type="checkbox" id="flexSwitchCheckChecked">
                                                                                </div>
                                                                            </div>
                                                                            <span v-if="flashMsgUpdate[data.id] ? flashMsgUpdate[data.id].visible : false"
                                                                                  class="text-danger fw-400 font-12">{{ flashMsgUpdate[data.id].visible[0] }}</span>
                                                                        </div>



                                                                    </div>
                                                                    <div class="modal-footer px-0 mb-0 pb-0 mt-2">
                                                                        <button type="button" class="btn btn-outline-secondary" :id="'CloseUpdateData1'+data.id+row.id" data-bs-dismiss="modal">{{ __('Close',this.lang)}}</button>
                                                                        <button type="submit" class="btn btn-primary">{{ __('Save changes',this.lang)}} <i v-if="loading_update_product" class="fas fa-spinner ms-1 fa-spin text-white"></i></button>
                                                                    </div>
                                                                </form>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div v-if="loading_product[data.id] === true" class="text-center">
                                            <i class="fas fa-spinner ms-1 fa-spin font-35 text-primary"></i>
                                        </div>
                                        <div class="col-md-12" v-if="products[data.id] && products[data.id].length === 0">
                                            <h4 class="p-3 text-primary mt-4 font-18">{{ __('Null Product in this Category',this.lang)}}</h4>
                                        </div>
                                        <div class="col-md-12  d-none d-md-block"  v-if="products[data.id] && products[data.id].length !== 0">
                                            <div class="border rounded-3 table-responsive shadow-sm my-3 py-2 px-3">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <td class="bg-none mb-0 border-0 border-bottom text-start font-12-sm wtd-10">
                                                            {{ __('id',this.lang)}}
                                                        </td>
                                                        <td class="bg-none mb-0 border-0 border-bottom text-start font-12-sm wtd-15">
                                                            {{ __('Name',this.lang)}}
                                                        </td>
                                                        <td class="bg-none mb-0 border-0 border-bottom text-start font-12-sm wtd-15">
                                                            {{ __('Description',this.lang)}}
                                                        </td>
                                                        <td class="bg-none mb-0 border-0 border-bottom text-start font-12-sm wtd-15">
                                                            {{ __('Visible',this.lang)}}
                                                        </td>
                                                        <td class="bg-none mb-0 border-0 border-bottom text-start font-12-sm wtd-15">
                                                            {{ __('Actions',this.lang)}}
                                                        </td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(product_loop , index_product) in this.products[data.id]" :key="product_loop.id">
                                                        <td class="bg-none mb-0 text-start py-3 align-middle ">
                                                            <span class="font-14 font-12-sm">{{index_product + 1}}</span>
                                                        </td>
                                                        <td class="bg-none mb-0 text-start py-3 align-middle  " v-if="this.lang ==='en'">
                                                            <span class="font-14 font-12-sm">{{ product_loop.name ? product_loop.name : __('Null',this.lang) }}</span>
                                                        </td>
                                                        <td class="bg-none mb-0 text-start py-3 align-middle  " v-if="this.lang ==='ar'">
                                                            <span class="font-14 font-12-sm">{{ product_loop.name_ar ? product_loop.name_ar : product_loop.name }}</span>
                                                        </td>
                                                        <td class="bg-none mb-0 text-start py-3 align-middle  " v-if="this.lang ==='en'">
                                                            <span class="font-14 font-12-sm">{{ product_loop.description ? product_loop.description : __('Null',this.lang) }}</span>
                                                        </td>
                                                        <td class="bg-none mb-0 text-start py-3 align-middle  " v-if="this.lang ==='ar'">
                                                            <span class="font-14 font-12-sm">{{ product_loop.description_ar ? product_loop.description_ar : __('Null',this.lang)  }}</span>
                                                        </td>
                                                        <td class="bg-none mb-0 text-start py-3 align-middle  ">
                                                            <span v-if="product_loop.visible === 1"
                                                                  class="text-success rounded px-1 px-md-2 py-1 border-success border font-12"><span
                                                                class="px-2 font-12-sm">{{ __('Active',this.lang)}}</span></span>
                                                            <span v-else
                                                                  class="text-danger rounded px-1 px-md-2 py-1 border-danger border font-12"><span
                                                                class="px-2 font-12-sm">{{ __('inActive',this.lang)}}</span></span>
                                                        </td>
                                                        <td class="bg-none mb-0 text-start py-3 align-middle ">
                                                            <button type="button" class="btn btn-primary px-2" data-bs-toggle="modal"
                                                                    data-bs-dismiss="modal" :data-bs-target="'#CloseDeleteProduct1-'+data.id+product_loop.id"
                                                                    aria-label="Close"><i class="fas fa-trash-alt text-white"></i></button>
                                                            <button type="button" class="btn btn-primary px-2 mx-0 mx-md-2 mt-2 mt-md-0" data-bs-toggle="modal"
                                                                    @click="editDataProduct(data.id,product_loop.id, index_product)"
                                                                    :data-bs-target="'#modalUpdateData1-'+data.id+product_loop.id">
                                                                <i class="fa-solid fa-edit text-white"></i>
                                                            </button>
                                                            <div class="modal fade" :id="'CloseDeleteProduct1-'+data.id+product_loop.id" tabindex="-1" style="display: none;" aria-hidden="true">
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
                                                                            <button type="button" class="btn btn-outline-secondary" :id="'CloseDeleteDataProduct-'+data.id+product_loop.id" data-bs-dismiss="modal" >{{ __('Close',this.lang)}}</button>
                                                                            <button type="button" class="btn btn-danger" @click="DestroyProduct(data.id,product_loop.id,index_product)">{{ __('Yes , Delete',this.lang)}}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade" :id="'modalUpdateData1-'+data.id+product_loop.id" :key="'modal'+data.id+product_loop.id" tabindex="-1" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" :id="'modalUpdateDataTitle-'+data.id+product_loop.id">{{ __('Update',this.lang)}}</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body" :id="'updateData_easy-'+data.id+product_loop.id">
                                                                            <form @submit.prevent="UpdateDataProduct(data.id,product_loop.id)" enctype="multipart/form-data">
                                                                                <div class="row">
                                                                                    <div class="col-12 text-center">
                                                                                        <div id="file-upload-filename"
                                                                                             class="text-right text-truncate w-75 name-file-upload position-absolute"></div>
                                                                                        <label :for="'file-upload-communication-comments-update-product'+data.id+product_loop.id"
                                                                                               class="btn text-muted text-center p-1 mb-0 mx-auto position-relative bg-image-border p-0 bg-sub shadow-sm">
                                                                                            <img :id="'selected-update-image-product'+data.id+product_loop.id" v-if="product_update.image === ''" class="w-100 h-100 object-fit-cover 123" style="display:none;" src="" alt="">
                                                                                            <img :id="'selected-update-image-product'+data.id+product_loop.id" v-else class="w-100 h-100 object-fit-cover" :src="product_update.image" alt="">
                                                                                        </label>
                                                                                        <small class="text-muted d-block py-2 font-12 fw-light">{{ __('Click to Add Your image' , this.lang) }}</small>

                                                                                        <input type="file" @click="indexImageProduct(data.id,product_loop.id)" v-on:change="selectedFileEditProduct" class="input-file start-0 file-upload-communication-comments-create"
                                                                                               :id="'file-upload-communication-comments-update-product'+data.id+product_loop.id"/>
                                                                                        <div class="file-upload-filename-communication-comments-create mx-auto w-100 text-truncate"></div>
                                                                                        <span v-if="flashMsgUpdate['image']"
                                                                                              class="text-danger font-12 fw-400">{{ flashMsgUpdate['image'][0] }}</span>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="form-group mb-2 text-start">
                                                                                            <label
                                                                                                class="fw-400 text-label font-12 text-primary">{{ __('Name', this.lang) }}</label>
                                                                                            <input type="text" v-model="product_update.name"
                                                                                                   class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                                            <span v-if="flashMsgUpdate[data.id] ? flashMsgUpdate[data.id].name : false"
                                                                                                  class="text-danger fw-400 font-12">{{ flashMsgUpdate[data.id].name[0] }}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="form-group mb-2 text-start">
                                                                                            <label
                                                                                                class="fw-400 text-label font-12 text-primary">{{ __('Name Arabic', this.lang) }}</label>
                                                                                            <input type="text" v-model="product_update.name_ar"
                                                                                                   class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                                            <span v-if="flashMsgUpdate[data.id] ? flashMsgUpdate[data.id].name_ar : false"
                                                                                                  class="text-danger fw-400 font-12">{{ flashMsgUpdate[data.id].name_ar[0] }}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="form-group mb-2 text-start">
                                                                                            <label
                                                                                                class="fw-400 text-label font-12 text-primary">{{ __('Description', this.lang) }}</label>
                                                                                            <input type="text" v-model="product_update.description"
                                                                                                   class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                                            <span v-if="flashMsgUpdate[data.id] ? flashMsgUpdate[data.id].description : false"
                                                                                                  class="text-danger fw-400 font-12">{{ flashMsgUpdate[data.id].description[0] }}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="form-group mb-2 text-start">
                                                                                            <label
                                                                                                class="fw-400 text-label font-12 text-primary">{{ __('Description Arabic', this.lang) }}</label>
                                                                                            <input type="text" v-model="product_update.description_ar"
                                                                                                   class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                                            <span v-if="flashMsgUpdate[data.id] ? flashMsgUpdate[data.id].description_ar : false"
                                                                                                  class="text-danger fw-400 font-12">{{ flashMsgUpdate[data.id].description_ar[0] }}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="form-group mb-2 text-start">
                                                                                            <label
                                                                                                class="fw-400 text-label font-12 text-primary">{{ __('Price', this.lang) }}</label>
                                                                                            <input type="number" v-model="product_update.price"
                                                                                                   class="form-control py-2 px-3 shadow-input mt-1 border-transparent bg-sub font-12 text-dark border-primary">
                                                                                            <span v-if="flashMsgUpdate[data.id] ? flashMsgUpdate[data.id].price : false"
                                                                                                  class="text-danger fw-400 font-12">{{ flashMsgUpdate[data.id].price[0] }}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6 mb-2 text-start">
                                                                                        <div>
                                                                                            <label class="form-label mt-2 w-100">visible</label>
                                                                                            <div class="form-check form-switch align-middle ms-0 ps-0">
                                                                                                <input class="form-check-input ms-0 ps-0" style="font-size: 20px" v-model="product_update.visible" type="checkbox" id="flexSwitchCheckChecked">
                                                                                            </div>
                                                                                        </div>
                                                                                        <span v-if="flashMsgUpdate[data.id] ? flashMsgUpdate[data.id].visible : false"
                                                                                              class="text-danger fw-400 font-12">{{ flashMsgUpdate[data.id].visible[0] }}</span>
                                                                                    </div>



                                                                                </div>
                                                                                <div class="modal-footer px-0 mb-0 pb-0 mt-2">
                                                                                    <button type="button" class="btn btn-outline-secondary" :id="'CloseUpdateData'+data.id+product_loop.id" data-bs-dismiss="modal">{{ __('Close',this.lang)}}</button>
                                                                                    <button type="submit" class="btn btn-primary">{{ __('Save changes',this.lang)}} <i v-if="loading_update_product" class="fas fa-spinner ms-1 fa-spin text-white"></i></button>
                                                                                </div>
                                                                            </form>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="showSuccessMsg">
                                <alert-message :successMsg="this.successMsg"></alert-message>
                            </div>
                        </div>
                    </div>
                    <div v-if="loading === true" class="text-center mb-2">
                        <i class="fas fa-spinner ms-1 fa-spin font-35 text-primary"></i>
                    </div>
                    <div class="d-flex w-100 justify-content-between">
                        <div>
                            <button class="btn bg-secondary px-2 py-1 border-0 d-block text-center text-white fa-md  fw-400" type="button" @click="getData(all_data.prev_page_url)" :disabled="!all_data.prev_page_url">{{ __('Previous Page',this.lang)}}</button>
                        </div>
                        <div>
                            <button class="btn bg-primary px-2 py-1 border-0 d-block text-center text-white fa-md  fw-400" type="button" @click="getData(all_data.next_page_url)" :disabled="!all_data.next_page_url">{{ __('Next Page',this.lang)}}</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</template>
<script>
import Update from "../layout/update.vue";
import Delete_data from "../layout/delete_data.vue";
import Table_data from "../layout/table_data.vue";
import Create from "../layout/create.vue";
import AlertMessage from "../layout/alertMessage.vue";

export default {
    components: {AlertMessage, Create, Table_data, Delete_data, Update},
    props: [
        'data',
        'create_request',
        'dataRequest',
        'showData',
        'updateRequest',
        'data_update',
        'deleteRequest',
        'data_request_product',
        'create_request_product',
        'edit_request_product',
        'delete_request_product',
        'show_data_product',
        'lang',
        'show_sub',
        '__',
        'initial_data',
        'sub_id',
    ],
    data() {
        const product = [{
            name:'',
            name_ar:'',
            description:'',
            description_ar:'',
            price:'',
            visible:''
        }]
        return {
            all_data: {
                data: [],
                current_page: 1,
                last_page: 1,
                next_page_url: null,
                prev_page_url: null
            },
            header: [],
            image: '',
            newImage: [[]],
            image_product: {},
            flashMsg: [],
            flashMsgUpdate: {},
            loading: false,
            finished: false,
            loading_product: {},
            loading_create_product: {},
            loading_update_product: false,
            finished_product: {},
            index_loop: 1,
            pageProduct: 1,
            category_id:null,
            products:[],
            product_update:[],
            product,
            showModal:false,
            do_request_product: {},
            page_product:{},
            category_id_modal:null,
            showSuccessMsg:false,
            successMsg:'',
        }
    },

    methods: {
        async plusPageProduct(id) {
            this.page_product[id]++;
            this.do_request_product[id] = true
            await this.getProduct(id)
        },
        async getData(url = this.dataRequest) {
            this.loading = true;
            const config = {
                headers: {'_id': this.sub_id}
            }
            axios.post(url, [], config)
                .then(response => {
                    this.all_data = response.data.data;
                    console.log(this.all_data);
                    this.header = response.data.data_header;
                    this.loading = false;
                })
                .catch((err) => {
                    this.loading = false;
                    console.log(err);
                });
        },
        async getProduct(id){
            document.getElementById('showTable_easy-'+id).style.opacity='0';
            this.product[id] ={
                name:'',
                name_ar:'',
                description:'',
                description_ar:'',
                price:'',
                visible:''
            };
            if (this.do_request_product[id] === true) {
                this.loading_product[id] = true;
                const config = {
                    headers: {'_id': this.sub_id}
                }
                axios.post(this.data_request_product + '/' + id, [], config)
                    .then(response => {
                        this.products[id] = response.data.data;
                        this.loading_product[id] = false;
                        document.getElementById('showTable_easy-'+id).style.transition='1.2s ease';
                        document.getElementById('showTable_easy-'+id).style.opacity='1';
                    })
                    .catch((err) => {
                        this.loading_product[id] = false;
                        console.log(err);
                    });
            }
        },
        async AddProduct(id) {
            document.getElementById("selected-imageProduct"+id).src = "";
            document.getElementById('selected-imageProduct'+id).style.display = 'none';
            this.loading_create_product[id] = true;
            // this.flashMsg[id] = [];
            let formData = new FormData();
            formData.append('image', this.image_product[id] ? this.image_product[id] : '');
            formData.append('name', this.product[id].name ? this.product[id].name : '');
            formData.append('name_ar', this.product[id].name_ar ? this.product[id].name_ar : '');
            formData.append('description', this.product[id].description ? this.product[id].description : '');
            formData.append('description_ar', this.product[id].description_ar ? this.product[id].description_ar : '');
            formData.append('price', this.product[id].price ? this.product[id].price : '');
            formData.append('visible', this.product[id].visible ? this.product[id].visible : '');
            const config = {
                headers: {'content-type': 'multipart/form-data','Accept-Language': this.lang,'_id':id}
            }
            axios.post(this.create_request_product, formData, config)
                .then((res) => {
                    this.products[id].unshift(res.data.data)
                    this.showModal = false;
                    this.product[id] ={
                        name:'',
                        name_ar:'',
                        description:'',
                        description_ar:'',
                        price:'',
                        visible:''
                    };
                    this.image_product[id] = ''
                    document.getElementById('CloseCreateDataProduct'+id).click();
                    this.loading_create_product[id] = false;
                    if (res.data.status == 200 && res.data.success == true) {
                        this.showSuccessMsg = true;
                        this.successMsg = res.data.message;
                        setTimeout(() => this.showSuccessMsg = false, 2500);
                    }
                    this.flashMsg[id] = []
                })
                .catch((err) => {
                    this.loading_create_product[id] = false;
                    this.flashMsg[id] = err.response.data.message;
                });
        },
        async editDataProduct(category_id,product_id, index) {
            document.getElementById('updateData_easy-'+category_id+product_id).style.opacity='0';
            document.getElementById('updateData_easy1-'+category_id+product_id).style.opacity='0';
            axios.post(this.show_data_product + '/' + product_id,[],{
                headers:{'Accept-Language': this.lang}
            }).then((res) => {
                this.product_update = res.data;
                this.key_index = index;
                document.getElementById('updateData_easy-'+category_id+product_id).style.transition='1.2s ease';
                document.getElementById('updateData_easy-'+category_id+product_id).style.opacity='1';
                document.getElementById('updateData_easy1-'+category_id+product_id).style.transition='1.2s ease';
                document.getElementById('updateData_easy1-'+category_id+product_id).style.opacity='1';
            })
                .catch((err) => {
                    console.log(err);
                });
        },
        async UpdateDataProduct(category_id,product_id) {
            this.loading_update_product = true;
            let formDataEditProduct = new FormData();
            formDataEditProduct.append('image', this.newImage[this.categoryIndexImageInput] ? this.newImage[this.categoryIndexImageInput] : '');
            formDataEditProduct.append('name', this.product_update['name'] ? this.product_update['name'] : '');
            formDataEditProduct.append('name_ar', this.product_update['name_ar'] ? this.product_update['name_ar'] : '');
            formDataEditProduct.append('description', this.product_update['description'] ? this.product_update['description'] : '');
            formDataEditProduct.append('description_ar', this.product_update['description_ar'] ? this.product_update['description_ar'] : '');
            formDataEditProduct.append('price', this.product_update['price'] ? this.product_update['price'] : '');
            formDataEditProduct.append('visible', this.product_update['visible'] ? this.product_update['visible'] : '');
            const config = {
                headers: {'content-type': 'multipart/form-data','Accept-Language': this.lang}
            }
            axios.post(this.edit_request_product + '/' + product_id, formDataEditProduct, config)
                .then((res) => {
                    this.products[category_id][this.key_index] = res.data.data;
                    this.products[category_id][this.key_index].id = res.data.id;
                    this.key_index = null;
                    document.getElementById('CloseUpdateData'+category_id+product_id).click();
                    document.getElementById('updateData_easy-'+category_id+product_id).style.opacity='0';
                    document.getElementById('CloseUpdateData1'+category_id+product_id).click();
                    document.getElementById('updateData_easy1-'+category_id+product_id).style.opacity='0';
                    this.loading_update_product = false;
                    if (res.data.status == 200 && res.data.success == true) {
                        this.showSuccessMsg = true;
                        this.successMsg = res.data.message;
                        setTimeout(() => this.showSuccessMsg = false, 2500);
                    }
                    this.flashMsgUpdate[category_id] = []
                })
                .catch((err) => {
                    console.log(err)
                    this.flashMsgUpdate[category_id] = []
                    this.flashMsgUpdate[category_id] = err.response.data.message;
                    this.loading_update_product = false;
                });
        },
        async DestroyProduct(category_id, product_id, index) {
            const config = {
                headers: {'Accept-Language':this.lang ,'category_id':category_id}
            }
            axios.post(this.delete_request_product + '/' + product_id,[],config)
                .then((res) => {
                    this.products[category_id].splice(index, 1);
                    document.getElementById('CloseDeleteDataProduct1-' + category_id + product_id).click();
                    document.getElementById('CloseDeleteDataProduct-' + category_id + product_id).click();
                    this.showSuccessMsg = true;
                    this.successMsg = res.data.message;
                    setTimeout(() => this.showSuccessMsg = false, 2500);
                })
                .catch((err) => {
                    console.log(err);
                    this.flashMsg[category_id] = err.response.data.message;
                });
        },
        changeId(id){
            this.category_id_modal = id ;
        },
        selectedFileProduct(e) {
            this.image_product[this.category_id_modal] = e.target.files[0];
            document.getElementById("selected-imageProduct"+this.category_id_modal).src = URL.createObjectURL(this.image_product[this.category_id_modal]);
            // Show the image
            document.getElementById('selected-imageProduct'+this.category_id_modal).style.display = 'block';
        },
        selectedFileEditProduct(event) {
            this.newImage[this.categoryIndexImageInput] = event.target.files[0];
            document.getElementById("selected-update-image-product"+this.categoryIndexImageInput+this.productIndexImageInput).src= URL.createObjectURL(this.newImage[this.categoryIndexImageInput]);
            document.getElementById('selected-update-image-product'+this.categoryIndexImageInput+this.productIndexImageInput).style.display = 'block';
        },
        indexImageProduct(category_id, product_id) {
            this.productIndexImageInput = product_id;
            this.categoryIndexImageInput = category_id;
        },
        handleDataDeleted(row_index) {
                this.all_data.data = [];
                this.loading = true;
                this.getData(this.all_data.prev_page_url);
        },
        handleDataCreated(newData) {
            this.all_data.data = [];
            this.loading = true;
            this.getData();
        },
        handleDataUpdated(params) {
            this.all_data.data[params[0]] = params[1];
            // this.all_data.splice(--row_index, 1)
        },
        truncateText(text) {
            if (text === null) {
                return this.$t('Null', this.lang);
            }
            return text.length > 15 ? text.substring(0, 15) + '...' : text;
        },
        async startPageProduct(id) {
            this.products[id] = [];
            this.do_request_product[id] = true
        },
        async finishProduct(id) {
            this.finished_product[id] = true;
            this.do_request_product[id] = true;
        },
    },
    computed: {
        startIndex() {
            return (this.all_data.current_page - 1) * this.all_data.per_page;
        }
    },
    async created() {
        await this.getData();
    },
}
</script>
