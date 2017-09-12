<template>
    <mu-appbar title="CG CTF">
        <mu-icon-button @click="drawerToggle" icon="menu" slot="left"/>
        <mu-icon-menu icon="more_vert" slot="right">
            <mu-menu-item v-if="!login" title="login" :href="routeList.get('login')"/>
            <mu-menu-item v-if="!login" title="register" :href="routeList.get('register')"/>
            <mu-menu-item v-if="login" title="score" :href="routeList.get('score')"/>
            <mu-menu-item v-if="login" title="profile" :href="routeList.get('profile')"/>
            <mu-menu-item v-if="isadmin" title="newchallenge" :href="routeList.get('create')"/>
            <mu-menu-item v-if="isadmin" title="publish Notice" :href="routeList.get('publishNotice')"/>
            <mu-menu-item v-if="login" title="logout" @click="logout"/>
        </mu-icon-menu>
    </mu-appbar>
</template>

<script>
    import eventHub from "../eventHub"

    export default {
        name: "AppBar",
        props: ["login", "isadmin"],
        data: () => ({
            routeList
        }),
        methods: {
            drawerToggle() {
                eventHub.$emit('drawer.toggle')
            },
            logout() {
                axios.post(this.routeList.get('logout'))
                    .then(() => {
                        return location = this.routeList.get('login')
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }
        }
    }
</script>
