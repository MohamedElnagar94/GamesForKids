<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12" 
                :style="[{'background-color': '#696969', 'width': '85%', 'border': '6px solid #DAA520', 'border-radius': '5px'}]">


                <div class="col-md-12 justify-content-center align-items-center p-4"
                    :style="[{'margin': '3% 1%'}]">
                    <div class="col-sm-12" :style="[{'color': 'white'}]">
                        <div 
                        :style="[{'background-color': '#FF8C00', 'display': 'inline-block', 'border': '1px solid white', 'width': '20px', 'height': '20px'}]"> </div> 
                        <div :style="[{'margin-bottom': '2px', 'display': 'inline-block'}]"> 
                            <h3> Insertion sort: <span  :style="[{'font-size': '16px'}]">is a comparison-based algorithm that builds a final sorted array one element at a time..</span> </h3> </div>
                    </div>
                </div>


                <div class="col-md-12 justify-content-center align-items-center p-4"
                    :style="[{'margin': '6% 16%'}]">
                    <div v-for="i in numbers"
                        :style="[
                            i === numbers[pivot] ?  
                                    {'border': '2px solid white', 'border-radius': '50%', 'margin': '5px', 'background-color': '#FF8C00'}: 
                                    {'border': '2px solid white', 'border-radius': '50%', 'margin': '5px'}]"
                        class="col-sm-1 justify-content-center align-items-center "
                        :key="i">
                        <div style="font-size: 30px; color: white; text-align: center">{{ i }}</div>
                    </div>
                </div>


                <div class="col-md-12 justify-content-center align-items-center p-4"
                    :style="[{'margin': '0 27%'}]">
                    <div class='col-sm-8' 
                    :style="[{'margin': '0 4%', 'width': '35%', 'height': '75px', 'border': '2px solid white', 'color': 'white', 
                            'font-size': '32px', 'padding': '1%', 'text-align': 'center'}]"> 
                        <div class='col-sm-4'>{{ numbers[pivot] }} </div><div class='col-sm-4'>{{'<'}}</div><div class='col-sm-4'> {{ numbers[pivot+1] }}</div>
                    </div>
                    
                </div>



                <div class="col-md-12 justify-content-center align-items-center p-4"
                    :style="[{'margin': '5% 30%'}]">
                    <div class='col-sm-6' 
                    :style="[{'width': '12%', 'color': 'white', 'border': '2px solid #FF6347', 'border-radius': '50%',
                            'font-size': '75px', 'padding': '1%', 'text-align': 'center'}]" v-on:click="noAnswer"> 
                            <i class="fa fa-thumbs-down"></i>
                    </div>


                    <div class='col-sm-6' 
                    :style="[{'width': '12%', 'color': 'white', 'border': '2px solid #228B22', 'border-radius': '50%',
                            'font-size': '75px', 'padding': '1%', 'text-align': 'center', 'margin': '0 15%'}]" v-on:click="yesAnswer">
                            <i class="fa fa-thumbs-up"></i>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "InsertionSortComponent",
         data(){
            return {
               numbers: [],
               pivot: 0,
               temp: 0,
            }
        },

        methods: {
            generateArray: function(start,end,step)
            {
                let array = _.range(start,end,step);
                let currentIndex = array.length, temporaryValue, randomIndex;

                while (0 !== currentIndex) {
                    randomIndex = Math.floor(Math.random() * currentIndex);
                    currentIndex -= 1;
                    temporaryValue = array[currentIndex];
                    array[currentIndex] = array[randomIndex];
                    array[randomIndex] = temporaryValue;
                }

                return array;
            },

            yesAnswer: function(){
                if(this.numbers[this.pivot] < this.numbers[this.pivot + 1]){
                    this.pivot++;
                    if(this.pivot === 6){
                        // Congratt
                        console.log('sorted');
                        this.pivot = this.pivot - 1;
                    }

                    // if(this.temp == 0)
                    //     this.pivot++;
                    // else{
                    //     this.pivot = this.temp;
                    //     this.temp = 0;
                    // }
                }
            },

            noAnswer: function(){
                if(this.numbers[this.pivot] > this.numbers[this.pivot+1]){
                    let val = this.numbers[this.pivot];
                    this.numbers[this.pivot] = this.numbers[this.pivot + 1];
                    this.numbers[this.pivot + 1] = val;
                    this.numbers = [...this.numbers];
                    this.pivot--;
                    if(this.pivot == -1)
                        this.pivot = 0;
                }
            },


            restart: function(){
               
            }

        },

        created() {
            this.numbers = this.generateArray(1, 8, 1);
        }
    }
</script>
