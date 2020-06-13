<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12" 
                :style="[{'background-color': '#696969', 'width': '85%', 'border': '6px solid #DAA520', 'border-radius': '5px'}]">


                <div class="col-md-12 justify-content-center align-items-center p-4"
                    :style="[{'margin': '3% 1%'}]">
                    <div class="col-sm-2" :style="[{'width': '5%'}]" v-on:click="insertionSortVoice()">
                        <div> 
                            <i style="font-size: 48px; color: #FF8C00" :class="voiceIcon"></i>
                        </div> 
                    </div>

                    <div class="col-sm-10" :style="[{'color': 'white', 'margin-top': '1%'}]">
                        <div :style="[{'margin-bottom': '2px', 'display': 'inline-block'}]"> 
                            <h3> Listen: What is Insertion sort?</h3></div>
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
                        <div class='col-sm-4'>{{ numbers[pivot] }} </div><div class='col-sm-4'> &lt; </div><div class='col-sm-4'> {{ numbers[pivot+1] }}</div>
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
               voiceIcon: 'fa fa-play-circle',
               synth: window.speechSynthesis,
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

            textToVoice: function(text){

                if (speechSynthesis !== undefined) {
                    let toSpeak = new SpeechSynthesisUtterance(text);
                    toSpeak.voice = this.synth.getVoices()[1];
                    this.synth.speak(toSpeak);
                }
            },

            yesAnswer: function(){
                if(this.numbers[this.pivot] < this.numbers[this.pivot + 1]){
                    this.pivot++;
                    if(this.pivot === 6){
                        console.log('sorted');
                        this.pivot = this.pivot - 1;
                    }
                }
            },

            noAnswer: function(){
                if(this.numbers[this.pivot] > this.numbers[this.pivot+1]){
                    let val = this.numbers[this.pivot];
                    this.numbers[this.pivot] = this.numbers[this.pivot + 1];
                    this.numbers[this.pivot + 1] = val;
                    this.numbers = [...this.numbers];
                    this.pivot--;
                    // this.textToVoice('Great');
                    if(this.pivot == -1)
                        this.pivot = 0;
                }
            },


            insertionSortVoice: function(){
                this.voiceIcon = 'fa fa-volume-up';
                this.textToVoice('It is a comparison-based algorithm. that builds a final sorted array one element at a time.');
                setTimeout(() => {
                    this.voiceIcon = 'fa fa-play-circle';
                }, 7000);
            }

        },

        mounted() {
            this.textToVoice('Let us start');
        },

        created() {
            this.numbers = this.generateArray(1, 8, 1);
        }
    }
</script>
