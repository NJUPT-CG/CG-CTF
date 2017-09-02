<template>
    <div id="tabs">
        <mu-tabs :value="activeTab" @change="handleTabChange">
            <mu-tab value="Web" href="/challenges/Web" title="Web"/>
            <mu-tab value="Re" href="/challenges/Re" title="Re"/>
            <mu-tab value="Pwn" href="/challenges/Pwn" title="Pwn"/>
            <mu-tab value="Crypto" href="/challenges/Crypto" title="Crypto"/>
            <mu-tab value="Misc" href="/challenges/Misc" title="Misc"/>
        </mu-tabs>
    </div>
</template>

<script>
    import eventHub from "../eventHub"

    export default {
        name: "TabBar",
        data() {
            return {
                activeTab: 'Web'
            }
        },
        methods: {
            handleTabChange(val) {
                this.activeTab = val
                eventHub.$emit('activeTab', this.activeTab)
                sessionStorage.setItem('activeTab', this.activeTab)
            }
        },
        created() {
            this.activeTab = sessionStorage.getItem('activeTab') || location.href.split('/')[4]
        }
    }
</script>
