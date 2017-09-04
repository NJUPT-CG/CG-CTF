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
            questions: new Map(),
            Web: [],
            Re: [],
            Pwn: [],
            Crypto: [],
            Misc: []
        }),
        methods: {
            loadData(tab) {
                axios.get(`${apiRoot}challenges`, {
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
        },
        created() {
            let currentTab = location.href.split('/challenges#')[1];
            this.setActiveTab(currentTab);
            eventHub.$on('activeTab', (activeTab) => {
                this.setActiveTab(activeTab);
            })
        },
        components: {
            tabBar,
            challengeCard
        }
    }
</script>
