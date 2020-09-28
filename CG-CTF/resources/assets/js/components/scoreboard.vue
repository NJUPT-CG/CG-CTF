<template>
<div id="scoreboard">
<mu-container data-mu-loading-color="secondary" data-mu-loading-overlay-color="rgba(0, 0, 0, .7)" v-loading="!loadStatus['fresh']" class="demo-loading-wrap">
<table class="table table-hover" style="table-layout:fixed">
  <caption>Score Board</caption>
   <thead>
      <tr>
         <th>rank</th>
         <th>team</th>
      <th>score</th>
      <th>time</th>
      </tr>
   </thead>
    <tbody v-for ="(user,index) in fresh">
      <tr @click="detail(user.id)">
         <td>{{index+1}}</td>
         <td style="overflow:hidden" >{{user.name}}</td>
      <td>{{user.totalScore}}</td>
      <td>{{user.lastsubtime}}</td>
     </tr>
   </tbody>

</table>

 </mu-container>
</div>
</template>


<script>
    import eventHub from "../eventHub"

    export default {
        name: "scoreboard",
        props: ['login'],
        data: () => ({
            activeboard: 'fresh',
            routeList,
            loadStatus: {},
            fresh: [],
        }),
        methods: {
            loadData(board) {
                axios.get(`${apiRoot}scoreboard`)
                    .then((response) => {
                        this[board] = response.data;
                        this.loadStatus[board] = true;
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            },
            detail(id){
                var url=routeList.get('userDetail')+'#'+id;
                location.href=url;
            },
            setActiveboard(board) {
                if (!this.hasData(board)) {
                    this.loadData(board)
                }
                this.activeboard = board
            },
            hasData(board) {
                return !!this.loadStatus[board]
            },
            justWaitForACoffee() {
                return new Promise(resolve => {
                    setTimeout(() => resolve('☕'), 2000); // it takes 2 seconds to make coffee
                });
            },
            async loadAllData() {
                try {
                    
                    

                    const coffee = await this.justWaitForACoffee();
                    // then we grab some data
                    let promises = [];
                    
                    promises.push(axios(`${apiRoot}scoreboard`))
                   
                    // await all promises to come back and destructure the result into their own variables
                    let responses = [];
                    responses = await Promise.all(promises);
                    for (let i = 0; i < responses.length; i++) {
                        this.fresh[i] = responses[i].data
                    }
                    
                    this.loadStatus['fresh'] = true;
                    
                } catch (error) {
                    console.error(error);
                }
            }
        },
        created() {
            let currentboard = 'fresh';
            this.setActiveboard(currentboard);
            eventHub.$on('activeboard', (activeboard) => {
                this.setActiveboard(activeboard);
            });
            eventHub.$on('challenge.delete', id => {
               let type = this.activeboard;
               this[type] = this[type].filter(item => item.id !== id)
            });
        },
        mounted() {
            this.loadAllData()
        },
    }
</script>
