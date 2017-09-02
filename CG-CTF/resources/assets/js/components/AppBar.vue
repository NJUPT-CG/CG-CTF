<template>
    <mu-appbar title="CG CTF">
        <mu-icon-button @click="drawerToggle" icon="menu" slot="left"/>
        <mu-icon-menu icon="more_vert" slot="right">
            <mu-menu-item v-if="!loginStatus" title="login" :href="routes.get('login')"/>
             <mu-menu-item v-if="!loginStatus" title="register" :href="routes.get('register')"/>
            <mu-menu-item v-if="loginStatus" title="logout" @click="logout"/>
            <mu-menu-item v-if="loginStatus" title="score" :href="routes.get('score')"/>
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
                loginStatus: this.login,
                routes: routeList
            }
        },
        methods: {
            drawerToggle() {
                eventHub.$emit('drawer.toggle')
            },
            logout() {
                axios.post(this.routes.get('logout')).then(() => {
                    return location = this.routes.get('login')
                })
            }
        }
    }
</script>
