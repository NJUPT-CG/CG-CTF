<template>
    <div class="challenge-card" v-if="show">
        <mu-paper class="challenge-item" :zDepth="1">
            <mu-appbar :title="challenge.title"/>
            <mu-float-button icon="add" mini @click="open"/>
            <mu-card-actions>
                <mu-flat-button :label="challenge.score + 'pt'"/>
                <mu-flat-button v-if="challenge.passed" class="passed" label="passed" @click="showSolvers"/>
            </mu-card-actions>
        </mu-paper>

        <mu-dialog v-if="dialog" :open="dialog" :title="challenge.title" @close="close">
            <mu-card>
                <mu-card-actions class="solvers-wrapper">
                    <mu-flat-button :label="'solvers: ' + challenge.solversCount" @click="showSolvers"/>
                </mu-card-actions>
                <mu-card-title :subTitle="challenge.class + ' ' + challenge.score + 'pt'"/>
                <mu-divider/>
                <mu-card-text v-html="challenge.description"></mu-card-text>
                <mu-card-actions>
                    <mu-flat-button v-if="challenge.url" label="题目地址" @click="reference"/>
                </mu-card-actions>
                <mu-text-field label="FLAG" v-model="flagInput" labelFloat/>
            </mu-card>
            <mu-flat-button v-if="challenge.power" slot="actions" :href="routeList.get('edit') +'/' + challenge.id"
                            primary label="编辑"/>
            <mu-flat-button v-if="challenge.power" slot="actions" @click="deleteChallenge" primary label="删除"/>
            <mu-flat-button slot="actions" @click="close" primary label="取消"/>
            <mu-flat-button slot="actions" primary @click="submitFlag" label="提交"/>
        </mu-dialog>

        <mu-dialog v-if="solversDialog" :open="solversDialog" title="ALL SOLVERS" @close="solversClose">
            <mu-card>
                <mu-list>
                    <mu-sub-header>
                        <span class="titleDesc">solver</span>
                        <span class="subtitleDesc">time</span>
                    </mu-sub-header>
                    <mu-list-item v-for="(item, index) in solvers" :key="index">
                        <span class="title">{{ item.name }}</span>
                        <span class="subtitle">{{ item.pivot.created_at }}</span>
                    </mu-list-item>
                </mu-list>
            </mu-card>
            <mu-flat-button slot="actions" @click="solversClose" primary label="关闭"/>
        </mu-dialog>

        <mu-popup position="top" :overlay="false" :class="{ 'popup-success': submitStat }" popupClass="demo-popup-top"
                  :open="topPopup">
            {{ result }}
        </mu-popup>
    </div>
</template>

<script>
    import eventHub from '../eventHub'

    export default {
        name: "challengeCard",
        props: ['challengeBaseInfo'],
        data: () => ({
            challenge: {},
            dialog: false,
            solversDialog: false,
            topPopup: false,
            flagInput: null,
            result: "false",
            submitStat: false,
            show: true,
            solvers: null,
            routeList,
        }),
        created() {
            this.challenge = this.challengeBaseInfo;
        },
        methods: {
            open() {
                if (!this.challenge.class) {
                    axios.get(`${apiRoot}challenge/detail/${this.challenge.id}`)
                        .then(response => {
                            this.challenge = Object.assign(this.challenge, response.data);
                            this.challenge.description = window.md.render(this.challenge.description);
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
            solversClose() {
                this.solversDialog = false;
            },
            submitFlag() {
                axios.post(`${apiRoot}challenge/${this.challenge.id}`, {'flag': this.flagInput})
                    .then(response => {
                        if (typeof (response.data) !== 'boolean') {
                            this.result = response.data;
                            //  return 'already passed', so submit status is true
                            this.submitStat = true;
                        } else {

                            if (response.data) {
                                this.result = '成功！';
                                this.challenge.passed = true;
                                this.challenge.solvers++;
                            } else {
                                this.result = '失败！';
                            }
                            this.submitStat = response.data
                        }
                        this.showPopup()
                    })
                    .catch(() => {
                        this.result = 'Please Login';
                        this.showPopup()
                    })
            },
            deleteChallenge() {
                let id = this.challenge.id;

                axios.delete(`${apiRoot}challenge/${this.challenge.id}`)
                    .then(response => {
                        if (typeof (response.data) !== 'boolean') {
                            this.result = response.data;
                            // return Administrator permission is required, so submit status is false
                            this.submitStat = false
                        } else {
                            this.result = response.data ? '删除成功' : '删除失败';
                            this.submitStat = response.data;
                            if (response.data) {
                                this.close();
                                this.show = false;
                            }
                        }
                        eventHub.$emit('challenge.delete', id);
                        this.showPopup()
                    })
                    .catch(() => {
                        this.result = 'Please login';
                        this.showPopup();
                    })
            },
            getSolvers() {
                axios.get(`${apiRoot}challenge/solvers/${this.challenge.id}`)
                    .then(response => {
                        this.solvers = response.data;
                        this.solversDialog = true;
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            reference() {
                window.open(this.challenge.url, "_blank")
            },
            showPopup() {
                this.topPopup = true
            },
            showSolvers() {
                if (this.solvers === null) {
                    this.getSolvers()
                } else {
                    this.solversDialog = true
                }
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
