<template>
    <div id="drawer">
        <mu-drawer :open="open" @close="toggle()" :docked="docked">
            <mu-appbar title="CGCTF" color="primary"></mu-appbar>
            <mu-list toggle-nested>
<!--                     <mu-list-item button :ripple="false" nested :open="open === 'send'" @toggle-nested="open = arguments[0] ? 'send' : ''">
      <mu-list-item-action>
        <mu-icon value="send"></mu-icon>
      </mu-list-item-action>
      <mu-list-item-title>Sent mail</mu-list-item-title>
      <mu-list-item-action> -->
                <mu-list-item button :ripple="false" nested :open="false">
                    <mu-list-item-title>Challenges</mu-list-item-title>
                     <mu-list-item-action>
                    <mu-icon class="toggle-icon" size="24" value="keyboard_arrow_down"></mu-icon>
                    </mu-list-item-action>
                    <mu-list-item button :ripple="false" slot="nested" :href="routeList.get('challenges.Web')" @click="setActiveTab('Web')">
                    <mu-list-item-title>Web</mu-list-item-title>
                    </mu-list-item>
                    <mu-list-item button :ripple="false" slot="nested" :href="routeList.get('challenges.Re')" @click="setActiveTab('Re')">
                    <mu-list-item-title>Re</mu-list-item-title>
                    </mu-list-item>
                    <mu-list-item button :ripple="false" slot="nested" :href="routeList.get('challenges.Pwn')" @click="setActiveTab('Pwn')">
                    <mu-list-item-title>Pwn</mu-list-item-title>
                    </mu-list-item>
                    <mu-list-item button :ripple="false" slot="nested" :href="routeList.get('challenges.Crypto')" @click="setActiveTab('Crypto')">
                    <mu-list-item-title>Crypto</mu-list-item-title>
                    </mu-list-item>
                    <mu-list-item button :ripple="false" slot="nested" :href="routeList.get('challenges.Misc')" @click="setActiveTab('Misc')">
                    <mu-list-item-title>Misc</mu-list-item-title>
                    </mu-list-item>
                   <!--  <mu-list-item title="Re" :href="routeList.get('challenges.Re')" @click="setActiveTab('Re')"
                                  slot="nested"/>
                    <mu-list-item title="Pwn" :href="routeList.get('challenges.Pwn')" @click="setActiveTab('Pwn')"
                                  slot="nested"/>
                    <mu-list-item title="Crypto" :href="routeList.get('challenges.Crypto')"
                                  @click="setActiveTab('Crypto')" slot="nested"/>
                    <mu-list-item title="Misc" :href="routeList.get('challenges.Misc')" @click="setActiveTab('Misc')"
                                  slot="nested"/> -->
                </mu-list-item>
                <mu-list-item button :href="routeList.get('scoreboard')">
                <mu-list-item-title>Scoreboard</mu-list-item-title>
                </mu-list-item>
                <!-- <mu-list-item title="Scoreboard" :href="routeList.get('scoreboard')"/> -->
                <mu-list-item button :href="routeList.get('history')">
                <mu-list-item-title>History</mu-list-item-title>
                </mu-list-item>
               <!--  <mu-list-item title="History" :href="routeList.get('history')"/> -->
                <mu-list-item button :href="routeList.get('notice')">
                <mu-list-item-title>Notice</mu-list-item-title>
                </mu-list-item>              
              <!--   <mu-list-item title="Notice" :href="routeList.get('notice')"/> -->
                
                <mu-list-item button :href="routeList.get('rules')">
                <mu-list-item-title>Rules</mu-list-item-title>
                </mu-list-item> 
                <mu-divider/>
                <mu-list-item button :href="routeList.get('about')">
                <mu-list-item-title>CGCTF</mu-list-item-title>
                </mu-list-item>              
                <!-- <mu-list-item title="About" :href="routeList.get('about')"/> -->
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