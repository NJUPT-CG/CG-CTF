<template>
    <div id="drawer">
        <mu-drawer :open="open" @close="toggle()" :docked="docked">
            <mu-appbar title="CG CTF"></mu-appbar>
            <mu-list>
                <mu-list-item :open="false" title="Challenges" toggleNested>
                    <mu-list-item title="Web" href="/challenges/Web" slot="nested"/>
                    <mu-list-item title="Re" href="/challenges/Re" slot="nested"/>
                    <mu-list-item title="Pwn" href="/challenges/Pwn" slot="nested"/>
                    <mu-list-item title="Crypto" href="/challenges/Crypto" slot="nested"/>
                    <mu-list-item title="Misc" href="/challenges/Misc" slot="nested"/>
                </mu-list-item>
                <mu-list-item title="Scoreboard" href="/scoreboard" />
                <mu-divider/>
                <mu-list-item title="About"/>
                <mu-list-item title="close" @click="toggle()"/>
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
            }
        },
        methods: {
            toggle(flag) {
                this.open = !this.open
                this.docked = !flag
                console.log(this.open)
            }
        },
        created() {
            eventHub.$on('drawer.toggle', () => {
                this.toggle(true)
            })
        }
    }
</script>