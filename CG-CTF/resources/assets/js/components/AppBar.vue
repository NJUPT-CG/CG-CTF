<template>
    <mu-appbar title="CG CTF">
        <mu-icon-button @click="drawerToggle" icon="menu" slot="left"/>
        <mu-icon-menu icon="more_vert" slot="right">
            <mu-menu-item v-if="!loginStatus" title="login" href="/login"/>
            <mu-menu-item v-if="loginStatus" title="logout" @click="logout"/>
        </mu-icon-menu>
    </mu-appbar>
</template>

<script>
    import eventHub from "../eventHub"

    export default {
        name: "AppBar",
        props: ["login"],
        data() {
            return {
                loginStatus: this.login
            }
        },
        methods: {
            drawerToggle() {
                eventHub.$emit('drawer.toggle')
            },
            logout() {
                axios.post('/logout').then(() => {
                    return location = '/login'
                })
            }
        },
        created() {
            console.log(typeof this.loginStatus)
            console.log(this.loginStatus)
        }
    }
</script>
