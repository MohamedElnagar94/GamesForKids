<template>
                <div class="matchedNumber" :id="id"   @dragover.prevent="allowDrop"  @drop.prevent="drop">

                <slot/>
                </div>
      
</template>
<script>

export default{
 
    props:["id"],
    methods:{
      playSound :function (sound) {
                    if(sound) {
                        var audio = new Audio(sound);
                        audio.play();
                    }
                 },
        drop: function(e){
                const pencil_id= e.dataTransfer.getData('pencil_id');
                const penc=document.getElementById(pencil_id);
                penc.style.display="inline-block";

                e.target.appendChild(penc);
                const targetDivId=e.target.id;
                if (targetDivId == "box-0"){
                   if($("#"+targetDivId+" > div").length > 0){
                        let popup = document.getElementById("myPopup");
                        popup.classList.toggle("show");
                    e.target.removeChild(penc);
                    $('.objects')[0].appendChild(penc);
                    }
                    }
                if (targetDivId == "box-1"){
                   
                    if($("#"+targetDivId+" > div").length == 1){
                        $("#"+targetDivId ).addClass("boxFull"); 
                    
                         let success='/sounds/clap.mp3';
                        this.playSound(success);    

                    }
                   if($("#"+targetDivId+" > div").length > 1){

                       let popup1=document.getElementById("myPopup1");
                        popup1.classList.toggle("show");
                    e.target.removeChild(penc);
                    $('.objects')[0].appendChild(penc);
                  
                    }
                    }
                 else if (targetDivId == "box-2"){
                    if($("#"+targetDivId+" > div").length == 2){
                        $("#"+targetDivId ).addClass("boxFull");
                         let success='/sounds/clap.mp3';
                    this.playSound(success);
                       
                    }
                    if($("#"+targetDivId+" > div").length > 2){
                    let popup2=document.getElementById("myPopup2");
                        popup2.classList.toggle("show");
                    e.target.removeChild(penc);
                    $('.objects')[0].appendChild(penc);
                    }
                }
                 else if (targetDivId == "box-3"){
                    if($("#"+targetDivId+" > div").length == 3){
                        $("#"+targetDivId ).addClass("boxFull");
                         let success='/sounds/clap.mp3';
                    this.playSound(success);
                    }
                      if($("#"+targetDivId+" > div").length > 3){
                     let popup3=document.getElementById("myPopup3");
                        popup3.classList.toggle("show");
                    e.target.removeChild(penc);
                    $('.objects')[0].appendChild(penc);
                    }
                }
                 else if (targetDivId == "box-4"){
                    if($("#"+targetDivId+" > div").length == 4){
                        $("#"+targetDivId ).addClass("boxFull");
                         let success='/sounds/clap.mp3';
                    this.playSound(success);
                    }
                      if($("#"+targetDivId+" > div").length > 4){
                     let popup4=document.getElementById("myPopup4");
                        popup4.classList.toggle("show");
                    e.target.removeChild(penc);
                    $('.objects')[0].appendChild(penc);
                    }
                }
                 else if (targetDivId == "box-5"){
                    if($("#"+targetDivId+" > div").length == 5){
                        $("#"+targetDivId ).addClass("boxFull");
                         let success='/sounds/clap.mp3';
                    this.playSound(success);
                    }
                      if($("#"+targetDivId+" > div").length > 5){
                     let popup5=document.getElementById("myPopup5");
                        popup5.classList.toggle("show");
                    e.target.removeChild(penc);
                    $('.objects')[0].appendChild(penc);
                    }
                }
                 else if (targetDivId == "box-6"){
                    if($("#"+targetDivId+" > div").length == 6){
                        $("#"+targetDivId ).addClass("boxFull");
                         let success='/sounds/clap.mp3';
                    this.playSound(success);
                    }
                      if($("#"+targetDivId+" > div").length > 6){
                      let popup6 = document.getElementById("myPopup6");
                        popup6.classList.toggle("show");
                    e.target.removeChild(penc);
                    $('.objects')[0].appendChild(penc);
                    }
                }
                 else if (targetDivId == "box-7"){
                    if($("#"+targetDivId+" > div").length == 7){
                        $("#"+targetDivId ).addClass("boxFull");
                         let success='/sounds/clap.mp3';
                    this.playSound(success);
                    }
                      if($("#"+targetDivId+" > div").length > 7){
                      let popup7 = document.getElementById("myPopup7");
                        popup7.classList.toggle("show");
                    e.target.removeChild(penc);
                    $('.objects')[0].appendChild(penc);
                    }
                }
                 else if (targetDivId == "box-8"){
                    if($("#"+targetDivId+" > div").length == 8){
                        $("#"+targetDivId ).addClass("boxFull");
                         let success='/sounds/clap.mp3';
                    this.playSound(success);
                    }
                      if($("#"+targetDivId+" > div").length > 8){
                      let popup8= document.getElementById("myPopup8");
                        popup8.classList.toggle("show");
                    e.target.removeChild(penc);
                    $('.objects')[0].appendChild(penc);
                    }
                }
                else if (targetDivId == "box-9"){
                    if($("#"+targetDivId+" > div").length == 9){
                        $("#"+targetDivId ).addClass("boxFull");
                         let success='/sounds/clap.mp3';
                    this.playSound(success);
                     

                    }
                      if($("#"+targetDivId+" > div").length > 9){

                    let popup9 = document.getElementById("myPopup9");
                        popup9.classList.toggle("show");
                    e.target.removeChild(penc);
                    $('.objects')[0].appendChild(penc);
                    }
                }
                
        }  ,
           allowDrop:function(ev) {
            ev.preventDefault();
            }
,
   
    }
}
</script>

