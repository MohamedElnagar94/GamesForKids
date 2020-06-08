<template >
  <div class="container" :key="componentKey">
    <div id="content">
      <img :src="src" class="vloume" @click="play()" alt />

      <img src="/storage/Images/congrates.gif" class="celebrateimg" v-if="correctNumber == 10 " alt />
      <div class="row">
        <div class="cardPile">
          <img
            class="number img-fluid column"
            :id="number"
            v-for="number in numbers"
            draggable="true"
            @dragstart="dragstart(number,$event)"
            :key="number"
            :src="'/storage/Images/' + number + '.png'"
          />
        </div>
      </div>
      <div class="row">
        <div class="cardSlots">
          <div
            :id="word.title"
            @drop="drop(index+1,$event)"
            @dragover.prevent
            class="words column"
            v-for="(word,index) in words"
            :key="index"
            :draggable="word.draggable"
          >{{ word.title }}</div>
        </div>
      </div>

      <div class="row">
        <div class=" numbernames" >
          <div
            :id="word.title"
            class="words namesInOtherdiv column"
            v-for="(word,index) in words"
            :key="index"
          >{{ word.title }}</div>
        </div>
      </div>

      <!-- sucess message -->
      <button
        class="btn btn-primary mt-3 playAgain"
        @click="forceRerender()"
        v-if="correctNumber == 10 "
      >Play Again</button>

      <!-- end of success message -->

      <!--  audio -->
      <audio ref="audioElm" src="/storage/Images/happy.mp3"></audio>

      <!--  audio -->
    </div>
  </div>
</template>

<script>
export default {
  name: "OrderNumber",
  mounted() {
    console.log("Component mounted.");
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
    start: function() {
      this.numbers = [];
      this.words = [
        { title: "one", dragable: true },
        { title: "two", dragable: true },
        { title: "three", dragable: true },
        { title: "four", dragable: true },
        { title: "five", dragable: true },
        { title: "six", dragable: true },
        { title: "seven", dragable: true },
        { title: "eight", dragable: true },
        { title: "nine", dragable: true },
        { title: "ten", dragable: true }
      ];
      for (let i = 0; i < 10; i++) {
        let randResult = this.randFun(1, 10);

        while (this.numbers.includes(randResult) === true) {
          randResult = this.randFun(1, 10);
        }
        this.numbers.push(randResult);
      }
    },
    randFun: function(minNum, maxNum) {
      return Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum;
    },

    dragstart(number, event) {
      let col = event.dataTransfer.setData("text", event.target.id);
      console.log(col, event);
      this.dragnumber = number;
      console.log(number);
    },
    drop(index, event) {
      if (index == this.dragnumber) {
        console.log(true);

        event.preventDefault();
        let data = event.dataTransfer.getData("text");
        event.target.innerHTML = "";
        event.target.appendChild(document.getElementById(data));
        this.words[index - 1].dragable = false;
        this.correctNumber++;
        console.log(this.correctNumber);
      } else {
        console.log(false);
      }
    },
    forceRerender: function() {
      if (this.correctNumber == 10) {
        this.componentKey += 1;
        this.correctNumber = 0;
      }
    }
  },
  data() {
    return {
      numbers: [],
      words: [],
      dragnumber: null,
      correctNumber: 0,
      renderComponent: true,
      componentKey: 0,
      src: "/storage/Images/close.png"
    };
  },
  created() {
    this.start();
  }
};
</script>

<style scoped>
body {
  margin: 30px;
  line-height: 1.8em;
}
img {
  cursor: pointer;
}
#content {
  margin: 20px 70px;
  text-align: center;
  -moz-user-select: none;
  -webkit-user-select: none;
  user-select: none;
  position: relative;
}
.cardSlots {
  margin: 27px auto 0 auto;
  background: rgb(182, 182, 187);
  display: flex;
}

.cardPile {
  margin: 0 auto;
  /* background: rgb(201, 201, 202); */
  display: flex;
}
.cardSlots,
.cardPile {
  width: 860px;
  height: 170px;
  padding: 20px;
  /* border: 2px solid rgb(95, 95, 95); */
  border-radius: 15px;
  -moz-box-shadow: 0 0 0.3em rgba(41, 40, 40, 0.8);
  -webkit-box-shadow: 0 0 0.3em rgba(37, 37, 37, 0.8);
  box-shadow: 0 0 0.3em rgba(41, 40, 40, 0.8);
}
.cardSlots div,
.cardPile div {
  float: left;
  width: 80px;
  height: 100px;
  display: flex;
  justify-content: center;
  align-items: center;
  /* border: 2px solid rgb(rgb(77, 72, 72), rgb(68, 116, 68), rgb(66, 66, 107)); */
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  margin: 0 0 0 10px;
  background: #fff;
}
.cardSlots div:first-child,
.cardPile div:first-child {
  margin-left: 0;
}
.cardSlots div.hovered {
  background: #aaa;
}
.cardPile div {
  background: rgb(123, 24, 136);
  color: #fff;
  font-size: 50px;
  text-shadow: 0 0 3px #000;
}
.cardPile div.ui-draggable-dragging {
  -moz-box-shadow: 0 0 0.5em rgba(0, 0, 0, 0.8);
  -webkit-box-shadow: 0 0 0.5em rgba(0, 0, 0, 0.8);
  box-shadow: 0 0 0.5em rgba(0, 0, 0, 0.8);
}

.words {
  font-size: 26px;
  font-weight: bold;
}
.number {
  /* position: relative;  */
  /* width: 80px; */
  height: 100px;
  color: #fff;
  text-shadow: 0 0 3px #000;
  display: flex;
}
.celebrateimg {
  position: absolute;
  text-align: center;
  margin: 10px auto;
  top: -38%;
  left: 25%;
}
.block {
  display: inline;
}

.vloume {
  width: 72px;
  height: 49px;
  position: absolute;
  top: -25%;
  left: -10%;
}
.playAgain {
  font-weight: bold;
  font-size: 24px;
  position: absolute;
  left: 40%;
}
.numbernames{
  
  position: absolute;
  top: 87%;
  left: 6%;
  font-weight: 500;
}
.namesInOtherdiv{
float: left;
  width: 74px;
  height: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  margin: 0 0 0 10px;
  background: rgb(167, 154, 154);
  font-size: 22px;
  color: white;
}

.namesInOtherdiv:nth-child(even) {
  background: rgb(204, 49, 204);
}

.namesInOtherdiv:nth-child(odd) {
  background: rgb(209, 112, 47);
}
</style>
