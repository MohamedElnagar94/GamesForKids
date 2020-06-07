<template>
  <div class="container">
    <div id="content">
      <div class="row">
        <div id="cardPile">
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
        <div id="cardSlots">
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

      <!-- sucess message -->
      <button class="btn btn-success" v-on="playAgain()" v-if="correctNumber == 10 ">play again</button>
      <!-- end of success message -->
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
    // forceRender: function(){
    //   this.renderComponent = false;
    //   this.$nextTick().then( () => {
    //     this.renderComponent = true;
    //   })
    // },
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
    playAgain: function() {
      
      if (this.correctNumber == 10) {
        // this.forceRender();
        window.location.href = '/order';
      }
    }
  },
  data() {
    return {
      numbers: [],
      words: [],
      dragnumber: null,
      correctNumber: 0,
      renderComponent:true
    };
  },
  created() {
    this.start()
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
}
#cardSlots {
  margin: 50px auto 0 auto;
  background: rgb(182, 182, 187);
  display: flex;
}

#cardPile {
  margin: 0 auto;
  /* background: rgb(201, 201, 202); */
  display: flex;
}
#cardSlots,
#cardPile {
  width: 860px;
  height: 140px;
  padding: 20px;
  /* border: 2px solid rgb(95, 95, 95); */
  border-radius: 15px;
  -moz-box-shadow: 0 0 0.3em rgba(41, 40, 40, 0.8);
  -webkit-box-shadow: 0 0 0.3em rgba(37, 37, 37, 0.8);
  box-shadow: 0 0 0.3em rgba(41, 40, 40, 0.8);
}
#cardSlots div,
#cardPile div {
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
#cardSlots div:first-child,
#cardPile div:first-child {
  margin-left: 0;
}
#cardSlots div.hovered {
  background: #aaa;
}
#cardPile div {
  background: rgb(123, 24, 136);
  color: #fff;
  font-size: 50px;
  text-shadow: 0 0 3px #000;
}
#cardPile div.ui-draggable-dragging {
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

@media screen and (max-width: 992px) {
  .column {
    flex: 50%;
  }
}

@media screen and (max-width: 600px) {
  .row {
    flex-direction: column;
  }
}
</style>
