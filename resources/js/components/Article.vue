<template>

    <div v-if="firstTime" class="mt-5 animate-bounceInLeft">
        <Welcome :getArticle="getArticle" />
    </div>
    <div v-else>
        <div  v-if="loading">
              <!--Loading Message-->
            <div role="alert" class="p-20">
                <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2">
                    Loading
                </div>
                <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700">
                    <p>Wait</p>
                </div>
            </div>
        </div>
        <div v-else>
            <div v-if="article.error">
                <!--Error Message-->
                <div role="alert" class="p-20">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        Error Message
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>Something happened try again</p>
                    <button @click="refreshPage()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="button">Refresh Page</button>
                    </div>
                </div>
            </div>
            <div v-else class="text-center mt-5">
               
                <!--Article-->
                <div class="mt-5">
                    <!--title-->
                    <a class="text-5xl" :href="article.url" target="_blank"> {{article.title}}</a>
                </div>
                <div class="mt-5">
                    <!--body-->
                    <p class="text-2xl">{{article.content}}...</p>
                </div>
                <div class="mt-5">
                    <button @click="getArticle()" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button">Get New Article</button>
                </div>
            </div>
            
        </div>
    </div>
</template>
<script>

import Welcome from './Welcome.vue'
export default {
    data(){
        return{
            firstTime:true,
            loading:true,
            article:{},
        }
    },
    components:{
        Welcome,
    },
    methods:{
        getArticle:function(){
            this.firstTime = false;
            this.loading = true;
            //call api to get data
            axios.post('api/get_article')
            .then((response)=>{
                this.article = response.data;
                this.loading = false;
            })
            .catch(function(error){
                console.log(error);
            })

        },
        refreshPage:function(){
            this.getArticle();
        }
        
        
    }
}
</script>
<style>
.animate-bounceInLeft{
    animation: bounceInLeft;
    animation-duration: 2s; 
}
.animate-fadeOutLeft{
    animation: fadeOutLeft;
    animation-duration: 2s;

}

</style>