<template>
 <div id="userDetail">
<div class="container">
<h3 style="font-weight:bold;font-size:large;">Team:{{detail.name}}</h3>
<table class="table table-hover" style="table-layout:fixed">
  <caption>Total Score:{{detail.score}}</caption>
     <thead>
      <tr>
      <th>Title</th>
      <th>score</th>
      <th>rank</th>
      <th>time</th>
      </tr>
   </thead>
    <tbody v-for="chall in detail.challenges">
      <tr>
      <td>{{chall.title}}</td>
      <td>{{chall.score}}</td>
      <td>{{chall.pivot.rank}}</td>
      <td>{{chall.pivot.created_at}}</td>
     </tr>
   </tbody>
</table>

</div>
</div>
</template>


<script>
    import eventHub from "../eventHub"

    export default {
        name: "userdetail",
        props: ['login'],
        data: () => ({
            routeList,
            loadStatus: false,
            detail: [],
        }),
        methods: {
            loadData() {
                let userId = location.href.split('/userDetail#')[1];
                axios.get(`${apiRoot}userDetail/`+userId)
                    .then((response) => {
                        this.detail = response.data;
                        this.loadStatus = true;
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            },
            // setActiveboard(board) {
            //     if (!this.hasData(board)) {
            //         this.loadData(board)
            //     }
            //     this.activeboard = board
            // },
            hasData() {
                return !!this.loadStatus;
            },
            justWaitForACoffee() {
                return new Promise(resolve => {
                    setTimeout(() => resolve('☕'), 2000); // it takes 2 seconds to make coffee
                });
            },
            // async loadAllData() {
            //     try {
                    
                    

            //         const coffee = await this.justWaitForACoffee();
            //         // then we grab some data
            //         let promises = [];
                    
            //         promises.push(axios(`${apiRoot}userDetail/9`))
                   
            //         // await all promises to come back and destructure the result into their own variables
            //         let responses = [];
            //         responses = await Promise.all(promises);
            //         for (let i = 0; i < responses.length; i++) {
            //             this.fresh[i] = responses[i].data
            //         }
                    
            //         this.loadStatus = true;
                    
            //     } catch (error) {
            //         console.error(error);
            //     }
            // }
        },
        created() {
            // let currentboard = 'fresh';
            // this.setActiveboard(currentboard);
            // eventHub.$on('activeboard', (activeboard) => {
            //     this.setActiveboard(activeboard);
            // });
            // eventHub.$on('challenge.delete', id => {
            //    let type = this.activeboard;
            //    this[type] = this[type].filter(item => item.id !== id)
            // });
            if(!this.hasData()) this.loadData();
        },
        mounted() {
           // this.loadAllData()
        },
    }
</script>
