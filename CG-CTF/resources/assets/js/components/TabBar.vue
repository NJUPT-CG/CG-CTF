<template>
    <div id="tabs">
        <mu-tabs :value="activeTab" @change="handleTabChange" full-width>
            <mu-tab value="Web" :href="routeList.get('challenges.Web')" title="Web"> Web</mu-tab>
            <mu-tab value="Re" :href="routeList.get('challenges.Re')" title="Re">Re</mu-tab>
            <mu-tab value="Pwn" :href="routeList.get('challenges.Pwn')" title="Pwn">Pwn</mu-tab>
            <mu-tab value="Crypto" :href="routeList.get('challenges.Crypto')" title="Crypto">Crypto</mu-tab>
            <mu-tab value="Misc" :href="routeList.get('challenges.Misc')" title="Misc">Misc</mu-tab>
        </mu-tabs>
    </div>
</template>

<script>
    import eventHub from "../eventHub"

    export default {
        name: "TabBar",
        data: () => ({
            activeTab: 'Web',
            routeList
        }),
        methods: {
            handleTabChange(val) {
                this.activeTab = val;
                eventHub.$emit('activeTab', this.activeTab)
            }
        },
        created() {
            this.activeTab = location.href.split('/challenges#')[1]
            eventHub.$on('activeTab', (activeTab) => {
                this.activeTab = activeTab;
            })
        }
    }
</script>
