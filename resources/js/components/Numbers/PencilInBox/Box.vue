<template>
                <div class="matchedNumber" :id="id"   @dragover.prevent    @drop.prevent="drop">

                <slot/>
                </div>
      
</template>
<script>

export default{
 
    props:["id"],
    methods:{
        drop: e=>{

                const pencil_id= e.dataTransfer.getData('pencil_id');
                const penc=document.getElementById(pencil_id);
                penc.style.display="inline-block";

                e.target.appendChild(penc);
                const targetDivId=e.target.id;
              
                if (targetDivId == "box-1"){

                    if($("#"+targetDivId+" > div").length == 1){
                        $("#"+targetDivId ).addClass("boxFull");                      
                    }
                   if($("#"+targetDivId+" > div").length > 1){
                    alert("you already put one");
                    e.target.removeChild(penc);
                    $('.objects').appendChild(penc);
                    }
                    }
                 else if (targetDivId == "box-2"){
                    if($("#"+targetDivId+" > div").length == 2){
                        $("#"+targetDivId ).addClass("boxFull");
                       
                    }
                    if($("#"+targetDivId+" > div").length > 2){
                    alert("you already put two");
                    e.target.removeChild(penc);
                    $('.objects').appendChild(penc);
                    }
                }
                 else if (targetDivId == "box-3"){
                    if($("#"+targetDivId+" > div").length == 3){
                        $("#"+targetDivId ).addClass("boxFull");
                    }
                      if($("#"+targetDivId+" > div").length > 3){
                    alert("you already put three");
                    e.target.removeChild(penc);
                    $('.objects').appendChild(penc);
                    }
                }
                 else if (targetDivId == "box-4"){
                    if($("#"+targetDivId+" > div").length == 4){
                        $("#"+targetDivId ).addClass("boxFull");
                    }
                      if($("#"+targetDivId+" > div").length > 4){
                    alert("you already put four");
                    e.target.removeChild(penc);
                    $('.objects').appendChild(penc);
                    }
                }
                 else if (targetDivId == "box-5"){
                    if($("#"+targetDivId+" > div").length == 5){
                        $("#"+targetDivId ).addClass("boxFull");
                    }
                      if($("#"+targetDivId+" > div").length > 5){
                    alert("you already put threfivee");
                    e.target.removeChild(penc);
                    $('.objects').appendChild(penc);
                    }
                }
                 else if (targetDivId == "box-6"){
                    if($("#"+targetDivId+" > div").length == 6){
                        $("#"+targetDivId ).addClass("boxFull");
                    }
                      if($("#"+targetDivId+" > div").length > 6){
                    alert("you already put six");
                    e.target.removeChild(penc);
                    $('.objects').appendChild(penc);
                    }
                }
                 else if (targetDivId == "box-7"){
                    if($("#"+targetDivId+" > div").length == 7){
                        $("#"+targetDivId ).addClass("boxFull");
                    }
                      if($("#"+targetDivId+" > div").length > 7){
                    alert("you already put seven");
                    e.target.removeChild(penc);
                    $('.objects').appendChild(penc);
                    }
                }
                 else if (targetDivId == "box-8"){
                    if($("#"+targetDivId+" > div").length == 8){
                        $("#"+targetDivId ).addClass("boxFull");
                    }
                      if($("#"+targetDivId+" > div").length > 8){
                    alert("you already put eight");
                    e.target.removeChild(penc);
                    $('.objects').appendChild(penc);
                    }
                }
                else if (targetDivId == "box-9"){
                    if($("#"+targetDivId+" > div").length == 9){
                        $("#"+targetDivId ).addClass("boxFull");
                     

                    }
                      if($("#"+targetDivId+" > div").length > 9){

                    alert("you already put nine");
                    e.target.removeChild(penc);
                    $('.objects').appendChild(penc);
                    }
                }
                
                
        }                           
    }
}
</script>

