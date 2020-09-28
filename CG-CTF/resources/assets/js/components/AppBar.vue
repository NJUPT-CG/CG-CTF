<template>
    <mu-appbar title="CGCTF" color="primary">
<!--         <mu-button @click="drawerToggle" icon="menu" slot="left"/> -->
          <mu-button icon slot="left" @click="drawerToggle">
            <mu-icon value="menu"></mu-icon>
            </mu-button>
        <mu-menu icon="more_vert" slot="right">
            <mu-button flat>MENU</mu-button>
            <mu-list slot="content">
            <mu-list-item button v-if="!login" :href="routeList.get('login')">
            <mu-list-item-title>Login</mu-list-item-title>
            </mu-list-item>
            <!-- <mu-list-item v-if="!login" title="login" :href="routeList.get('login')"/> -->
            <mu-list-item button v-if="!login" :href="routeList.get('register')">
            <mu-list-item-title>Register</mu-list-item-title>
            </mu-list-item>
           <!--  <mu-list-item v-if="!login" title="register" :href="routeList.get('register')"/> -->
            <mu-list-item button v-if="login" :href="routeList.get('score')">
            <mu-list-item-title>Score</mu-list-item-title>
            </mu-list-item>
           <!--  <mu-list-item v-if="login" title="score" :href="routeList.get('score')"/> -->
            <mu-list-item button v-if="login" :href="routeList.get('profile')">
            <mu-list-item-title>Profile</mu-list-item-title>
            </mu-list-item>
           <!--  <mu-list-item v-if="login" title="profile" :href="routeList.get('profile')"/> -->
            <mu-list-item button v-if="isadmin" :href="routeList.get('create')">
            <mu-list-item-title>New Challenge</mu-list-item-title>
            </mu-list-item>
           <!--  <mu-list-item v-if="isadmin" title="newchallenge" :href="routeList.get('create')"/> -->
            <mu-list-item button v-if="isadmin" :href="routeList.get('publishNotice')">
            <mu-list-item-title>Publish Notice</mu-list-item-title>
            </mu-list-item>
            <!-- <mu-list-item v-if="isadmin" title="publish Notice" :href="routeList.get('publishNotice')"/> -->
            <mu-list-item button v-if="isadmin" :href="routeList.get('gamemanage')">
            <mu-list-item-title>Game Manager</mu-list-item-title>
            </mu-list-item>           
           <!--  <mu-list-item v-if="isadmin" title="GameManager" :href="routeList.get('gamemanage')"/> -->
            <mu-list-item button v-if="login" @click="logout">
            <mu-list-item-title>Logout</mu-list-item-title>
            </mu-list-item>
           <!--  <mu-list-item v-if="login" title="logout" @click="logout"/> -->
            </mu-list>
        </mu-menu>
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
