<template>

   <div id="test">
     <div id="gameControlls" >
            <h1 ></h1>
            <h4 >Score :</h4><span id="scoreText" ></span>
            <h4 >Time : </h4><span id="timerPencil" v-text="testSeconds"> </span><h3>seconds</h3>
        </div>
        <div class="row"><a class="nextButton" id="nextLevel" style="display:none;"  href="/"> Next Level </a>
       <!--<button class="nextButton" id="nextLevel"  v-on:click="newGame" > New Game </button>--></div>
       
        <div id="blockGame" style="
        width:100%;
        height:90%;
        background-color:rgba(230,230,230,.2);
        position:absolute;
        top:12em;
        left:0px;
        z-index: -3;"
        ></div>
       <div class="row"v-on:mouseover="scoreCalculate" >    
                <div class="eachNumber col-2 " >
                
                    <div class="number popup"><span >0</span>
                    <h6 class="popuptext" id="myPopup"> see ... Zero is empty </h6> </div>   
                    
                    <Box id="box-0" class="up "></Box>
                    
                </div>   
            <div class="eachNumber col-2">
                    <div class="number"><span >1</span></div>    
                    <Box id="box-1" class="up"></Box>
                </div> 
                 <div class="eachNumber col-2">
                    <div class="number">
                    <span >2</span>
                    </div>    
                    <Box id="box-2" class="up"></Box>
                </div> 
                 <div class="eachNumber col-2">
                    <div class="number"><span >3</span></div>    
                    <Box id="box-3" class="up"></Box>
                </div> 
                <div class="eachNumber col-2">
                    <div class="number"><span >4</span></div>    
                    <Box id="box-4" class="up">
                    </Box>
                </div> 
                
                <div class="objects col-11" id="pencilPlace" >

                    <div style="display:inline-block" v-for="index in 50" :key="index">
                        <Pencil :id="index" :draggable="draggable" v-on:drag="scoreCalculate" style="display:inline-block" >
                            <div class="pencil-top"></div>
                            <div class="pencil-body"></div>
                            <div class="pencil-bottom"></div>
                        </Pencil>
                   </div>
                </div>  

            <div class="eachNumber col-2">
              <Box id="box-5" class="down"></Box>
                <div class="number"><span>5</span></div>
                
            </div>
            <div class="eachNumber col-2">
              <Box id="box-6" class="down"></Box>
                <div class="number"><span>6</span></div>
                
            </div>        
            <div class="eachNumber col-2">
              <Box id="box-7" class="down"></Box>
                <div class="number"><span>7</span></div>
                
            </div>
            <div class="eachNumber col-2">
              <Box id="box-8" class="down"></Box>
                <div class="number"><span>8</span></div>
            </div>
            <div class="eachNumber col-2">
              <Box id="box-9" class="down"></Box>
                <div class="number"><span>9</span></div>
            </div> 
            </div>
</div>

</template>

<script>
import Box from './Box';
import Pencil from './Pencilsbox';
    export default {

        name:"test",
        data(){
            return{
                timing:null,
                testSeconds:0,
                draggable:true,
            }
        },
        methods:{
            newGame:function(){
                    
            },
            timeDisplay () {
                this.timing= setInterval(() => {
		        document.getElementById('timerPencil').innerText=this.testSeconds;
                this.testSeconds++;
		        }, 1000)
            
	    },
        clearSetInterval(){
            clearInterval(this.timing);
        },
           scoreCalculate:function(){
            document.getElementById("scoreText").innerText=$(".boxFull").length;
            
             if(document.getElementById("scoreText").innerText==3){
                 
                        document.getElementById("scoreText").innerText=10;
                        //swal("Great You now know how to count ^__^"  );
                        document.getElementById("scoreText").innerText=0;
                        document.getElementById("blockGame").style.zIndex=3;
                        $("#nextLevel")[0].style.display="inline-block"; 
                         let popup = document.getElementById("myPopup");
                        popup.classList.toggle("show");
                        this.testSeconds=0;
                        this.clearSetInterval();
                    }
                    
                }
            

        }
        ,
        components:{
            Box,
            Pencil
        },
        mounted() {
            if(document.getElementById("scoreText").innerText<3){
                        this.timeDisplay();
            }else if(document.getElementById("scoreText").innerText==3){
                this.testSeconds=0;
            }
            console.log('Component mounted.')
        },
        created(){
           
        }
    }
</script>
