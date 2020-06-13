<template >
    <div class="container" :key="componentKey">
        <div class="row position-relative">
            <img :src="src" class="vloume" @click="play()" alt />
            <img src="/storage/Images/congrates.gif" class="celebrateimg" v-if="correctNumber == 10"/>
            <div :class="correctNumber == 10 ? 'col-md-8' : ''">
                <div class="cardPile" v-if="correctNumber != 10">
                    <img class="number img-fluid column" :id="number" v-for="number in numbers" draggable="true" @dragstart="dragstart(number,$event)" :key="number" :src="'/storage/Images/' + number + '.png'"/>
                </div>
                <div class="cardSlots">
                    <div v-for="(word,index) in words" :key="index">
                        <div :id="word.title" @drop="drop(index+1,$event)" @dragover.prevent class="words column" :draggable="word.draggable">{{ word.title }}</div>
                        <div :id="word.title" class="numbernames words namesInOtherdiv column">{{ word.title }}</div>
                    </div>
                </div>
                <!-- sucess message -->
            </div>
            <div v-if="correctNumber == 10" class="col-md-4 d-flex justify-content-center align-items-center">
                <div class="col-md-12 position-relative">
                    <div style="width: 100%;">
                        <div class="pt-3 text-center" style="font-size: 50px;font-weight: bold;">
                            <p class="text-success">
                                <span class="d-block">Well Done</span>
                                <span class="d-block" style="font-size: 35px;">My Friend</span>
                            </p>
                            <img class="img-fluid" style="width: 55%;" src="/storage/Images/boy4.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of success message -->
            <!--  audio -->
            <audio ref="audioElm" src="/storage/Images/happy.mp3"></audio>
            <!--  audio -->
        </div>
        <div class="w-100 text-center">
            <button class="btn btn-primary mt-3 playAgain" @click="forceRerender()" v-if="correctNumber == 10">Play Again</button>
        </div>
        <div class="col-md-12 position-relative d-flex align-items-center" style="justify-content: space-evenly;padding: 30px">
            <a href="/levels">
                <img style="width: 100px" src="/storage/Images/door.png" alt="Prev Exam" data-toggle="tooltip" title="Next Level" data-placement="top"/>
            </a>
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
        if (this.correctNumber == 10) {
            let levels = JSON.parse(localStorage.getItem('levels'));
            levels[3].open = true;
            localStorage.setItem('levels',JSON.stringify(levels))
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
  /* display: flex; */
}

.cardPile {
  /* margin: 0 auto; */
  /* background: rgb(201, 201, 202); */
  /* display: flex; */
}
.cardSlots,
.cardPile {
  width: 100%;
  /* height: 170px; */
  padding: 20px;
  /* border: 2px solid rgb(95, 95, 95); */
  border-radius: 15px;
  text-align: center;
  -moz-box-shadow: 0 0 0.3em rgba(41, 40, 40, 0.8);
  -webkit-box-shadow: 0 0 0.3em rgba(37, 37, 37, 0.8);
  box-shadow: 0 0 0.3em rgba(41, 40, 40, 0.8);
}
.cardSlots div div:first-child,
.cardPile div{
  /* float: left; */
  width: 90px;
  height: 100px;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  /* border: 2px solid rgb(rgb(77, 72, 72), rgb(68, 116, 68), rgb(66, 66, 107)); */
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  margin: 0 10px;
  background: #fff;
}
.cardSlots div:first-child,
.cardPile div:first-child {
  /* margin-left: 0; */
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
  /* display: flex; */
    margin: 0 10px;
}
.celebrateimg {
    position: absolute;
    /* text-align: center; */
    /* margin: 10px auto; */
    top: 35%;
    left: 35%;
    transform: translate(-50%, -50%);
    width: 320px;
    z-index: 999;
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
  /* position: absolute; */
  /* left: 40%; */
}
.numbernames{

  /* position: absolute; */
  /* top: 87%; */
  /* left: 6%; */
  font-weight: 500;
}
.namesInOtherdiv{
/* float: left; */
      /* float: left; */
    width: auto;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    margin: 0 10px;
    background: rgb(167, 154, 154);
    font-size: 22px;
    color: white;
    margin-top: 10px;
}

.namesInOtherdiv:nth-child(even) {
  background: rgb(204, 49, 204);
}

.namesInOtherdiv:nth-child(odd) {
  background: rgb(209, 112, 47);
}
.cardSlots div{
    display: inline-grid;
    margin-bottom: 5px;
}
</style>
