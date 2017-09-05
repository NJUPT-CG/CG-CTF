<template>
    <div id="challenges">
        <tab-bar></tab-bar>
        <div class="Web-wrapper" v-show="activeTab === 'Web'">
            <challenge-card v-for="(question, index) in Web" :key="index"
                            :challengeBaseInfo="question"></challenge-card>
        </div>
        <div class="Re-wrapper" v-show="activeTab === 'Re'">
            <challenge-card v-for="(question, index) in Re" :key="index"
                            :challengeBaseInfo="question"></challenge-card>
        </div>
        <div class="Pwn-wrapper" v-show="activeTab === 'Pwn'">
            <challenge-card v-for="(question, index) in Pwn" :key="index"
                            :challengeBaseInfo="question"></challenge-card>
        </div>
        <div class="Crypto-wrapper" v-show="activeTab === 'Crypto'">
            <challenge-card v-for="(question, index) in Crypto" :key="index"
                            :challengeBaseInfo="question"></challenge-card>
        </div>
        <div class="Misc-wrapper" v-show="activeTab === 'Misc'">
            <challenge-card v-for="(question, index) in Misc" :key="index"
                            :challengeBaseInfo="question"></challenge-card>
        </div>
    </div>
</template>

<script>
    import tabBar from './TabBar.vue';
    import challengeCard from './ChallengeCard.vue'
    import eventHub from "../eventHub"

    export default {
        name: "Challenges",
        props: ['login'],
        data: () => ({
            activeTab: 'Web',
            loadStatus: {},
            Web: [],
            Re: [],
            Pwn: [],
            Crypto: [],
            Misc: []
        }),
        methods: {
            loadData(tab) {
                axios.get(`${apiRoot}challenges?class=${tab}`, {
                    params: {
                        class: tab
                    }
                })
                    .then((response) => {
                        this[tab] = response.data;
                        this.loadStatus[tab] = true;
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            },
            setActiveTab(tab) {
                if (!this.hasData(tab)) {
                    this.loadData(tab)
                }
                this.activeTab = tab
            },
            hasData(tab) {
                return !!this.loadStatus[tab]
            },
            justWaitForACoffee() {
                return new Promise(resolve => {
                    setTimeout(() => resolve('☕'), 2000); // it takes 2 seconds to make coffee
                });
            },
            async loadAllData() {
                let tabs = ['Web', 'Re', 'Pwn', 'Crypto', 'Misc'];
                try {
                    const coffee = await this.justWaitForACoffee();
                    // then we grab some data
                    let promises = [];
                    for (let tab of tabs) {
                        promises.push(axios(`${apiRoot}challenges?class=${tab}`))
                    }
                    // await all promises to come back and destructure the result into their own variables
                    const [webResponse, reResponse, pwnResponse, cryptoResponse, MiscResponse] = await Promise.all(promises);
                    [this.Web, this.Re, this.Pwn, this.Crypto, this.Misc] = [webResponse.data, reResponse.data, pwnResponse.data, cryptoResponse.data, MiscResponse.data];
                    for (let tab of tabs) {
                        this.loadStatus[tab] = true;
                    }
                } catch (error) {
                    console.error(error);
                }
            }
        },
        created() {
            let currentTab = location.href.split('/challenges#')[1];
            this.setActiveTab(currentTab);
            eventHub.$on('activeTab', (activeTab) => {
                this.setActiveTab(activeTab);
            })
        },
        mounted() {
            this.loadAllData()
        },
        components: {
            tabBar,
            challengeCard
        }
    }
</script>
