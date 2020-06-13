<template>
  <div id="cards-3-4">
    <div id="gameControlls">
      <h4>Score :</h4>
      <span id="scoreText">{{score}} /6</span>
      <h4>Time :</h4>
      <span id="timercards"></span>
      <h3>seconds</h3>
    </div>
    <button class="buttonCard" id="nextLevel" style="display:none;">next level</button>
    <button class="buttonCard" v-on:click="newGame">new game</button>

    <div class="playBoard">
      <div class="flip-card" :key="image" v-for="(image) in randomImages" v-on:click="addFlipClass">
        <div class="eachNumber">
          <div class="matchedNumber"></div>
          <img class="number" :src="'/storage/Images/card/animals/'+image+'.png'" />
        </div>
      </div>
    </div>
  </div>
</template>

<script >
import swal from "sweetalert";
export default {
  name: "cards-3-4",
  data() {
    return {
      images: [4, 5],
      images2: [0, 1],
      images3: [8, 9],
      images4: [2, 3],
      images5: [10, 11],
      images6: [6, 7],
      selectedImage: "",
      selectedImage2: "",
      selectedImage3: "",
      selectedImage4: "",
      selectedImage5: "",
      selectedImage6: "",
      randomImages: [],
      score: 0,
      seconds: 0
    };
  },
  created() {
    const idx = Math.floor(Math.random() * this.images.length);
    const idx2 = Math.floor(Math.random() * this.images2.length);
    const idx3 = Math.floor(Math.random() * this.images3.length);
    const idx4 = Math.floor(Math.random() * this.images4.length);
    const idx5 = Math.floor(Math.random() * this.images5.length);
    const idx6 = Math.floor(Math.random() * this.images6.length);

    this.selectedImage = this.images[idx];
    this.selectedImage2 = this.images2[idx2];
    this.selectedImage3 = this.images3[idx3];
    this.selectedImage4 = this.images[idx4];
    this.selectedImage5 = this.images2[idx5];
    this.selectedImage6 = this.images3[idx6];
    for (let n = 0; n < 2; n++) {
      this.randomImages.push(this.selectedImage);
      this.randomImages.push(this.selectedImage2);
      this.randomImages.push(this.selectedImage3);
      this.randomImages.push(this.selectedImage4);
      this.randomImages.push(this.selectedImage5);
      this.randomImages.push(this.selectedImage6);
    }

    setInterval(
      function() {
        document.getElementById("timercards").innerText = this.seconds;
        this.seconds++;
      }.bind(this),
      1000
    );
    this.randomize();
    document.getElementById("scoreText").innerText = this.score;
  },
  methods: {
    randomize() {
      for (let i = this.randomImages.length - 1; i > 0; i--) {
        let randomIndex = Math.floor(Math.random() * i);
        let temp = this.randomImages[i];
        this.$set(this.randomImages, i, this.randomImages[randomIndex]);
        this.$set(this.randomImages, randomIndex, temp);
      }
    },

    removeFlipCard(img1, img2) {
      $(img1.parentElement.parentElement).removeClass("flip-class-outer");
      $(img2.parentElement.parentElement).removeClass("flip-class-outer");
    },
    addFlipClass(e) {
      $(e.target.parentElement.parentElement).addClass("flip-class-outer");
      let firstImage = $(".flip-class-outer .eachNumber")[0].childNodes[2];
      let secondImage = $(".flip-class-outer .eachNumber")[1].childNodes[2];
      console.log("inner text" + document.getElementById("scoreText"));
      if ($(".matched-cards").length < 12) {
        if ($(".flip-class-outer").length == 2) {
          if (firstImage.src == secondImage.src) {
            $(firstImage.parentElement.parentElement).removeClass(
              "flip-class-outer"
            );
            $(secondImage.parentElement.parentElement).removeClass(
              "flip-class-outer"
            );
            $(firstImage.parentElement.parentElement).addClass("matched-cards");
            $(secondImage.parentElement.parentElement).addClass(
              "matched-cards"
            );
            this.score++;
          } else {
            setTimeout(
              function() {
                this.removeFlipCard(firstImage, secondImage);
              }.bind(this),
              1000
            );
          }
        }
      }
      if ($(".matched-cards").length == 12) {
        setTimeout(
          function() {
            this.showAlert();
          }.bind(this),
          500
        );
      }
    },
    showAlert() {
        swal("Great You matched all images");
        this.newGame();
        document.getElementById("nextLevel").style.display = "inline-block";
        let levels = JSON.parse(localStorage.getItem('levels'));
        levels[4].open = true;
        localStorage.setItem('levels',JSON.stringify(levels))
    },
    newGame() {
      $(".flip-card").removeClass("flip-class-outer");
      $(".flip-card").removeClass("matched-cards");
      this.randomImages = [];
      const idx = Math.floor(Math.random() * this.images.length);
      const idx2 = Math.floor(Math.random() * this.images2.length);
      const idx3 = Math.floor(Math.random() * this.images3.length);
      const idx4 = Math.floor(Math.random() * this.images4.length);
      const idx5 = Math.floor(Math.random() * this.images5.length);
      const idx6 = Math.floor(Math.random() * this.images6.length);
      this.selectedImage = this.images[idx];
      this.selectedImage2 = this.images2[idx2];
      this.selectedImage3 = this.images3[idx3];
      this.selectedImage4 = this.images4[idx4];
      this.selectedImage5 = this.images5[idx5];
      this.selectedImage6 = this.images6[idx6];
      for (let n = 0; n < 2; n++) {
        this.randomImages.push(this.selectedImage);
        this.randomImages.push(this.selectedImage2);
        this.randomImages.push(this.selectedImage3);
        this.randomImages.push(this.selectedImage4);
        this.randomImages.push(this.selectedImage5);
        this.randomImages.push(this.selectedImage6);
      }
      this.score = 0;
      this.seconds = 0;
      this.randomize();
    }
  },
  components: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>

