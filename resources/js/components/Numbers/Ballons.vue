<template>
        <div class="row">
           <div id="gameControlls">
                            <h4 >Score :</h4><span >{{score}}</span>
                             <h4 >Time : <span id="timerPencil"> </span>seconds</h4>
                          
                        </div>
                  <div class="col-md-12 d-flex justify-content-center align-items-center p-4">
                        <h1 >Question : {{count}}</h1>
                     </div>                            
                    
               <div class="col-md-12 position-relative d-flex align-items-center" style="justify-content: space-evenly;padding: 30px">
                <button  class="btn btn-primary btn-lg"  v-on:click="playSound(`/storage/sounds/numbers/${newArray[Math.floor(Math.random() * newArray.length)]}.mp3`)">
                    <span class="glyphicon glyphicon-play"></span>
                    </button>
                <button v-on:click="resetGame" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-repeat"></span></button>

            </div>
                  
                    <br/>
            <div class="col-md-12 d-flex justify-content-center align-items-center p-4">
              <div class="m-4 balloon" v-for="(result,index) in newArray" v-on:click="clickedBallon" :key="index"> <span>{{result}}</span></div>
            </div>
        </div>
 
</template>

<script>
import swal from 'sweetalert';

    export default {
        name: "ballons",
        data(){
            return {
                firstNum:null,
                result:null,
                count:1,
                showResult:false,
                score:0,
                answerNum:null,
                ballonNumbers:[
                    0,1,2,3,4,5,6,7,8,9
                ],
                newArray:[],
            }
        },
        methods:{
            playSound (sound) {
                    if(sound) {
                        var audio = new Audio(sound);
                        audio.play();
                        this.answerNum=(sound.slice(24,25));
                    }
                 },
                      randomize(arr) {
                        for (let i = arr.length - 1; i > 0; i--) {
                            let randomIndex = Math.floor(Math.random() * i)
                            let temp = arr[i]
                            this.$set(arr, i, arr[randomIndex])
                            this.$set(arr, randomIndex, temp)
                        }
                            },
            ballonRandom(){
                for(let i=0;i<4;i++){
                    this.firstNum = Math.floor(Math.random() * this.ballonNumbers.length);
                    if(this.newArray.length<4){
                        if(this.newArray.includes(this.firstNum)== false){
                            this.newArray.push(this.firstNum);
                            this.firstNum=null;
                            this.randomize(this.ballonNumbers);         
                        }else{
                             this.ballonRandom();
                        }    
                    }else{

                    }
                } 
                           
            },
            resetGame:function(){
                this.newArray=[];
              this.ballonRandom();
                this.count=1;
                this.score=0;
            },
             clickedBallon:function(e){
              let balloonPop='/storage/sounds/ballon.mp3';
              let success='/storage/sounds/clap.mp3';
              let notSuccess='/storage/sounds/tryAgain.mp3';
                if(e.target.innerText==this.answerNum){
                    e.target.classList.addClass="hideBalloon"; 
                           this.score+=1;
                    this.playSound(balloonPop);
                }
              
                if(this.count < 11){
                    this.newArray=[];
                   this.ballonRandom();
                    this.count++;
                }
                if(this.count === 11){
                    this.showResult = true;
                    this.newArray=[];
                }
                    if(this.showResult==true){
                    if(this.score > 5 ){    
                   swal("Great You got "+ this.score+" out of  ten " );
                   this.playSound(success);
                    this.showResult=false;
                   this.resetGame();
                   }
                   else {
                       swal("You got "+ this.score+" out of  ten " );
                        this.playSound(notSuccess);
                         this.showResult=false;
                   this.resetGame();}
                  
                    }
            }
        },
        created() {
            this.ballonRandom();
        }
    }
</script>
