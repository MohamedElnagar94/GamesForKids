<template>
    <div class="container">
        <div class="row">
            <div v-for="(item, i) in randomOrder" :key="i+10" class="col-md-3 d-flex justify-content-center align-items-center p-4">
                <div style="text-align:center; line-height: 5">
                    <img v-for="(single, index) in item.id" :key="index+20" 
                        :style="[item.id === 1 ? {'height': '120px', 'margin': '5px'} : {'height': '50px', 'margin': '5px'}]"
                        :src="'/storage/Images/' +  item.skitch" alt="">
                </div>
            </div>

            <div v-for="i in 4" :key="i+30" class="col-md-3 d-flex justify-content-center align-items-center p-4">
                <div style="margin:30% auto; height: 80px; width: 31%; text-align:center; background-color: lightgray;" :id="randomOrder[i-1].name" @drop="drop" @dragover="allowDrop"></div>
            </div>

            <div v-for="(item, i) in results" :key="i+40" class="col-md-3 d-flex justify-content-center align-items-center p-4">
                <img style="height: 75px" :src="'/storage/Images/' + item.img " alt="" draggable="true" @dragstart="onDragging" :id="item.id"/>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CountNumbersComponent",
         data(){
            return {
                numbers:[
                    {id:1, name:'One',img:'1.png', skitch:'oneFruite.png'},
                    {id:2, name:'Two',img:'2.png', skitch:'banana.png'},
                    {id:3, name:'Three',img:'3.png', skitch:'apple.png'},
                    {id:4, name:'Four',img:'4.png', skitch:'redApple.png'},
                    {id:5, name:'Five',img:'5.png', skitch:'fruit5.png'},
                    {id:6, name:'Six',img:'6.png', skitch:'fruites6.png'},
                    {id:7, name:'Seven',img:'7.png', skitch:'mango.png'},
                    {id:8, name:'Eight',img:'8.png', skitch:'banana.png'},
                    {id:9, name:'Nine',img:'9.png', skitch:'redApple.png'},
                    {id:10, name:'Ten',img:'10.png', skitch:'mango.png'},
                ],

                results: [],
                randomOrder: [],
            }
        },

        methods: {
            randomArr: function()
            {
                let res = [];
                while(res.length < 4){
                    let item = this.numbers[Math.floor(Math.random() * 10 )];
                    if(res.indexOf(item) === -1) res.push(item);
                }
                return res;
            },

            reOrderArr: function(arr)
            {
                let array = [...arr];
                let currentIndex = array.length, temporaryValue, randomIndex;

                // While there remain elements to shuffle...
                while (0 !== currentIndex) {

                    // Pick a remaining element...
                    randomIndex = Math.floor(Math.random() * currentIndex);
                    currentIndex -= 1;

                    // And swap it with the current element.
                    temporaryValue = array[currentIndex];
                    array[currentIndex] = array[randomIndex];
                    array[randomIndex] = temporaryValue;
                }

                return array;
            },
            onDragging(event){
                event.dataTransfer.setData("text", event.target.id);
            },
                
            allowDrop(event) {
                event.preventDefault();
            },
                
            drag(event) {
                event.dataTransfer.setData("text", event.target.id);
            },
                
            drop(event) {
                event.preventDefault();
                let data = event.dataTransfer.getData("text");
                if(this.numbers[data - 1].name === event.target.id)
                    event.target.appendChild(document.getElementById(data));
            },
        },

        created() {
            this.results = this.randomArr();
            this.randomOrder = this.reOrderArr(this.results);
        }
    }
</script>
