<template>
    <div class="challenge-card">
        <mu-paper class="challenge-item" :zDepth="1">
            <mu-appbar :title="challenge.title"/>
            <mu-float-button icon="add" mini @click="open"/>
            <mu-card-actions>
                <mu-flat-button :label="challenge.score + 'pt'"/>
            </mu-card-actions>
        </mu-paper>

        <mu-dialog v-if="dialog" :open="dialog" :title="challenge.title" @close="close">
            <mu-card>
                <mu-card-title :subTitle="challenge.class + ' ' + challenge.score + 'pt'"/>
                <mu-divider/>
                <mu-card-text>
                    {{ challenge.description }}
                </mu-card-text>
                <mu-card-actions>
                    <mu-flat-button label="题目地址" @click="reference"/>
                </mu-card-actions>
                <mu-text-field label="FLAG" v-model="flagInput" labelFloat/>
            </mu-card>

            <mu-flat-button slot="actions" @click="close" :href="'/edit/' + challenge.id" primary label="编辑"/>
            <mu-flat-button slot="actions" @click="close" primary label="删除"/>
            <mu-flat-button slot="actions" @click="close" primary label="取消"/>
            <mu-flat-button slot="actions" primary @click="submit()" label="提交"/>
        </mu-dialog>
        <mu-popup position="top" :overlay="false" :class="{ 'popup-success': submitStat }"
                  popupClass="demo-popup-top" :open="topPopup">
            {{ result }}
        </mu-popup>
    </div>
</template>

<script>
    export default {
        name: "challengeCard",
        props: ['challengeBaseInfo'],
        data: () => ({
            challenge: {},
            dialog: false,
            topPopup: false,
            flagInput: null,
            result: "false",
            submitStat: false,
        }),
        created() {
            this.challenge = this.challengeBaseInfo;
        },
        methods: {
            open() {
                if (!this.challenge.description) {
                    axios.get(`${apiRoot}challenge/detail/${this.challenge.id}`)
                        .then(response => {
                            this.challenge = Object.assign(this.challenge, response.data);
                            this.flagInput = null;
                            this.dialog = true;
                        })
                        .catch((error) => {
                            console.log(error)
                        })
                } else {
                    this.flagInput = null;
                    this.dialog = true;
                }
            },
            close() {
                this.dialog = false
            },
            submit() {
                axios.post(`${apiRoot}challenge/${this.challenge.id}`, {'flag': this.flagInput})
                    .then(response => {
                        if (typeof(response.data) !== 'boolean') {
                            this.result = response.data;
                            this.submitStat = false;
                        } else {
                            this.result = response.data ? '成功！' : '我最失败！';
                            this.submitStat = response.data
                        }
                        this.showPopup()
                    })
                    .catch(() => {
                        this.result = 'Please Login';
                        this.showPopup()
                    })
            },
            reference() {
                window.open(this.challenge.url, "_blank")
            },
            showPopup() {
                this.topPopup = true
            }
        },
        watch: {
            topPopup(val) {
                if (val) {
                    setTimeout(() => {
                        this.topPopup = false
                    }, 2000)
                }
            }
        }
    }
</script>
