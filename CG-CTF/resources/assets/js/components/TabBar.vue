<template>
    <div id="tabs">
        <mu-tabs :value="activeTab" @change="handleTabChange">
            <mu-tab value="Web" :href="routes.get('web')" title="Web"/>
            <mu-tab value="Re" :href="routes.get('re')" title="Re"/>
            <mu-tab value="Pwn" :href="routes.get('pwn')" title="Pwn"/>
            <mu-tab value="Crypto" :href="routes.get('crypto')" title="Crypto"/>
            <mu-tab value="Misc" :href="routes.get('misc')" title="Misc"/>
        </mu-tabs>
    </div>
</template>

<script>
    import eventHub from "../eventHub"

    export default {
        name: "TabBar",
        data() {
            return {
                activeTab: 'Web',
                routes: routeList
            }
        },
        methods: {
            handleTabChange(val) {
                this.activeTab = val
                eventHub.$emit('activeTab', this.activeTab)
            }
        },
        created() {
            this.activeTab = location.href.split('/challenges/')[1]
        }
    }
</script>
