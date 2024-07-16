<template>
    <div class="table-responsive text-nowrap">
        <table class="table" >
            <thead>
            <tr>
                <template v-for="head in header">
                    <th v-if="head !== 'password'">{{ __(head,this.lang) }}</th>
                </template>
                <th v-if="deleteRequest || updateRequest">Actions</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            <tr v-if="this.all_data.length > 0" v-for="(data , index) in this.all_data" :key="data.id">
                <td v-for="(k,index1) in data">
                    <p class="mb-0" v-if="index1 === 'id'">{{ ++index }}</p>
                    <p class="mb-0" v-else-if="index1 === 'visible'">
                        <span v-if="data[index1] === 1" class="bg-success rounded px-3 py-1 text-white fa-sm">Active</span>
                        <span v-if="data[index1] === 0" class="bg-danger rounded px-3 py-1 text-white fa-sm">inActive</span>
                    </p>
                    <p class="mb-0" v-else-if="index1 === 'status'">
                        <span v-if="data[index1] === 1" class="bg-success rounded px-3 py-1 text-white fa-sm">Active</span>
                        <span v-if="data[index1] === 0" class="bg-danger rounded px-3 py-1 text-white fa-sm">inActive</span>
                    </p>
                    <p class="mb-0" v-else-if="this.ck_text && index1 === 'description'" v-html="data[index1] ? truncateText(data[index1]) : '-'"></p>
                    <p class="mb-0" v-else-if="index1 !== 'image' && index1 !== 'background' && index1 !=='password'">{{ data[index1] ? truncateText(data[index1]) : __('Null',this.lang) }}</p>
                    <p class="mb-0" v-else-if="index1 ==='password'">تم إخفاؤها</p>
                    <img width="40" class="rounded-1 object-fit-contain" v-else-if="index1 ==='image'" :src="data[index1] ? data[index1] : '../assets/images/logo.png'" alt="">
                    <img width="40" class="rounded-1 object-fit-contain" v-else-if="index1 ==='background'" :src="data[index1] ? data[index1] : '../assets/images/logo.png'" alt="">
                </td>
                <td v-if="deleteRequest ||( updateRequest && showData) || show_sub">
                    <a v-if="show_sub" :href="show_sub+'/'+data.id" class="btn btn-primary me-1 px-2">
                        <i class="fas fa-eye"></i>
                    </a>
                    <delete_data v-if="deleteRequest" :__="__" :lang="lang" :rowId="data.id" :index="index" :key="'delete-data'+index" :deleteRequest="deleteRequest" @data-deleted="handleDataDeleted"></delete_data>
                    <update v-if="updateRequest && showData" :__="__" :lang="lang" :check_lang="check_lang" :updateRowId="data.id" :indexUpdate="index" :key="'edit-data'+index" :showData="showData" :updateRequest="updateRequest" :data_update="data_update" @data-updated="handleDataUpdated"></update>
                </td>
            </tr>
            <tr v-if="this.all_data.length === 0">
                <td colspan="4">
                    <p class="text-danger">Data Is Null</p>
                </td>
            </tr>
            </tbody>
        </table>

        <div v-if="loading === true" id="loader" class="w-100 text-center my-3">
            <i class="fas fa-spinner fa-spin text-primary fa-2x" style="color: #797D90;"></i>
        </div>
        <div class="border-top py-2">
            <button type="button" class="btn bg-primary px-2 py-1 d-block text-center text-white fa-md  fw-400 mx-auto" v-if="!finished && !loading" @click="plusPage()">Show More</button>
        </div>

    </div>
</template>
<script>
import Update from "./update.vue";
import Delete_data from "./delete_data.vue";

export default {
    components: {Delete_data, Update},
    props: [
        'dataRequest',
        'showData',
        'updateRequest',
        'data_update',
        'deleteRequest',
        'lang',
        'show_sub',
        'check_lang',
        '__',
        'initial_data',
        'sub_id',
        'ck_text',
    ],
    data() {
        return {
            all_data: this.initial_data || [],
            header:[],
            flashMsg: [],
            loading: false,
            finished: false,
            page: 1,
        }
    },
    watch: {
        initial_data: {
            handler(newVal) {
                if (newVal.length === 0){
                    this.all_data = newVal; // Update the component's data when the prop changes
                }else {
                    this.all_data = this.all_data.concat(newVal[newVal.length - 1]);
                }

            },
            deep: true,
            immediate: true
        }
    },

    methods: {
        async plusPage(){
            this.page++;
            await this.getData()
        },
        async getData() {
            this.loading = true;
            const config = {
                headers: {'_id':this.sub_id}
            }
            axios.post(this.dataRequest + '?page=' + this.page , [], config)
                .then(response => {
                    this.all_data = this.all_data.concat(response.data.data.data);
                    this.header = response.data.data_header;
                    this.loading = false;
                    if (response.data.data_count === this.all_data.length) {
                        this.finished = true;
                    }
                })
                .catch((err) => {
                    this.loading = false;
                    console.log(err);
                });
        },
        handleDataDeleted(row_index){
            console.log(row_index);
            this.all_data.splice(--row_index, 1)
        },
        handleDataUpdated(params){
            this.all_data[--params[0]] = params[1];
            // this.all_data.splice(--row_index, 1)
        },
        truncateText(text) {
            if (text === null) {
                return this.$t('Null', this.lang);
            }
            return text.length > 15 ? text.substring(0, 15) + '...' : text;
        }
    },
    async created() {
        await this.getData();
    },
}
</script>
