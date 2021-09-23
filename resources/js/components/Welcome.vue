<template>
<!--Welcome message-->
    <div class="text-center mt-5">
            <div class="mt-5">
                <h1 class="text-6xl">Welcome 👋!</h1>
            </div>
            
            <div class="mt-5">
                <p>Here you can get a random article from wikipedia</p>
            </div>
            <div class="mt-5">
                <button @click="getArticle()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button">Get Article</button>
            </div>
        </div>
</template>
<script>
export default {
    props:{
        getArticle:Function,
    }
}
</script>