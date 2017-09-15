<template>
    <div id="drawer">
        <mu-drawer :open="open" @close="toggle()" :docked="docked">
            <mu-appbar title="CG CTF"></mu-appbar>
            <mu-list>
                <mu-list-item :open="false" title="Challenges" toggleNested>
                    <mu-list-item title="Web" :href="routeList.get('challenges.Web')" @click="setActiveTab('Web')"
                                  slot="nested"/>
                    <mu-list-item title="Re" :href="routeList.get('challenges.Re')" @click="setActiveTab('Re')"
                                  slot="nested"/>
                    <mu-list-item title="Pwn" :href="routeList.get('challenges.Pwn')" @click="setActiveTab('Pwn')"
                                  slot="nested"/>
                    <mu-list-item title="Crypto" :href="routeList.get('challenges.Crypto')"
                                  @click="setActiveTab('Crypto')" slot="nested"/>
                    <mu-list-item title="Misc" :href="routeList.get('challenges.Misc')" @click="setActiveTab('Misc')"
                                  slot="nested"/>
                </mu-list-item>
                <mu-list-item title="Scoreboard" :href="routeList.get('scoreboard')"/>
                <mu-list-item title="History" :href="routeList.get('score')"/>
                <mu-list-item title="Notice" :href="routeList.get('notice')"/>
                <mu-divider/>
                <mu-list-item title="About" :href="routeList.get('about')"/>
            </mu-list>
        </mu-drawer>
    </div>
</template>

<script>
    import eventHub from "../eventHub"

    export default {
        name: "drawer",
        data: () => ({
            open: false,
            docked: true,
            routeList
        }),
        methods: {
            toggle(flag) {
                this.open = !this.open;
                this.docked = !flag;
            },
            setActiveTab(tab) {
                eventHub.$emit('activeTab', tab)
            }
        },
        created() {
            eventHub.$on('drawer.toggle', () => {
                this.toggle(true)
            })
        }
    }
</script>