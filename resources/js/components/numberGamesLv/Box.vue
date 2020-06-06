<template>
                       
                <div class="matchedNumber" :id="id"   @dragover.prevent   @drop.prevent="drop">
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
                console.log($("#"+targetDivId+" > div").length);

                if (targetDivId == "box-1"){
                    if($("#"+targetDivId+" > div").length == 1){
                    $("#"+targetDivId+" > div")[0];
                        console.log("hello condition");
                        $("#"+targetDivId ).addClass("hideBox");
                        $("#"+targetDivId+"> div")[0].className+=" hidePencil";
                        
                    }}
              else  if (targetDivId == "box-2"){
                    if($("#"+targetDivId+" > div").length == 2){
                    $("#"+targetDivId+" > div")[0];
                        console.log("hello condition");
                        $("#"+targetDivId ).addClass("hideBox");
                        $("#"+targetDivId+"> div")[0].className+=" hidePencil";
                        $("#"+targetDivId+"> div")[1].className+=" hidePencil";
                        
                    }}
                 else if (targetDivId == "box-3"){
                    if($("#"+targetDivId+" > div").length == 3){
                    $("#"+targetDivId+" > div")[0];
                        console.log("hello condition");
                        $("#"+targetDivId ).addClass("hideBox");
                        $("#"+targetDivId+"> div")[0].className+=" hidePencil";
                        $("#"+targetDivId+"> div")[1].className+=" hidePencil";
                        $("#"+targetDivId+"> div")[2].className+=" hidePencil";
                    }
                }
                
                  else if (targetDivId == "box-4"){
                    if($("#"+targetDivId+" > div").length == 4){
                    $("#"+targetDivId+" > div")[0];
                        console.log("hello condition");
                        $("#"+targetDivId ).addClass("hideBox");
                        $("#"+targetDivId+"> div")[0].className+=" hidePencil";
                        $("#"+targetDivId+"> div")[1].className+=" hidePencil";
                        $("#"+targetDivId+"> div")[2].className+=" hidePencil";
                        $("#"+targetDivId+"> div")[3].className+=" hidePencil";
                    }
                }
               
                else if (targetDivId == "box-5"){
                    if($("#"+targetDivId+" > div").length == 5){
                    $("#"+targetDivId+" > div")[0];
                        console.log("hello condition");
                        $("#"+targetDivId ).addClass("hideBox");
                        for(i=0; i< ($("#"+targetDivId+" > div").length)+1 ; i++){
                            $("#"+targetDivId+"> div")[i].className+=" hidePencil";
                            console.log( $("#"+targetDivId));
                        }
                    }
                }
        }
    }
}
</script>

