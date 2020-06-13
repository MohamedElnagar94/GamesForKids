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
            console.log(window.location.pathname)
            let checkCollections = JSON.parse(localStorage.getItem("level7Collections"));
            if (checkCollections === null) {
                let allData = [
                    { level: 1, open: true, href: "/mergesort",img:"mergesort.png",title:"Merge sort"},
                    { level: 2, open: true, href: "/bubblesort",img:"bubblesort.png",title:"Bubble sort"},
                    { level: 3, open: true, href: "/insertionsort",img:"insertionsort.png",title:"Insertion sort" },
                    { level: 4, open: true, href: "/binarySearch",img:"binarysearch.png",title:"Binary Search" },
                ];
                localStorage.setItem("level7Collections", JSON.stringify(allData));
                this.allData = JSON.parse(localStorage.getItem("level7Collections"));
            } else {
                this.allData = JSON.parse(localStorage.getItem("level7Collections"));
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
