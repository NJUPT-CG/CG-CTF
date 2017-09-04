<template>
    <div id="tabs">
        <mu-tabs :value="activeTab" @change="handleTabChange">
            <mu-tab value="Web" :href="routeList.get('challenges.Web')" title="Web"/>
            <mu-tab value="Re" :href="routeList.get('challenges.Re')" title="Re"/>
            <mu-tab value="Pwn" :href="routeList.get('challenges.Pwn')" title="Pwn"/>
            <mu-tab value="Crypto" :href="routeList.get('challenges.Crypto')" title="Crypto"/>
            <mu-tab value="Misc" :href="routeList.get('challenges.Misc')" title="Misc"/>
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
