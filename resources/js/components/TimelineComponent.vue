<template>
    <div class="l-main l-main--default">
        <div class="p-container--category">
            <category-search-component
            v-for="category in categories"
            :key="category.id"
            v-bind="category"
            @category-element-event="clickCategory">
            </category-search-component>
        </div>

        <div>
            <div class="p-container--timeline">
                <transition-group>
                <timeline-contents-component
                v-for="(studyRecord, index) in this.showRecords"
                :key="studyRecord.id"
                v-bind="studyRecord"
                :index="index"
                :auth_id="auth_id"
                :study_id="studyRecord.id"
                @click-star="favHandle">
                </timeline-contents-component>
                </transition-group>

                <div class="p-container--paginate">
                    <paginate-component
                    :maxPageNum="this.maxPageNum"
                    @paginateHandler="getPageNum">
                    </paginate-component>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['studyRecords', 'auth_id'],
        data: function() {
            return {
                categories: [
                    {id: 0, name: 'isAllRecords', text: 'すべて', isChecked: true},
                    {id: 1, name: 'isMyRecords', text: '自分', isChecked: true},
                    {id: 2, name: 'isFavRecords', text: 'フォロー', isChecked: true},
                    {id: 3, name: 'etcRecords', text: 'その他', isChecked: true},
                ],
                formContent: '',
                // totalRecordNum: this.studyRecords.length,
                showRecordNum: 10,
                currentPageNum: 1,
                ope_studyRecords: this.studyRecords,
                initialized_ope_studyRecords: this.studyRecords,
                authID: this.auth_id,
            }
        },
        methods: {
            clickCategory: function(id) {
                this.sortToggleCategory(id)
                this.ope_studyRecords = this.initialized_ope_studyRecords
                this.ope_studyRecords = this.ope_studyRecords.filter(function(elm) {
                    if(this.categories[0].isChecked === true) {
                        return true
                    } else {
                        // // チェックが付いていない処理内容のレコードをfilterではじく
                        if(this.categories[1].isChecked === false && elm.user_id === this.authID) {
                            return false
                        }
                        if(this.categories[2].isChecked === false && elm.fav_flg === true) {
                            return false
                        }
                        if(this.categories[3].isChecked === false && elm.fav_flg === false && elm.user_id !== this.authID) {
                            return false
                        }
                        return true
                    }
                }, this)
            },
            sortToggleCategory: function(id) {
                let arr = this.categories,
                    oldFlg = arr[id].isChecked;
                if(id === 0) { // すべてボタンがクリックされた場合
                    if(arr[id].isChecked === true) {
                        arr[id].isChecked = !oldFlg
                    } else {
                        for(let i=0,l=arr.length;i<l;i++) {
                            if(arr[i].isChecked === false) {
                                arr[i].isChecked = !oldFlg
                            }
                        }
                    }
                } else { // すべてボタン以外のボタンがクリックされた場合
                    if(arr[id].isChecked === true) {
                        if(arr[0].isChecked === true){
                            arr[0].isChecked = false
                            arr[id].isChecked = !oldFlg
                        } else {
                            arr[id].isChecked = !oldFlg
                        }
                    } else {
                        arr[id].isChecked = !oldFlg
                        // すべてボタン以外がtrueならすべてボタンもtrueにする
                        if(arr.slice(1).every(elm => elm.isChecked === true)){
                            arr[0].isChecked = true
                        }
                    }

                }
            },
            getPageNum: function(num) {
                this.currentPageNum = num
            },
            favHandle: function(id) {
                this.toggleFavRecords(id)
                axios.post('/timeline/favorite', {fav_user_id: id})
            },
            toggleFavRecords: function(id) {
                this.ope_studyRecords.forEach(function(element, index, array) {
                    if(element.user_id === id) {
                        // fav_userの切り替え
                        let oldFlg = element.fav_flg
                        Vue.set(element, 'fav_flg', !oldFlg)
                        return
                    } else {
                        return
                    }
                }, this)
            },
        },
        computed: {
            maxPageNum: function() {
                return Math.ceil(this.totalRecordNum / 10)
            },
            totalRecordNum: function() {
                return this.ope_studyRecords.length
            },
            currentMinRecordNum: function() {
                return this.currentPageNum * 10 - 10
            },
            currentMaxRecordNum: function() {
                let val = 0
                if(this.currentPageNum !== this.maxPageNum) {
                    val = this.currentPageNum * 10
                } else {
                    val = this.totalRecordNum
                }
                return val
            },
            showRecords: function() {
                return this.ope_studyRecords.slice(this.currentMinRecordNum, this.currentMaxRecordNum)
            }
        },
        created() {
            //studyRecordsからope_studyRecordsに変更
            this.ope_studyRecords.forEach(function(elm, i){
                if(elm.fav_users_fav_users[0] != null) {
                    if(elm.fav_users_fav_users[0].fav_flg === 1) {
                        Vue.set(elm, 'fav_flg', true)
                    } else {
                        Vue.set(elm, 'fav_flg', false)
                    }
                } else {
                    Vue.set(elm, 'fav_flg', false)
                }
            }, this)
        }
    }
</script>

<style>
    .v-enter-active {
        transition: opacity 1s;
    }
    .v-enter, .v-leave-to {
        opacity: 0;
    }
</style>
