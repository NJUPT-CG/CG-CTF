<template>
    <mu-appbar title="CG CTF">
        <mu-icon-button @click="drawerToggle" icon="menu" slot="left"/>
        <mu-icon-menu icon="more_vert" slot="right">
            <a href="/login">
                <mu-menu-item title="login"/>
            </a>
            <mu-menu-item title="logout"/>
        </mu-icon-menu>
    </mu-appbar>
</template>

<script>
    import eventHub from "../eventHub"

    export default {
        name: "AppBar",
        methods: {
            drawerToggle() {
                eventHub.$emit('drawer.toggle')
            }
        }
    }
</script>
