<template>
  <div class="container">
    <img :src="src" class="vloume" @click="play()" alt />
    <div class="row">
      <div class="col-md-12 d-flex justify-content-center align-items-center p-4">
        <img style="height: 75px" :src="'/storage/Images/' + count + '.png'" alt />
        <img style="height: 75px" src="/storage/Images/slash.png" alt />
        <img style="height: 75px" src="/storage/Images/10.png" alt />
      </div>
      <div class="col-md-12 d-flex justify-content-center align-items-center p-5">
        <img class="m-3" style="height: 75px" :src="'/storage/Images/' + firstNum + '.png'" alt />
        <div
          class="result d-flex justify-content-center align-items-center"
          :class="{ divBg: changeColor === true }"
          id="result"
          @dragover.prevent
          @drop="dragFinish(-1, $event)"
        ></div>
        <img class="m-3" style="height: 75px" :src="'/storage/Images/' + secondNum + '.png'" alt />

        <i
          class="fa fa-check"
          v-if="checkResult && result === resultFromDrag"
          style="font-size: 81px;color: green;margin: 10px 30px;"
        ></i>
        <i
          class="fa fa-close"
          v-if="checkResult && result !== resultFromDrag"
          style="font-size: 81px;color: red;margin: 10px 30px;"
        ></i>
      </div>
      <div class="col-md-12 d-flex justify-content-center align-items-center p-4">
        <img
          class="m-4"
          v-for="(result, index) in resultOption"
          :key="index"
          @dragover.prevent
          @dragexit="dragExit(result)"
          @dragstart="dragStart(result)"
          @dragenter="dragEnter"
          @dragleave="dragLeave(result)"
          @dragend="dragEnd"
          :draggable="draggable"
          style="height: 75px;cursor: pointer"
          :src="'/storage/Images/' + result + '.png'"
          alt
        />
      </div>
      <div
        class="col-md-12 position-relative d-flex align-items-center"
        style="justify-content: space-evenly;padding: 30px"
      >
        <img
          class="img-fluid position-absolute"
          style="width:75px;top: 30px;left: 25px;"
          src="/storage/Images/door.png"
          alt
        />
        <button class="button" v-on:click="newQuestion">{{ buttonNext }}</button>
      </div>
      <!--  audio -->
      <audio ref="audioElm" src="/storage/Images/happy.mp3"></audio>

      <!--  audio -->
    </div>
  </div>
</template>

<script>
export default {
  name: "Exam2Component",
  data() {
    return {
      questions: [],
      firstNum: null,
      secondNum: null,
      result: null,
      resultOption: ["bigger-than", "smaller-than", "equal"],
      count: 1,
      changeColor: false,
      resultFromDrag: null,
      draggable: true,
      checkResult: false,
      buttonNext: "Next Question",
      showResult: false,
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
    randFun: function() {
      return Math.floor(Math.random() * 11);
    },

    randomNumber: function() {
      this.firstNum = this.randFun();
      this.secondNum = this.randFun();
      if (this.firstNum < this.secondNum) {
        this.result = "smaller-than";
      } else if (this.firstNum > this.secondNum) {
        this.result = "bigger-than";
      } else {
        this.result = "equal";
      }
    },
    newQuestion: function() {
      if (this.showResult === true) {
        window.location.href = "/numbersExamResult";
      }
      if (this.count < 10) {
        this.randomNumber();
        this.draggable = true;
        this.checkResult = false;
        this.resultFromDrag = null;
        $("#result").html("");
        this.count++;
      }
      if (this.count === 10) {
        this.buttonNext = "Final Result";
        this.showResult = true;
      }
    },
    dragEnter: function() {
      console.log("dragenter");
    },
    dragLeave: function(num) {
      // this.changeColor = true;
      console.log("dragLeave", num);
    },
    dragEnd: function() {
      this.changeColor = false;
    },
    dragExit: function(num) {
      console.log("dragExit", num);
    },
    dragFinish: function(index, ev) {
      $("#result").append(
        `<img class="m-3" style="height: 75px" src="/storage/Images/${this.resultFromDrag}.png" alt="">`
      );
      this.draggable = false;
      this.checkResult = true;
      this.questions.push({
        firstNum: this.firstNum,
        secondNum: this.secondNum,
        result: this.result,
        resultFromDrag: this.resultFromDrag,
        answer: this.result === this.resultFromDrag
      });
      localStorage.setItem("finalResult", JSON.stringify(this.questions));
      console.log(localStorage.getItem("finalResult"));
      console.log("dragFinish", index, ev);
    },
    dragStart: function(num) {
      this.changeColor = true;
      this.resultFromDrag = num;
      console.log("dragStarttttttttt", num);
    }
  },
  created() {
    this.randomNumber();
    localStorage.setItem("finalResult", JSON.stringify([]));
  }
};
</script>

<style scoped>
.button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4caf50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {
  background-color: #3e8e41;
}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.result {
  width: 100px;
  height: 100px;
  border: 1px solid gray;
  box-shadow: 0 0 3px 0 gray, inset 0 0 7px 0 gray;
}
.divBg {
  background-color: rgba(85, 169, 56, 0.5);
}
.vloume {
  width: 72px;
  height: 49px;
  position: absolute;
  top: 20%;
  left: 50px;
}
</style>
