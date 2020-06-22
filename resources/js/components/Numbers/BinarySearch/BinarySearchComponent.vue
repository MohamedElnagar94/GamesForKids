<template>
    <div class="container" :key="keyChange">
        <div class="row position-relative">
            <div class="text-center h1 w-100">
                <span
                    style="font-size: 40px;color: darkviolet;font-weight: bold;"
                    >The Wanted Number
                </span>
                <span
                    class="d-block"
                    style="font-size: 40px;color: blueviolet;font-weight: 900;"
                    >{{ theWantedNumber }}</span
                >
            </div>
            <div
                class="text-center w-100 d-flex justify-content-center align-items-center py-5"
            >
             <transition-group name="flip-list" tag="div" class="d-flex justify-content-center align-items-center" >
            
                <div
                    class="col-md-1 result d-flex justify-content-center align-items-center m-3"
                    :class="{ divBg: seconedResult.includes(number) }"
                    v-for="number in numbers"
                    :key="number"
                    :id="number + 'h'"
                >
                    <img
                        class="img-fluid column"
                        style="height:85px"
                        :src="'/storage/Images/' + number + '.png'"
                    />
                </div>
                 
                  </transition-group>

                  <i
                    class="fa fa-refresh  mr-5"
                    @click.once="sortNumbers"
                    aria-hidden="true"
                    style="font-size: 52px;color: blueviolet;cursor:pointer"
                ></i>
               
            </div>
            <div
                class="text-center w-100 d-flex justify-content-center align-items-center mt-5"
                v-if="seconedResult.length"
            >
                <div
                    class="result d-flex justify-content-center align-items-center m-3"
                    :class="{ divBg: thirdResult.includes(number) }"
                    :id="number"
                    v-for="number in seconedResult"
                    :key="number"
                >
                    <img
                        class="img-fluid column"
                        style="height:85px"
                        :src="'/storage/Images/' + number + '.png'"
                    />
                </div>
    
                <i
                    class="fa fa-level-down ml-5"
                    @click.once="
                  
                        steps++;
                       popup()
                    "
                    style="font-size: 52px;color: blueviolet;cursor:pointer"
                ></i>
               
            </div>
            <div
                class="text-center w-100 d-flex justify-content-center align-items-center mt-5"
                v-if="thirdResult.length"
            >
                <div
                    class="result d-flex justify-content-center align-items-center m-3"
                    :class="[
                        {
                            divBg: finalResult.includes(number),
                            divBg2: thirdResult.length === 1
                        }
                    ]"
                    :id="number + 'a'"
                    v-for="number in thirdResult"
                    :key="number"
                >
                    <img
                        class="img-fluid column"
                        style="height:85px"
                        :src="'/storage/Images/' + number + '.png'"
                    />
                </div>
                <i
                    class="fa fa-level-down ml-5"
                    v-if="thirdResult.length > 1"
                    @click.once="
                    steps++;
                        popup()
                    "
                    style="font-size: 52px;color: blueviolet;cursor:pointer"
                ></i>
               
            </div>
            <div
                class="text-center w-100 d-flex justify-content-center align-items-center mt-5"
                v-if="finalResult.length"
            >
                <div
                    class="result d-flex justify-content-center align-items-center m-3 divBg"
                    :class="{ divBg2: thirdResult.length > 1 }"
                    :id="number + 'ab'"
                    v-for="number in finalResult"
                    :key="number"
                >
                    <img
                        class="number img-fluid column"
                        style="height:85px"
                        :src="'/storage/Images/' + number + '.png'"
                    />
                </div>
                 
            </div>
            <div
                class="text-center w-100 d-flex justify-content-center align-items-center mt-5 "
                v-if="theWantedNumber === middleNumber"
            >
                <div
                    class="result d-flex justify-content-center align-items-center m-3 divBg animated heartBeat repeat-3"
                >
                    <img
                        class="number img-fluid column"
                        style="height:85px"
                        :src="'/storage/Images/' + middleNumber + '.png'"
                    />
                </div>
            </div>
            <div
                class="col-md-12 d-flex align-items-center"
                style="justify-content: space-evenly;"
            >
                <i
                    v-if="
                        (theWantedNumber === middleNumber) |
                            (thirdResult.length === 1) |
                            finalResult.length
                    "
                    @click.prevent="playAgain()"
                    class="d-inline-block fa fa-repeat mt-2"
                    data-toggle="tooltip"
                    title="Play Again"                    
                    data-placement="top"
                    style="font-size:50px;cursor:pointer;color:blueviolet"
                ></i>

                <!-- <a href="/levels" ><img style="width: 100px" src="/storage/Images/door.png" alt="Prev Exam" data-toggle="tooltip" title="Next Level" data-placement="top"></a> -->
            </div>
        </div>

   <div
      id="congrats"
      class="popup justify-content-center align-items-center"
      onclick="$(this).hide()"
    >
      <div class="d-flex justify-content-center">
        <img
          class="col-md-5"
          :style="[{ margin: '5px', 'line-height': '7' }]"
          :src="'/storage/Images/congrates.gif'"
          alt
        />
      </div>
    </div>
  
  <div id="explain" class="popup">
      <div class="row d-flex justify-content-center align-items-center pt-6">
        <hgroup class="col-md-5 speech-bubble">
          <h1 id="question">
            Is {{ theWantedNumber}} BIGGER than number
            {{ middleNumber}}?
          </h1>
        </hgroup>
        <img
          id="character"
          class="col-md-2"
          :src="'/storage/Images/hello2.gif'"
          alt
          style="line-height: 2"
        />
      </div>

      <div class="justify-content-center align-items-center row m-t-30">
        <img class="col-md-1 m-5" :src="'/storage/Images/' + theWantedNumber + '.png'" alt />
        <img class="col-md-1 m-5"  id="sign" :src="'/storage/Images/bigger-than.png'" alt />
        <img class="col-md-1 m-5" :src="'/storage/Images/' + middleNumber+ '.png'" alt />
      </div>

      <div class="justify-content-center align-items-center row m-t-30">
        <button
          class="btn btn-success col-md-3"
          style="font-size: 30px; padding: 5px 5px; margin:10px 20px"
          @click="check(true)"
        >
          <i class="fa fa-check"></i>
          Yes
        </button>
        <button
          class="btn btn-danger col-md-3"
          style="font-size: 30px; padding: 5px 5px; margin:10px 20px"
          @click="check(false)"
        >
          <i class="fa fa-times"></i>
          No
        </button>
      </div>
    </div>
      <audio ref="audioElm" src="/storage/Images/happy.mp3"></audio>
    <audio id="correctElm" src="/storage/Sound/correct.mp3"></audio>
    <audio id="WrongElm" src="/storage/Sound/Wrong-answer.mp3"></audio>
    <audio id="applausElm" src="/storage/Sound/congrats-applaus.mp3"></audio>
    <audio id="fireworkElm" src="/storage/Sound/firework.mp3"></audio>
    </div>

    






</template>
<script>
export default {
    name: "BinarySearch",
    data() {
        return {
            theWantedNumber: 0,
            numbers: [],
            sortedNumbers: [],
            seconedResult: [],
            thirdResult: [],
            finalResult: [],
            middleNumber: 0,
             synth: window.speechSynthesis,
            steps: 0,
            changeColor: false,
            keyChange: 0,
            sign:""
        };
    },
    methods: {
        randomNumber: function(minNum, maxNum) {
            return Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum;
        },
        start: function() {
            this.theWantedNumber = this.randomNumber(1, 9);
            this.numbers = [];
            for (let i = 0; i < 9; i++) {
                let randResult = this.randomNumber(1, 9);

                while (this.numbers.includes(randResult) === true) {
                    randResult = this.randomNumber(1, 9);
                }
                this.numbers.push(randResult);
            }
        },
        animating(arr,id){

                    //devide the new array to middle and two array
                
                      
                       let temp = arr[
                        Math.floor(arr.length / 2)
                        ];
                     let  leftarr=arr.filter(number => {
                            return number < temp;
                        }).slice();
                      let rightarr=arr.filter(number => {
                            return number > temp;
                        }).slice();
                        leftarr.forEach(element => {
                             $(`#${element}${id}`).addClass(" animated slideOutLeft repeat-3 ");
                        });
                         rightarr.forEach(element => {
                             $(`#${element}${id}`).addClass(" animated slideOutRight  repeat-3  ");
                        });
                        $(`#${temp}${id}`).addClass("animated slideOutDown repeat-3  ");

                     setTimeout(() => {
                     arr.forEach(element => {
                        $(`#${element}${id}`).removeClass(" animated slideOutRight  repeat-3 ");
                    });
              }, 3000);
                       


        },

        sortNumbers() {
            // 
             _.shuffle(this.numbers);
              this.numbers.sort();
              setTimeout(() => {
                   this.animating (this.numbers,'h');
              }, 1800);
                   
           setTimeout(() => {
                
                this.steps++;
                    this.popup( );
                      
            }, 5000);
        },
        changeStep() {
            switch (this.steps) {
                case 1:
                         
                  if (this.theWantedNumber < this.middleNumber) {
                        
                        this.seconedResult = this.numbers.filter(number => {
                            return number < this.middleNumber;
                        });
                         setTimeout(() => {
                     this.animating (this.seconedResult,'');
              }, 1300);
                      
                
                        
                    } else if (this.theWantedNumber > this.middleNumber) {
                        this.seconedResult =this.numbers.filter(number => {
                            return number > this.middleNumber;
                        });
                                 setTimeout(() => {
                     this.animating (this.seconedResult,'');
              }, 1300);
                    } else if (this.theWantedNumber == this.middleNumber) {
                        $(`#${this.theWantedNumber}h`).addClass("divBg animated heartBeat delay-1s repeat-3");
                      setTimeout(() => {
                             this.endGame();
                        }, 5000);
                    }
                     

                    break;
                case 2:
                
                    console.log("middle number", this.middleNumber);
                    if (this.theWantedNumber < this.middleNumber) {
                        this.thirdResult = this.seconedResult.filter(number => {
                            return number < this.middleNumber;
                        });
                                     setTimeout(() => {
                     this.animating (this.thirdResult,'a');
                      }, 1300);
                  
                    } else if (this.theWantedNumber > this.middleNumber) {
                        this.thirdResult = this.seconedResult.filter(number => {
                            return number > this.middleNumber;
                        });
                       
                                 setTimeout(() => {
                     this.animating (this.thirdResult,'a');
              }, 1300);
                   
                        
                    } else if (this.theWantedNumber == this.middleNumber) {
                        $(`#${this.theWantedNumber}a`).addClass("divBg animated heartBeat delay-1s repeat-3 ");
                      setTimeout(() => {
                             this.endGame();
                        }, 5000);
                    }
                   

                    break;
                case 3:
                console.log("middle number", this.middleNumber);
                    if (this.theWantedNumber < this.middleNumber) {
                        this.finalResult = this.thirdResult.filter(number => {
                            return number < this.middleNumber;
                        });
                        console.log("final number", this.finalResult);
            
                    } else if (this.theWantedNumber > this.middleNumber) {
                        this.finalResult = this.thirdResult.filter(number => {
                            return number > this.middleNumber;
                        });
                        
              
                    } else if (this.theWantedNumber == this.middleNumber) {
                      $(`#${this.theWantedNumber}ab`).addClass("divBg animated heartBeat  delay-1s repeat-3 ");
                        
                        setTimeout(() => {
                              
                             this.endGame();
                        }, 5000);
                      
                        
                       
                    }

                    break;

                default:
                    break;
            }
        },
        playAgain() {
            this.start();
            this.seconedResult = [];
            this.thirdResult = [];
            this.finalResult = [];
            this.middleNumber = 0;
            this.keyChange++;
        }, 
    endGame () {
      $("#applausElm")[0].play();

      $("#congrats").show();
      $("#fireworkElm")[0].play();
    },
    speake (txt) {
      //audio text to speach
      if (speechSynthesis !== undefined) {
        var toSpeak = new SpeechSynthesisUtterance(txt);
        toSpeak.voice = this.synth.getVoices()[1];
        this.synth.speak(toSpeak);
      }
    },
     popup( ) {
              switch (this.steps) {
                case 1:
                     this.middleNumber = this.numbers[
                        Math.floor(this.numbers.length / 2)
                    ];

                    break;
                case 2:
                    this.middleNumber = this.seconedResult[
                        Math.floor(this.seconedResult.length / 2)
                    ];

                    break;
                case 3:
                    this.middleNumber = this.thirdResult[
                        Math.floor(this.thirdResult.length / 2)
                    ];
                    break;

                default:
                    break;
            }
        let txtInput='';
        if(this.sign=="bg")
         {
            txtInput =
        "Is the wanted number" +
        this.theWantedNumber +
        " BIGGER than middle number " +
        this.middleNumber +
        "?";
         $("#sign")[0].src = '/storage/Images/bigger-than.png';
         }
        else if(this.sign==="ls")
        {
              
            txtInput =
        "Is the wanted number" +
        this.theWantedNumber +
        " SMALLER than middle number " +
        this.middleNumber +
        "?";
         $("#sign")[0].src = '/storage/Images/smaller-than.png';
         
        }
        else{
             txtInput =
        "Is the wanted number" +
        this.theWantedNumber +
        " Equall middle number " +
        this.middleNumber +
        "?";
         $("#sign")[0].src = '/storage/Images/equal.png';
        }
      $("#character")[0].src = "/storage/Images/hello2.gif";
      $("#question")[0].innerText = txtInput;
      this.speake(txtInput);

      $("#explain").show();
    },
     check(answer) 
     {

         let correct=false;

            if(this.sign=="bg"&&this.theWantedNumber>this.middleNumber
            ||this.sign=="ls"&&this.theWantedNumber<this.middleNumber
            || this.sign=="eq"&&this.theWantedNumber== this.middleNumber)
            {
                 correct=true  
            }
            console.log("an-->",answer)
            console.log("co-->",correct)
            if(correct===answer&&answer===true)
            {
                 $("#character")[0].src = "/storage/Images/good.gif";
                $("#question")[0].innerText = "Thats correct, GOOD JOB";
                var txt = $("#question")[0].innerText;

              $("#correctElm")[0].play();
               this.speake(txt);

               setTimeout(() => {
                $("#explain").hide();
                this.sign="bg"
             
             this.changeStep();
                 }, 3000);
           }
          else if(correct===answer&&answer===false)
            {
                if(this.sign==="bg")
                {this.sign="eq";}
           else 
           {this.sign="ls"}
            $("#character")[0].src = "/storage/Images/good.gif";
            $("#question")[0].innerText = "Thats correct, GOOD JOB";
           var txt = $("#question")[0].innerText;
           $("#correctElm")[0].play();
         this.speake(txt);
         

            setTimeout(() => {
           $("#explain").hide();
            this.popup();
              }, 2000);
         
         }

        else if(correct!=answer) {
            $("#character")[0].src = "/storage/Images/wrong.gif";
            $("#question")[0].innerText = "No Thats Wrong, Try Again ";
         var txt = $("#question")[0].innerText;

        $("#WrongElm")[0].play();
            setTimeout(() => {
          this.speake(txt);
        }, 1100);
      }
},
   
},
 created() {
        this.start();
        this.sign="bg";
        setTimeout(function() {

            Swal.fire({
                title: "Frist Step",
                text: "Click on the Sort",
                // icon: "error",
                confirmButtonText: "Ok"
            });
        }, 2000);
    }
    }
;
</script>
<style scoped>
.divBg {
    background-color: rgba(85, 169, 56, 0.5);
}
.divBg2 {
    background-color: rgba(85, 169, 56, 0.5);
}
.result {
    width: 100px;
    height: 100px;
    border: 1px solid gray;
    box-shadow: 0 0 3px 0 gray, inset 0 0 7px 0 gray;
}
.popup {
  position: fixed;
  top: 50%;
  left: 50%;
  width: 100%;
  height: 100%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  background-color: rgba(12, 12, 94, 0.986);
  color: white;
  display: none;
  padding-top: 30px;
  z-index: 999;
}
.flip-list-move {
  transition: all ease  2s;
}
.speech-bubble {
  position: relative;
  background: #cc6dc7d8;
  border-radius: 30%;
  padding: 30px;
  margin-top: 10px;
}
#h3steps {
  position: relative;
  background: #ff9dde;
  border-radius: 40%;
  padding: 25px;
  margin-right: 10px;
}

.speech-bubble:after {
  content: "";
  position: absolute;
  right: 0;
  top: 50%;
  width: 0;
  height: 0;
  border: 24px solid transparent;
  border-left-color: #cc6dc7d8;
  border-right: 0;
  border-top: 0;
  margin-top: -12px;
  margin-right: -24px;
}
</style>
