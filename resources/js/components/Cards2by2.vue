<template>

   <div id="cards-2-2" >
    <div id="gameControlls">
          
            <h4 >Score :</h4><span id="scoreText">{{score}} /2</span>
            <h4 >Time : </h4><span id="timerPencil" v-text="testSeconds"> </span><h3>seconds</h3>
        </div>
       <div class="row" > <button class="nextButton" v-on:click="newGame">new game</button>    
   <a class="nextButton" id="nextLevel" style="display:none;"  href="/cards-2-3"> next level </a></div>
        <div class="playBoard"  >
            <div class="flip-card"  v-for="(image,index) in randomImages" v-on:click="addFlipClass">
                <div class="eachNumber" >     
                   <div  class="matchedNumber"></div>
                    <img class="number" :src="'/storage/Images/card/fruits/'+image+'.png'"/> 
                </div>  
            </div>  
         </div> 
           
</div>

</template>

<script >
    export default {
        name:"cards-2-2",
          data() {
         return {
    images: [
      5,6,7,8,9
    ],
    images2:[
        0,1,2,3,4
    ],
    selectedImage: '',
    selectedImage2:'',
    randomImages:[],
    score:0,
    timing:null,
    testSeconds:0,
  }
  },
  created () {
      const idx = Math.floor(Math.random() * this.images.length);
      const idx2=Math.floor(Math.random() * this.images2.length);
      this.selectedImage = this.images[idx];
      this.selectedImage2 = this.images2[idx2];
      for(let n=0;n<2;n++){
          this.randomImages.push(this.selectedImage);
          this.randomImages.push(this.selectedImage2);
      } },
         methods:{
              randomize() {
      for (let i = this.randomImages.length - 1; i > 0; i--) {
        let randomIndex = Math.floor(Math.random() * i)
        let temp = this.randomImages[i]
        this.$set(this.randomImages, i, this.randomImages[randomIndex])
        this.$set(this.randomImages, randomIndex, temp)
      }
        },
        
                 timeDisplay() {
                this.timing= setInterval(() => {
		        document.getElementById('timerPencil').innerText=this.testSeconds;
                this.testSeconds++;
		        }, 1000)
            
	    },
        clearSetInterval(){
            clearInterval(this.timing);
        },
        removeFlipCard(img1,img2){
           $(img1.parentElement.parentElement).removeClass("flip-class-outer");
            $(img2.parentElement.parentElement).removeClass("flip-class-outer");
        },
        addFlipClass(e){
            this.clearSetInterval();
            this.timeDisplay();
         $(e.target.parentElement.parentElement).addClass("flip-class-outer");
           let firstImage=$(".flip-class-outer .eachNumber img")[0];
          let secondImage=$(".flip-class-outer .eachNumber img ")[1];
          console.log($(".flip-class-outer .eachNumber img")[0].src);
       console.log("inner text"+document.getElementById("scoreText"));
             if($(".matched-cards").length < 4){
                if($(".flip-class-outer").length==2){
                      if(firstImage.src == secondImage.src){
                          $(firstImage.parentElement.parentElement).removeClass("flip-class-outer");
                          $(secondImage.parentElement.parentElement).removeClass("flip-class-outer");    
                          $(firstImage.parentElement.parentElement).addClass("matched-cards");
                          $(secondImage.parentElement.parentElement).addClass("matched-cards");
                        this.score++;
                      }  
                      else{
                        setTimeout(function(){this.removeFlipCard(firstImage,secondImage)}.bind(this),1000);
                      }
                  }
             } 
            if($(".matched-cards").length == 4) {  

               setTimeout(function(){this.showAlert()}.bind(this),500);
               
                }  
        },
        showAlert(){
                swal("Great You matched all images" );
                   this.newGame();
                   document.getElementById("nextLevel").style.display="inline-block";
        },
        newGame(){
            this.testSeconds=0;
            this.clearSetInterval();
          $(".flip-card").removeClass("flip-class-outer");
           $(".flip-card").removeClass("matched-cards");
          this.randomImages=[];
          const idx = Math.floor(Math.random() * this.images.length);
          const idx2=Math.floor(Math.random() * this.images2.length);
          this.selectedImage = this.images[idx];
          this.selectedImage2 = this.images2[idx2];
          for(let n=0;n<2;n++){
              this.randomImages.push(this.selectedImage);
              this.randomImages.push(this.selectedImage2);
          } 
          this.score=0;
      this.randomize();
      

              }
         } ,
        components:{
          
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

