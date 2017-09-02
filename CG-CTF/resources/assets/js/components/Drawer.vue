<template>
    <div id="drawer">
        <mu-drawer :open="open" @close="toggle()">
            <mu-appbar title="CG CTF"></mu-appbar>
            <mu-list @itemClick="docked ? '' : toggle()">
                <mu-list-item :open="false" title="Challenges" toggleNested>
                    <a href=""><mu-list-item title="Web" slot="nested"/></a>
                    <mu-list-item title="Re" slot="nested"/>
                    <mu-list-item title="Pwn" slot="nested"/>
                    <mu-list-item title="Crypto" slot="nested"/>
                    <mu-list-item title="Misc" slot="nested"/>
                </mu-list-item>
                <mu-list-item title="Scoreboard"/>
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
                this.open = !this.open
            })
        }
    }
</script>