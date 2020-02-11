<template>
    <div class="p-tweet">
        <div class="p-tweet__img-container">
            <div class="p-tweet__img-container__element">
                <a :href="this.mypageURL">
                    <img :src="userImage" alt="" class="c-img--s c-img--s--tweet">
                </a>
            </div>
            <p v-if="!this.isUser" class="p-tweet__img-container__element" @click="clickStar">
                <i class="fa fa-star" :class="favClass" aria-hidden="true"></i>
            </p>
            <p v-if="this.isUser" class="p-tweet__img-container__element" @click="clickEdit">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </p>
        </div>
        <div class="p-tweet__text-container">
            <p class="p-tweet__text-container__element">{{userName}}</p>
            <textarea
            class="p-tweet__text-container__element p-tweet__text-container__edit"
            v-if="isUser&&isEdit"
            v-model="textareaVal" ref="adjust_textarea"
            @keydown="adjustHeight"></textarea>
            <p v-if="!isEdit" class="p-tweet__text-container__element">{{textareaVal}}</p>
            <p class="p-tweet__text-container__element">{{created_at}}</p>
        </div>
    </div>
</template>

<script>
axios.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest',
  'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
};

    export default {
        props: {
            user_id: Number,
            comment: String,
            study_flg: Number,
            has_comment: Number,
            created_at: String,
            user_detail: Object,
            fav_flg: Boolean,
            auth_id: Number,
            study_id: Number,
            update: String,
        },
        data: function() {
            return {
                textareaVal: this.comment,
                isUser: (this.user_id === this.auth_id),
                isEdit: false,
            }
        },
        methods: {
            clickStar: function() {
                this.$emit('click-star', this.user_id)
            },
            clickEdit: function() {
                const oldFlg = this.isEdit
                this.isEdit = !oldFlg
                if(this.isEdit === false) {
                    this.updateComment()
                }
            },
            updateComment() {
                axios.post(this.update, this.request)
            },
            adjustHeight() {
                const textarea = this.$refs.adjust_textarea
                const resetHeight = new Promise(function(resolve) {
                    resolve(textarea.style.height = 'auto')
                })
                resetHeight.then(function() {
                    textarea.style.height = textarea.scrollHeight + 'px'
                })
            },
        },
        computed: {
            favClass: function() {
                if(this.fav_flg) {
                    return 'fa-star'
                } else {
                    return 'fa-star-o'
                }
            },
            userName: function() {
                if(this.user_detail.user_name !== null) {
                    return this.user_detail.user_name
                } else {
                    return '名無し'
                }
            },
            userImage: function() {
                if(this.user_detail.prof_image !== null) {
                    if(this.user_detail.prof_image !== ''){
                        return this.user_detail.prof_image
                    } else {
                        return 'storage/app/public/image/sample/sample.jpeg'
                        // return 'storage/image/sample/sample.jpeg'
                    }
                } else {
                    return 'storage/app/public/image/sample/sample.jpeg'
                    // return 'storage/image/sample/sample.jpeg'
                }
            },
            mypageURL: function() {
                let url = '/Shinai/mypage/' + String(this.user_id)
                return url
            },
            hasComment: function() {
                let url = true
                if(!this.textareaVal){url = false}
                return url
            },
            request: function() {
                return {
                    id: this.study_id,
                    user_id: this.user_id,
                    comment: this.textareaVal,
                    has_comment: this.hasComment
                }
            }
        },
    }
</script>
