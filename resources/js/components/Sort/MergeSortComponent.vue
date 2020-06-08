<template>
    <div class="container">
        <div class="row">
            <div class="col-md-2 d-flex justify-content-center align-items-center p-4">
                <div style="text-align:center; line-height: 5">
                    <img
                        :style="[{'margin': '5px'}]"
                        :src="'/storage/Images/' + answer + '.gif'" alt="">
                </div>
            </div>

            <div class="col-md-10 d-flex justify-content-center align-items-center p-4">
                <div style="margin-left: 25%">
                    <div v-for="i in numbersArray.slice(0, 4)" 
                        :style="[{'margin': '5px', 'border': '1px solid gray',  'background-color': 'lightgreen'}]"
                        :key="i" class="col-md-1 d-flex justify-content-center align-items-center p-4">
                        <div style="font-size: 30px; margin: 0 40px;">{{ i }}</div>
                    </div>

                     <div v-for="i in numbersArray.slice(4, 9)" 
                        :style="[{'margin': '5px', 'border': '1px solid gray', 'background-color': 'lightblue'}]"
                        :key="i" class="col-md-1 d-flex justify-content-center align-items-center p-4">
                        <div style="font-size: 30px; margin: 0 40px">{{ i }}</div>
                    </div>
                    <div><img
                        :style="[   steps === 0 ?   {'width': '50%', 'height': '150px', 'float': 'right'} : 
                                    steps === 1 ?   {'width': '50%', 'height': '150px', 'transform': 'scaleX(-1)', 'margin': '0 -10%'} : 
                                                    {'display' : 'none'}
                                ]"
                        src="/storage/Images/arrow.gif" alt="" /></div>

                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "MergeSortComponent",
         data(){
            return {
                answer: '',
                steps: 0,
                numbersArray: [],
            }
        },

        methods: {
            getArray: function(start,end,step)
            {
                let array = _.range(start,end,step);
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
           
        },

        created() {
            this.numbersArray = this.getArray(0, 8, 1);
            this.answer = 'Think'; // Think, Yes, No
        }
    }
</script>
