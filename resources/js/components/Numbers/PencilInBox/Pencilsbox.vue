<template>

    <div 
    :id="id" 
    class="pencil"
    :draggable="draggable"
     v-on:dragstart="dragStart"
     v-on:dragover.stop
     >
        <slot/>
    </div>
</template>
<script>
export default{
    props:['id','draggable'],
    methods:{
        dragStart: e =>{
          
            const target =e.target;
              e.dataTransfer.setData('pencil_id',target.id);
               setTimeout(()=>{
                    target.style.display="none";
               },0);
        }
    }
}
</script>