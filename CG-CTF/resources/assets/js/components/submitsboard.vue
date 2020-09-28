<template>
 <div id="submitsBoard">

<mu-container data-mu-loading-color="secondary" data-mu-loading-overlay-color="rgba(0, 0, 0, .7)" v-loading="!loadStatus" class="demo-loading-wrap">

<table class="table" style="table-layout:fixed">
   <thead>
      <tr>
      <th>team</th>
      <th>challenge</th>
      <th>time</th>
      </tr>
   </thead>
    <tbody v-for="(submit,index) in submits">
      <tr>
      <td style="overflow:hidden" >{{submit.name}}</td>
      <td style="overflow:hidden" >{{submit.challenge}}</td>
      <td>{{submit.time}}</td>
     </tr>
   </tbody>

</table>
</mu-container>

</div>
</template>
<script>
    import eventHub from "../eventHub"

    export default {
        name: "submitsboard",
        props: ['login'],
        data: () => ({
            routeList,
            loadStatus: false,
            submits: [],
        }),
        methods: {
            loadData() {
                
                axios.get(`${apiRoot}SubmitsBoard`)
                    .then((response) => {
                        this.submits = response.data;
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