<template>
    <div id="drawer">
        <mu-drawer :open="open" @close="toggle()" :docked="docked">
            <mu-appbar title="CG CTF"></mu-appbar>
            <mu-list>
                <mu-list-item :open="false" title="Challenges" toggleNested>
                    <mu-list-item title="Web" :href="routes.get('web')" slot="nested"/>
                    <mu-list-item title="Re" :href="routes.get('re')" slot="nested"/>
                    <mu-list-item title="Pwn" :href="routes.get('pwn')" slot="nested"/>
                    <mu-list-item title="Crypto" :href="routes.get('crypto')" slot="nested"/>
                    <mu-list-item title="Misc" :href="routes.get('misc')" slot="nested"/>
                </mu-list-item>
                <mu-list-item title="Scoreboard" :href="routes.get('scoreBoard')" />
                <mu-divider/>
                <mu-list-item title="About" :href="routes.get('about')"/>
            </mu-list>
        </mu-drawer>
    </div>
</template>

<script>
    import eventHub from "../eventHub"

    export default {
        name: "drawer",
        data() {
            return {
                open: false,
                docked: true,
                routes: routeList
            }
        },
        methods: {
            toggle(flag) {
                this.open = !this.open
                this.docked = !flag
            }
        },
        created() {
            eventHub.$on('drawer.toggle', () => {
                this.toggle(true)
            })
        }
    }
</script>