<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="position-relative">
                <img class="img-fluid background" usemap="#levels" src="/storage/Images/levels.png" alt="">
                <a v-for="(level,index) in levels" v-on:mouseover="playSound(index)" v-on:click="stopPreventDefult($event,index)" class="allLevels" :class="['level' + level.level,level.open === true ?'outer-circle level'+level.level+'active': '']"  :key="index" :href="level.open === true ? level.href : '#'">
                    <div>
                        <img v-if="level.open === false" class="img-fluid" src="/storage/Images/lock.png" alt="">
                    </div>
                    <audio :id="'soundLevel' + level.level" :key="index" :src="'/storage/Sound/'+ level.sound"></audio>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                levels:[]
            }
        },
        methods:{
            stopPreventDefult:function(e,index){
                if(this.levels[index].open === false){
                    e.preventDefault()
                }
            },
            playSound:function(index){
                let hoverLevel = document.getElementById(`soundLevel${this.levels[index].level}`)
                hoverLevel.currentTime = 0;
                hoverLevel.play()
            }
        },
        created(){
            let checkLevels = JSON.parse(localStorage.getItem('levels'))
            if(checkLevels === null){
                let allLevels = [
                    {level: 1,open:true,href:"/numbers",sound:"level 1.mp3"},
                    {level: 2,open:false,href:"/count",sound:"level 2.mp3"},
                    {level: 3,open:false,href:"/pencilInBox",sound:"level 3.mp3"},
                    {level: 4,open:false,href:"/exam2",sound:"level 4.mp3"},
                    {level: 5,open:false,href:"/order",sound:"level 5.mp3"},
                    {level: 6,open:false,href:"/numbersExam",sound:"level 6.mp3"},
                    {level: 7,open:false,href:"#",sound:"level 7.mp3"},
                ]
                localStorage.setItem('levels',JSON.stringify(allLevels))
                this.levels = JSON.parse(localStorage.getItem('levels'))
            }else{
                this.levels = JSON.parse(localStorage.getItem('levels'))
            }
        }
    }
</script>

<style scoped>
.allLevels{
    width: 5.8%;
    height: 5.8%;
    position: absolute;
    border-radius: 14% 14% 50% 50%;
}
.level7{
    top: 35%;
    left: 9%;
}
.level7active{
    top: 28%;
    left: 7%;
}
.level6{
    top: 46.5%;
    left: 24.4%;
}
.level6active{
    top: 39.5%;
    left: 22.5%;
}
.level5{
    top: 38.5%;
    left: 44.4%;
}
.level5active{
    top: 31.5%;
    left: 42.5%;
}
.level4{
    top: 43.8%;
    left: 63.7%;
}
.level4active{
    top: 36.8%;
    left: 61.8%;
}
.level3{
    top: 66.8%;
    left: 56.8%;
}
.level3active{
    top: 59.6%;
    left: 54.8%;
}
.level2{
    top: 83.7%;
    left: 54.8%;
}
.level2active{
    top: 76.6%;
    left: 52.8%;
}
.level1{
    top: 82%;
    left: 77.7%;
}
.level1active{
    top: 74.9%;
    left: 75.8%;
}

.outer-circle {
  	-webkit-box-shadow: 0 0 50px 10px #453D9B;
  	-moz-box-shadow: 0 0 50px 10px #453D9B;
  	box-shadow: 0 0 50px 10px #453D9B;
  	border: 7px solid #ECEBFA;
  	border-top-color: #00ff08;
    border-right-color: yellow;
    border-bottom-color: #ff0101;
    border-left-color: blueviolet;
  	text-align:center;
    width: 9.8%;
    height: 9.8%;
  	-webkit-border-radius: 220px;
  	-moz-border-radius: 220px;
  	border-radius: 220px;

  	-webkit-animation:turning_cw 5s infinite;
  	-moz-animation:turning_cw 5s infinite;
  	animation:turning_cw 5s infinite;
  	opacity: 1;
}

  .outer-circle:hover {
  	-webkit-box-shadow: 0 0 100px 15px #453D9B;
  	-moz-box-shadow: 0 0 100px 15px #453D9B;
  	box-shadow: 0 0 100px 15px #453D9B;
}


  @-webkit-keyframes aura {
  	0%{
  		text-shadow: 0 2px 2px #000; }

  	50%{
  		text-shadow: 0 10px 10px #000;
  		line-height: 190px; }

  	100%{
  		text-shadow: 0 2px 10px #000; }
  }

  @-webkit-keyframes turning_cw {
  	0%{
  		-webkit-transform: rotate(0deg); }
  	100%{
  		-webkit-transform: rotate(360deg); }
  }

  @-webkit-keyframes turning_acw {
  	0%{
  		-webkit-transform: rotate(360deg); }
  	100%{
  		-webkit-transform: rotate(0deg); }
  }

  @-moz-keyframes aura {
  	0%{
  		text-shadow: 0 2px 2px #000; }

  	50%{
  		text-shadow: 0 10px 10px #000;
  		line-height: 190px; }

  	100%{
  		text-shadow: 0 2px 10px #000; }
  }

  @-moz-keyframes turning_cw {
  	0%{
  		-moz-transform: rotate(0deg); }
  	100%{
  		-moz-transform: rotate(360deg); }
  }

  @-moz-keyframes turning_acw {
  	0%{
  		-moz-transform: rotate(360deg); }
  	100%{
  		-moz-transform: rotate(0deg); }
  }

  @keyframes aura {
  	0%{
  		text-shadow: 0 2px 2px #000; }

  	50%{
  		text-shadow: 0 10px 10px #000;
  		line-height: 190px; }

  	100%{
  		text-shadow: 0 2px 10px #000; }
  }

  @keyframes turning_cw {
  	0%{
  		transform: rotate(0deg); }
  	100%{
  		transform: rotate(360deg); }
  }

  @keyframes turning_acw {
  	0%{
  		transform: rotate(360deg); }
  	100%{
  		transform: rotate(0deg); }
  }
</style>
