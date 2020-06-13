<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4" v-for="data in allData" :key="data.level" style="display: inline-grid;">
                <a :href="data.open === true ? data.href : '#'">
                    <div class="w-100 mb-5 move" style="height: 220px;">
                        <img  style="height: 220px;width: 100%;box-shadow: 0 0 10px 0px grey;" :src="'/storage/Images/' + data.img" alt="">
                    </div>
                    <h2>{{data.title}}</h2>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                allData:[]
            }
        },
        created(){
            let checkCollections = JSON.parse(localStorage.getItem("CardsCollections"));
            if (checkCollections === null) {
                let allData = [
                    { level: 1, open: true, href: "/cards-2-2",img:"card2-2.png",title:"2 * 2"},
                    { level: 2, open: true, href: "/cards-2-3",img:"card2-3.png",title:"3 * 2" },
                    { level: 3, open: true, href: "/cards-3-4",img:"card4-3.png",title:"3 * 4" },
                    { level: 4, open: true, href: "/cards-4-4",img:"card4-4.png",title:"4 * 4" },
                ];
                localStorage.setItem("CardsCollections", JSON.stringify(allData));
                this.allData = JSON.parse(localStorage.getItem("CardsCollections"));
            } else {
                this.allData = JSON.parse(localStorage.getItem("CardsCollections"));
            }
        }
    }
</script>

<style scoped>
.move{
    position: relative;
}
.move img:hover{
    position: absolute;
    /* transition: 1s infinite linear; */
    animation: moveimage 1s infinite linear alternate
    /* animation-name: moveimage;
    animation-duration: 4s; */
}
@keyframes moveimage {
  0%  {top: 0px;}
  50%  {top: 20px;}
  50% {top: -10px;}
  100% {top: 0px;}
}
</style>
