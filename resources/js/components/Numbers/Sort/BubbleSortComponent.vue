<template>
  <div class="container" id="ParentContainer">
    <img :src="src" class="vloume" @click="play()" alt />
    <div class="row" v-for="obj in stepsArrayObject" :key="obj">
      <div
        class="col-md-8 d-flex justify-content-center align-items-center p-4 mt-3"
        style=" background-color: rgba(188, 239, 252, 0.829);"
      >
        <div>
          <h3 class="d-block justify-content-center align-items-center">Step : {{ obj.step }}</h3>
          <div
            class="col-md-2 d-flex justify-content-center align-items-center p-4"
            v-for="element in obj.numberArraySteps"
            :key="element"
          >
            <img class="ml-10" style="height:75px" :src="'/storage/Images/' + element + '.png'" />
          </div>
        </div>
      </div>
      <div
        class="col-md-4 d-flex justify-content-center align-items-center"
        style="text-align:center;"
      >
        <img style="height:130px" :src="'/storage/Images/good.jpg'" alt />
      </div>
    </div>

    <div class="row" :style="[start == end ? { display: 'none' } : '']">
      <div class="col-md-8 d-flex justify-content-center align-items-center p-4 mt-3">
        <h3
          class="col-md-2 d-flex justify-content-center align-text-center"
          id="h3steps"
        >Step: {{ steps + 1 }}</h3>
        <div>
          <div
            v-for="(element, index) in numbersArr"
            :key="element"
            class="col-md-2 d-flex justify-content-center align-items-center p-4 mt-3"
          >
            <div>
              <img
                style="height:75px"
                :class="{
                                    selected:
                                        index == start || index == start + 1,
                                    swapFirst: index == start,
                                    swapSecond: index == start + 1
                                }"
                :src="'/storage/Images/' + element + '.png'"
                @click="popup()"
                alt
              />
              <img
                :style="[
                                    index == start || index == start + 1
                                        ? { height: '100px', width: '100%' }
                                        : { display: 'none' }
                                ]"
                src="/storage/Images/selectarrow.gif"
              />
            </div>
          </div>
        </div>
      </div>
      <div
        class="col-md-4 d-flex justify-content-center align-items-center"
        style="text-align:center;"
      >
        <img :src="'/storage/Images/hello.gif'" alt />
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
      <div class="row d-flex justify-content-center align-items-center pt-5">
        <hgroup class="col-md-3 speech-bubble">
          <h1 id="question">
            Is number {{ numbersArr[start] }} BIGGER than number
            {{ numbersArr[start + 1] }}?
          </h1>
        </hgroup>
        <img
          id="character"
          class="col-md-2"
          :src="'/storage/Images/hello2.gif'"
          alt
          style="line-height: 5"
        />
      </div>

      <div class="justify-content-center align-items-center row m-t-30">
        <img class="col-md-1 m-5" :src="'/storage/Images/' + numbersArr[start] + '.png'" alt />
        <img class="col-md-1 m-5" :src="'/storage/Images/bigger-than.png'" alt />
        <img class="col-md-1 m-5" :src="'/storage/Images/' + numbersArr[start + 1] + '.png'" alt />
      </div>

      <div class="justify-content-center align-items-center row m-t-30">
        <button
          class="btn btn-success col-md-3"
          style="font-size: 30px; padding: 5px 5px; margin:10px 20px"
          @click="check(true)"
        >
          <i class="fa fa-check"></i>
          Yes, Swap
        </button>
        <button
          class="btn btn-danger col-md-3"
          style="font-size: 30px; padding: 5px 5px; margin:10px 20px"
          @click="check(false)"
        >
          <i class="fa fa-times"></i>
          No, Don't Swap
        </button>
      </div>
    </div>
    <!--  audio -->
    <audio ref="audioElm" src="/storage/Images/happy.mp3"></audio>
    <audio id="correctElm" src="/storage/Sound/correct.mp3"></audio>
    <audio id="WrongElm" src="/storage/Sound/Wrong-answer.mp3"></audio>
    <audio id="applausElm" src="/storage/Sound/congrats-applaus.mp3"></audio>
    <audio id="fireworkElm" src="/storage/Sound/firework.mp3"></audio>

    <!--  audio -->
  </div>
</template>

<script>
export default {
  name: "BubleSortComponent",
  data() {
    return {};
  },
  data() {
    return {
      numbersArr: [1, 2, 3, 4, 5],
      stepsArrayObject: [],
      start: 0,
      end: 5,
      synth: window.speechSynthesis,
      steps: 0,
      answer: "hello",
      src: "/storage/Images/close.png"
    };
  },

  methods: {
    play: function(event) {
      var a = this.$refs.audioElm;
      if (a.paused) {
        a.play();
        this.src = "/storage/Images/open.png";
      } else {
        a.pause();
        this.src = "/storage/Images/close.png";
      }
    },

    popup: function() {
      var txtInput =
        "Is number" +
        this.numbersArr[this.start] +
        " BIGGER than number " +
        this.numbersArr[this.start + 1] +
        "?";
      $("#character")[0].src = "/storage/Images/hello2.gif";
      $("#question")[0].innerText = txtInput;
      this.speake(txtInput);

      $("#explain").show();
    },
    speake: function(txt) {
      //audio text to speach
      if (speechSynthesis !== undefined) {
        var toSpeak = new SpeechSynthesisUtterance(txt);
        toSpeak.voice = this.synth.getVoices()[0];
        this.synth.speak(toSpeak);
      }
    },
    check: function(answer) {
      var correctAnswer =
        this.numbersArr[this.start] > this.numbersArr[this.start + 1];
      if (correctAnswer === answer) {
        $("#character")[0].src = "/storage/Images/good.gif";
        $("#question")[0].innerText = "Thats correct, GOOD JOB";
        var txt = $("#question")[0].innerText;

        $("#correctElm")[0].play();
        this.speake(txt);

        setTimeout(() => {
          $("#explain").hide();
          this.bubbleSort();
        }, 3000);
      } else {
        $("#character")[0].src = "/storage/Images/wrong.gif";
        $("#question")[0].innerText = "No Thats Wrong, Try Again ";
        var txt = $("#question")[0].innerText;

        $("#WrongElm")[0].play();
        setTimeout(() => {
          this.speake(txt);
        }, 1100);
      }
    },

    bubbleSort: function() {
      //if the array un sorted

      if (this.start < this.end) {
        if (this.numbersArr[this.start] > this.numbersArr[this.start + 1]) {
          var temp = this.numbersArr[this.start];
          this.numbersArr[this.start] = this.numbersArr[this.start + 1];
          this.numbersArr[this.start + 1] = temp;
        }
        this.start++;
      }
      if (this.start == this.end) {
        this.end--;
        this.start = 0;
      }
      this.steps++;
      this.answer = "hello2";

      if (this.end == 0) {
        this.endGame();
      }
      var previousArray = this.numbersArr.slice();
      var newObj = {
        step: this.steps,
        numberArraySteps: previousArray
      };
      this.stepsArrayObject.push(newObj);
    },
    endGame: function() {
      $("#applausElm")[0].play();

      $("#congrats").show();
      $("#fireworkElm")[0].play();
    }
  },
  computed: {},
  created() {
    var array = [1, 2, 3, 4, 5, 6];
    var newarr = array.slice();
    for (var i = newarr.length - 1; i > 0; i--) {
      var j = Math.floor(Math.random() * (i + 1));
      var temp = newarr[i];
      newarr[i] = newarr[j];
      newarr[j] = temp;
    }
    this.numbersArr = newarr;

    var previousArray = this.numbersArr.slice();
    var newObj = {
      step: "original",
      numberArraySteps: previousArray
    };
    this.stepsArrayObject.push(newObj);
  }
};
</script>

<style scoped>
.vloume {
  width: 72px;
  height: 49px;
  position: absolute;
  top: 20%;
  left: 50px;
}
.selected {
  font-size: 30px;
  margin: 0 40px;
  position: relative;
  background-color: blue;
  animation-duration: 4s;
}

.arrow {
  width: 50px;
  height: 50px;
  display: block;
}
.popup {
  position: fixed;
  top: 50%;
  left: 50%;
  width: 90%;
  height: 100%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  background-color: rgba(1, 1, 22, 0.959);
  color: white;
  display: none;
  padding-top: 30px;
  z-index: 999;
}
.swapFirst {
  animation: firstSelect;
  animation-duration: 4s;
  animation-delay: 1s;
  animation-iteration-count: 2;
}
.swapSecond {
  animation: secondSelect;
  animation-duration: 4s;
  animation-delay: 1s;
  animation-iteration-count: 2;
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
@keyframes firstSelect {
  from {
    background-color: red;
    left: 0px;
    top: 0px;
  }

  25% {
    background-color: yellow;
    left: 0px;
    top: 50px;
  }
  50% {
    background-color: blue;
    left: 100px;
    top: 50px;
  }
  to {
    background-color: green;
    left: 100px;
    top: 0px;
  }
}

@keyframes secondSelect {
  from {
    background-color: red;
    left: 0px;
    top: 0px;
  }

  25% {
    background-color: yellow;
    left: 0px;
    top: -50px;
  }
  50% {
    background-color: blue;
    left: -100px;
    top: -50px;
  }
  to {
    background-color: green;
    left: -100px;
    top: 0px;
  }
}
</style>
