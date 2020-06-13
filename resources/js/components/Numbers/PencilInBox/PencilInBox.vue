<template>

   <div id="test">
     
       <div class="row" v-on:mouseover="scoreCalculate">    
                <div class="eachNumber col-2">
                    <div class="number"><span >0</span></div>    
                    <div id="box-0" class="matchedNumber up"></div>
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
                        <Pencil :id="index" draggable="true" v-on:drag="scoreCalculate" style="display:inline-block" >
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
import swal from 'sweetalert';
new Vue({
         
    "el":"#gameControlls",
    "data":{
seconds:0,

    },
    methods:{
       
    }
  
});


  

import Box from './Box';
import Pencil from './Pencilsbox';
    export default {
        name:"test",
        methods:{
              scoreCalculate:function(){
   
    document.getElementById("scoreText").innerText=$(".boxFull").length;
    //console.log("length"+$(".boxFull").length + "scoretext" +document.getElementById("scoreText").innerText)
             if(document.getElementById("scoreText").innerText==9){
                        document.getElementById("scoreText").innerText=10;
                        swal("Great You now know how to count ^__^"  );
                    }
                }
        }
        ,
        components:{
            Box,
            Pencil
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
