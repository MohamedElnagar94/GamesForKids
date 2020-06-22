<template>
<div id="playBoard">
  <div id="overlay"></div>
            <div id="modal">
           <p> hello , welcome to puzzle game ^_^</p>
            <button id="startgame" v-on:click="startTheGame">start game</button>
            </div>
              <div id="gameControlls">
          
                 <h4 >Score :</h4><span id="scoreText">{{score}} /10</span>
                  <button v-on:click="newGame" class="nextButton" >new game </button>
                  <a class="nextButton" id="nextLevel" style="display:none;"  href="/puzzle2"> next level </a>
                 </div>
               
            <img id="finalImage" src="" style="display:none"/>
              <div class="row">
              
            <div class="answer">
                <span @drop="drop" @dragover="allowDrop" ></span>
                <span @drop="drop" @dragover="allowDrop"  ></span>
                <span @drop="drop" @dragover="allowDrop" ></span>
                <span @drop="drop" @dragover="allowDrop" ></span>
                <span @drop="drop" @dragover="allowDrop" ></span>
                <span @drop="drop" @dragover="allowDrop" ></span>
                <span @drop="drop" @dragover="allowDrop" ></span>
                <span @drop="drop" @dragover="allowDrop" ></span>
                <span @drop="drop" @dragover="allowDrop" ></span>
                <span @drop="drop" @dragover="allowDrop" ></span>
             
            </div>
            <div id="generalDiv">
            <div class="shuffle">
                <canvas id="myCanvas0"  :draggable="draggable"  @dragstart="drag"@dragover.prevent>
                Your browser does not support the HTML canvas tag.
                </canvas>

                <canvas id="myCanvas1" :draggable="draggable"  @dragstart="drag" @dragover.prevent>
                Your browser does not support the HTML canvas tag.</canvas>

                <canvas id="myCanvas2"  :draggable="draggable"  @dragstart="drag" @dragover.prevent>
                Your browser does not support the HTML canvas tag.</canvas>

                <canvas id="myCanvas3"  :draggable="draggable" @dragstart="drag" @dragover.prevent>
                Your browser does not support the HTML canvas tag.</canvas>
                <canvas id="myCanvas4"  :draggable="draggable"  @dragstart="drag" @dragover.prevent>
                Your browser does not support the HTML canvas tag.</canvas>

                <canvas id="myCanvas5"  :draggable="draggable" @dragstart="drag" @dragover.prevent>
                Your browser does not support the HTML canvas tag.</canvas>
                <canvas id="myCanvas6"  :draggable="draggable" @dragstart="drag" @dragover.prevent>
                Your browser does not support the HTML canvas tag.</canvas>
                <canvas id="myCanvas7"  :draggable="draggable"  @dragstart="drag" @dragover.prevent>
                Your browser does not support the HTML canvas tag.</canvas>
                <canvas id="myCanvas8"  :draggable="draggable" @dragstart="drag" @dragover.prevent>
                Your browser does not support the HTML canvas tag.</canvas>
                <canvas id="myCanvas9"  :draggable="draggable"  @dragstart="drag" @dragover.prevent>
                Your browser does not support the HTML canvas tag.</canvas>

            </div>
                 <div id="testCanvas"></div>  
                 </div>        
      </div>
</div>
</template>



<script>
    export default {
        name: "puzzle3",
        data(){
            return {
               draggable:true,
                context:null,
                image:null,
                source:null,
                score:0,
                changeImageSource:null,
                old:null
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
                 startTheGame:function(){
                        let btn=document.getElementById("startgame");
                        let divv=document.getElementById("modal");
                        let t=document.getElementById("overlay");
                        divv.style.display="none";
                        t.style.display="none";
                        this.newGame();
                 },
            newGame:function(){
                 canvasDrawing3(); 
                  this.old=canvasImg.src;
                this.changeImageSource= randomize();
                canvasImg.src="/images/puzzle2/"+this.changeImageSource+".png";
                ccvs();
                    if(this.score==10){
                     $("#finalImage")[0].style.display="none";
                    $(".answer")[0].style.display="inline-block";
                }
                this.score=0;
                this.organizeDesign();
            },
      allowDrop:function(ev) {
            ev.preventDefault();
            }
,
         drag:function(ev) {
            ev.dataTransfer.setData("draggedCanvas", ev.target.id);
            }
,       
         drop:function (event) {
             let parent=$(".answer")[0];
             
                event.preventDefault();
            var data = event.dataTransfer.getData("draggedCanvas");
            if((event.target==parent.children[0] && data=="myCanvas0") ||
               (event.target==parent.children[1] && data=="myCanvas2") ||
              (event.target==parent.children[2] && data=="myCanvas4") ||
               (event.target==parent.children[3] && data=="myCanvas6")|| 
                (event.target==parent.children[4] && data=="myCanvas8") ||
               (event.target==parent.children[5] && data=="myCanvas1") ||
                (event.target==parent.children[6] && data=="myCanvas3") ||
               (event.target==parent.children[7] && data=="myCanvas5") ||
                (event.target==parent.children[8] && data=="myCanvas7") ||
               (event.target==parent.children[9] && data=="myCanvas9") ){
                
            event.target.appendChild(document.getElementById(data));
            this.score++;
                console.log(this.score);
            }
             
         if(this.score==10){
              let success='/sounds/clap.mp3';
              this.playSound(success);
             $("#finalImage")[0].src=this.old;
             $("#finalImage")[0].style.display="inline-block";
             $(".answer")[0].style.display="none";
             document.getElementById("nextLevel").style.display="inline-block";

         }
         
            },
            organizeDesign:function(){
                
                   if($(".shuffle canvas").length<=4){
                    $(".shuffle")[0].style.flex=2;
                }
                  if($(".shuffle canvas").length<=2){
                    $(".shuffle")[0].style.flex=1;
                }
                if($(".shuffle canvas").length>4){
                    $(".shuffle")[0].style.flex=3;
                }
                  if($(".shuffle canvas").length=0){
                      $(".shuffle")[0].style.flex=0;
                }
            }
        },
         
        mounted(){               
         this.newGame();
          
        },
        created() {

        }
    };

var canvasImg=new Image();
  let imageSource =randomize();
canvasImg.src= "/images/puzzle2/"+imageSource+".png";
  function canvasDrawing3(){   
          
                var newCnvas = document.getElementById("testCanvas");
               
                var imagePieces = [];
                var i=0;
                let counter=0;
                            for(var x = 0; x < 5; ++x) {
                                for(var y = 0; y < 2; ++y) {
                                    
                                    var p=imagePieces[i++];
                                    var canvas = document.getElementById("myCanvas"+counter);
                                    var context=canvas.getContext("2d");

                                    canvas.width =120;
                                    canvas.height = 150;
                                    context.clearRect(0, 0, canvas.width, canvas.height);
                                    
                                     imagePieces.push(context);
                                    context.drawImage(canvasImg, x * 120,y*150 ,120,150, 0, 0, canvas.width, canvas.height);
                                    shuffle(imagePieces);
                                  newCnvas.appendChild(imagePieces[counter].canvas);  
                                   counter++;
                                  
                            }
                        }
                      
            };
                 function ccvs(){
                var newParent = document.getElementsByClassName('shuffle');
                var answerSpan=$(".answer span");
                for(let as=0;as<10;as++){
                if(answerSpan[as].childNodes.length>0){
                newParent[0].appendChild(answerSpan[as].childNodes[0]);
                }
                }

                };
         function shuffle(a){
            for(var j, x, i = a.length; i; j = Math.floor(Math.random() * i), x = a[--i], a[i] = a[j], a[j] = x);
            return a;
            };
                function randomize() {
                  let randomNumbers=[];
                  
                  for(let n=0;n<7;n++){
                    randomNumbers.push(n);
                    }
                    const idx = Math.floor(Math.random() * randomNumbers.length);
                let r = randomNumbers[idx];
                return r;

        }
         
       
         </script>
