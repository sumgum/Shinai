<template>
    <header class="l-header l-header--default">
        <div class="l-header__menu" :class="toggleMenu" @click="toggleMenuFlg">
            <span class="l-header__trigger l-header__trigger--top" :class="toggleTrigerTop"></span>
            <span class="l-header__trigger l-header__trigger--center" :class="toggleTrigerCenter"></span>
            <span class="l-header__trigger l-header__trigger--bottom" :class="toggleTrigerBottom"></span>
        </div>

        <nav class="l-header__nav" :class="toggleNav">
            <ul class="l-header__nav__menu" v-if="isLogin">
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
            <ul class="l-header__nav__menu" v-if="!isLogin">
                <li class="l-header__nav__menu__item">
                    <a class="l-header__nav__menu__item__link" href="/top">TOP</a>
                </li>
                <li class="l-header__nav__menu__item">
                    <a class="l-header__nav__menu__item__link" href="/login">ログイン</a>
                </li>
                <li class="l-header__nav__menu__item">
                    <a class="l-header__nav__menu__item__link" href="/register">会員登録</a>
                </li>
            </ul>
        </nav>

        <h1 class="l-header__title">しないチェッカー</h1>

        <div>
            <p class="l-header__icon" v-if="isLogin"><a href="/study" class="l-header__icon__element"><i class="fa fa-clock-o" aria-hidden="true"></i></a></p>
        </div>
    </header>

</template>

<script>
export default {
    props: {
        authcheck: Boolean,
        logout: String,
        mypage: String,
    },
    data: function() {
        return {
            menuFlg: false,
            isLogin: this.authcheck
        }
    },
    methods: {
        toggleMenuFlg: function() {
            let flg = this.menuFlg
            this.menuFlg = !flg
        },
        doLogout: function() {
            axios.post(this.logout)
            .then(function(response) {
                setTimeout(() => {
                    window.location.href = '/top'
                }, 1000);
            })
        },
    },
    computed: {
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
    },
}
</script>
