<template>
    <div>
        <transition name="modal">
        <div class="p-modal" v-if="modalFlg">
            <div class="p-modal__mask">
                <div class="p-modal__container">
                    <div class="p-modal__header">
                        <h2 class="p-modal__header__title">今日の結果</h2>
                        <p class="p-modal__header__btn" @click="resetResult()">
                            記録破棄
                            </p>
                    </div>
                    <div class="p-modal__body">
                        <div class="p-modal__body__result">
                            <p class="p-modal__body__result__elm p-modal__body__result__elm--study">{{timeFormats[1]}}</p>
                            <p class="p-modal__body__result__elm p-modal__body__result__elm--rest">{{timeFormats[2]}}</p>
                            <p class="p-modal__body__result__elm p-modal__body__result__elm--etc">{{timeFormats[3]}}</p>
                        </div>
                        <form class="p-modal__body__form" action="" method="POST">
                            <label class="p-modal__body__form__label" for="">コメント</label>
                            <textarea class="p-modal__body__form__comment" name="" id="" cols="40" rows="10" v-model="comment"></textarea>
                            <div class="p-modal__body__form__word-num">{{commentLength}}/400</div>
                            <div class="p-modal__body__form__btn-container">
                                <p><a @click.prevent="closeModal" href="" class="c-btn">戻る</a></p>
                            <input type="submit" class="c-btn" value="記録" @click.prevent="sendForm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </transition>

        <header class="l-header" :class="headerClass">
            <div class="l-header__menu" :class="toggleMenu" @click="toggleMenuFlg">
                <span class="l-header__trigger l-header__trigger--top" :class="toggleTrigerTop"></span>
                <span class="l-header__trigger l-header__trigger--center" :class="toggleTrigerCenter"></span>
                <span class="l-header__trigger l-header__trigger--bottom" :class="toggleTrigerBottom"></span>
            </div>

            <nav class="l-header__nav" :class="toggleNav">
                <ul class="l-header__nav__menu">
                    <li class="l-header__nav__menu__item">
                        <a class="l-header__nav__menu__item__link" href="/study">記録する</a>
                    </li>
                    <li class="l-header__nav__menu__item">
                        <a class="l-header__nav__menu__item__link" :href="mypage">マイページ</a>
                    </li>
                    <li class="l-header__nav__menu__item">
                        <a class="l-header__nav__menu__item__link" href="/timeline">学習記録一覧</a>
                    </li>
                    <li class="l-header__nav__menu__item">
                        <a class="l-header__nav__menu__item__link" href="" @click.prevent="doLogout">ログアウト</a>
                    </li>
                    <li class="l-header__nav__menu__item">
                        <a class="l-header__nav__menu__item__link" href="/withdraw">退会</a>
                    </li>
                </ul>
            </nav>

            <h1 class="l-header__title">しないチェッカー</h1>

            <p class="l-header__icon"><a :href="mypage" class="l-header__icon__element"><i class="fa fa-user" aria-hidden="true"></i></a></p>
        </header>

        <transition>
            <div v-if="flashMessage" class="c-flash-msg c-flash-msg--success js-flash">
                {{flashMessage}}
            </div>
        </transition>

        <div class="l-main--study">
            <div class="p-container--study p-container--study--left">
                <div class="p-time-log p-time-log--study" :class="studyClass" @click="sortProcess(1)">
                    する {{timeFormats[1]}}
                </div>
            </div>
            <div class="p-container--study p-container--study--right">
                <div class="p-time-log p-time-log--rest" :class="restClass" @click="sortProcess(2)">
                    しない {{timeFormats[2]}}
                </div>
                <div class="p-time-log p-time-log--etc" :class="etcClass" @click="sortProcess(3)">
                    そのた {{timeFormats[3]}}
                </div>
                <div class="p-time-log p-time-log--switch" :class="switchClass" @click="sortProcess(0)">
                    {{switchMsg}} {{timeFormats[0]}}
                </div>
            </div>

        </div>
    </div>
</template>

<script>
axios.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest',
  'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
};

    function initialState() {
        return {
            items: [
                {id: 0,timeFlg: false, timerObj: null, hour: 0, min: 0, sec: 0, total: 0, opeState: 0},
                {id: 1,timeFlg: false, timerObj: null, hour: 0, min: 0, sec: 0, total: 0},
                {id: 2,timeFlg: false, timerObj: null, hour: 0, min: 0, sec: 0, total: 0},
                {id: 3,timeFlg: false, timerObj: null, hour: 0, min: 0, sec: 0, total: 0},
            ],
            modalFlg: false,
            comment: '',
            menuFlg: false,

    }
    }

    export default {
        props: {
            logout: String,
            mypage: String,
            flashMessage: String,
        },
        data: function() {
            return initialState()
        },
        methods: {
            countTime: function(i) {
                if(this.items[i].sec >= 59) {
                    this.items[i].min ++;
                    this.items[i].sec = 0;
                    if(this.items[i].min >= 59) {
                        this.items[i].hour ++;
                        this.items[i].min = 0;
                    }
                } else {
                    this.items[i].sec ++;
                }
                this.items[i].total ++;
            },
            searchObj: function(i) {
                return this.items.find(obj => obj.id == i);
            },
            startTime: function(i) {
                let self = this;
                let target = this.searchObj(i);
                if(target.timeFlg === true) {
                    return
                } else {
                    target.timerObj = setInterval(function() {self.countTime(i)}, 1000)
                    target.timeFlg = true
                }
            },
            startTimer: function(i) {
                if(i === 0) {
                    this.items[0].opeState = 2
                    this.startTime(0)
                    this.startTime(2)
                } else {
                    this.items[0].opeState = i
                    this.startTime(0)
                    for(var j=1;j<4;j++) {
                        if(j === i) {
                            this.startTime(j)
                        } else {
                            this.stopTime(j)
                        }
                    }
                }
            },
            stopTime: function(i) {
                if(i === 0) {
                    this.searchObj(i).opeState = 0
                    for(var j=0;j<4;j++) {
                        let target = this.searchObj(j)
                        if(target.timeFlg === true) {
                            clearInterval(target.timerObj)
                            target.timeFlg = false
                        } else {
                            continue
                        }
                    }
                } else {
                    let target = this.searchObj(i)
                    clearInterval(target.timerObj)
                    target.timeFlg = false
                }
            },
            stopTimer: function(i) {
                if(i === 0) {
                    this.stopTime(0)
                    this.showModal()
                } else if(i === 2) {
                    this.stopTime(2)
                    this.startTimer(1)
                } else {
                    return
                }
            },
            sortProcess: function(i) {
                (this.searchObj(i).timeFlg)? this.stopTimer(i):this.startTimer(i)
            },
            toggleClass: function(obj) {
                let oldAObj = obj;
                obj.map(function(elm, i) {
                    elm = !this.oldObj[i]
                }, this)
            },
            showModal: function() {
                this.modalFlg = true
            },
            closeModal: function() {
                this.modalFlg = false
            },
            resetResult: function() {
                Object.assign(this.$data, initialState())
                this.closeModal()
            },
            sendForm: function() {
                axios.post('/study', this.request)
                .then(function(response) {
                    setTimeout(function() {
                        window.location.href = response.data
                    }, 100)
                }).catch(function(error) {
                })
            },
            toggleMenuFlg: function() {
                let flg = this.menuFlg
                this.menuFlg = !flg
            },
            doLogout: function() {
                axios.post(this.logout)
                .then(function(response) {
                    setTimeout(() => {
                        window.location.href = '/top'
                    }, 100);
                })
            },
        },
        computed: {
            timeFormats: function() {
                return this.items.map(
                    function(obj) {
                        let timeStrings = [
                            obj.hour.toString(),
                            obj.min.toString(),
                            obj.sec.toString(),
                        ].map(function(str) {
                            if(str.length < 2) {
                                return "0" + str;
                            } else {
                                return str;
                            }
                        })
                        return timeStrings[0] + ":" + timeStrings[1] + ":" + timeStrings[2]
                    }
                )
            },
            studyClass: function() {
                return {
                    'p-time-log--study--on': (this.items[1].timeFlg) ? true:false,
                    'p-time-log--study--off': (!this.items[1].timeFlg) ? true:false,
                }
            },
            restClass: function() {
                return {
                    'p-time-log--rest--on': (this.items[2].timeFlg) ? true:false,
                    'p-time-log--rest--off': (!this.items[2].timeFlg) ? true:false,
                }
            },
            etcClass: function() {
                return {
                    'p-time-log--etc--on': (this.items[3].timeFlg) ? true:false,
                    'p-time-log--etc--off': (!this.items[3].timeFlg) ? true:false,
                }
            },
            switchClass: function() {
                let state = this.items[0].opeState
                return {
                    'p-time-log--switch--default': (state === 0) ? true:false,
                    'p-time-log--switch--study': (state === 1) ? true:false,
                    'p-time-log--switch--rest': (state === 2) ? true:false,
                    'p-time-log--switch--etc': (state === 3) ? true:false,
                }
            },
            switchMsg: function() {
                if(this.items[0].opeState === 0) {
                    return "開始 "
                } else {
                    return "終了 "
                }
            },
            headerClass: function() {
                let state = this.items[0].opeState
                return {
                    'l-header--default': (state === 0) ? true:false,
                    'l-header--study': (state === 1) ? true:false,
                    'l-header--rest': (state === 2) ? true:false,
                    'l-header--etc': (state === 3) ? true:false,
                }
            },
            request: function() {
                return {
                    study_time: this.items[1].total,
                    rest_time: this.items[2].total,
                    etc_time: this.items[3].total,
                    total_time: this.items[0].total,
                    comment: this.comment,
                    study_flg: true,
                    has_comment: (this.comment !== '')? true:false,
                }
            },
            toggleMenu: function() {
                return {
                    'l-header__menu--active': (this.menuFlg)? true:false,
                }
            },
            toggleNav: function() {
                return {
                    'l-header__nav--active': (this.menuFlg)? true:false,
                }
            },
            toggleTrigerTop: function() {
                return {
                    'l-header__trigger--top--active': (this.menuFlg)? true:false,
                }
            },
            toggleTrigerCenter: function() {
                return{
                    'l-header__trigger--center--active': (this.menuFlg)? true:false,
                }
            },
            toggleTrigerBottom: function() {
                return {
                    'l-header__trigger--bottom--active': (this.menuFlg)? true:false,
                }
            },
            commentLength: function() {
                return this.comment.length
            }
        },
    }
</script>

<style scoped>
    .modal-enter-active, .modal-leave-active {
        transition: opacity .3s;
    }
    .modal-enter, .modal-leave-to {
        opacity: 0;
    }
</style>
