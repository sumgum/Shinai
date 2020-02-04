<template>
    <div>
        <div class="l-main--study">
            <div class="p-container--study p-container--study--left">
                <div class="p-time-log p-time-log--study" :class="studyClass" @click="sortProcess(1)">
                    する <br class="u-display--slg">{{timeFormats[1]}}
                </div>
            </div>
            <div class="p-container--study p-container--study--right">
                <div class="p-time-log p-time-log--rest" :class="restClass" @click="sortProcess(2)">
                    しない <br class="u-display--slg">{{timeFormats[2]}}
                </div>
                <div class="p-time-log p-time-log--etc" :class="etcClass" @click="sortProcess(3)">
                    そのた <br class="u-display--slg">{{timeFormats[3]}}
                </div>
                <div class="p-time-log p-time-log--switch" :class="switchClass" @click="sortProcess(0)">
                    {{switchMsg}} <br class="u-display--slg">{{timeFormats[0]}}
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
    }
    }

    export default {
        props: {
            logout: String,
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
        },
    }
</script>
