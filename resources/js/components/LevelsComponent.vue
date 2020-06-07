<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="position-relative">
                <img class="img-fluid" usemap="#levels" src="/storage/Images/levels.png" alt="">
                <div v-if="showLocks" class="allLevels level7">
                    <img src="/storage/Images/lock.png" alt="">
                </div>
                <div v-if="showLocks" class="allLevels level6">
                    <img src="/storage/Images/lock.png" alt="">
                </div>
                <div v-if="showLocks" class="allLevels level5">
                    <img src="/storage/Images/lock.png" alt="">
                </div>
                <div v-if="showLocks" class="allLevels level4">
                    <img src="/storage/Images/lock.png" alt="">
                </div>
                <div v-if="showLocks" class="allLevels level3">
                    <img src="/storage/Images/lock.png" alt="">
                </div>
                <div v-if="showLocks" class="allLevels level2">
                    <img src="/storage/Images/lock.png" alt="">
                </div>
                <a href="/numbers">
                    <div v-if="showLocks" class="allLevels level1 outer-circle"></div>
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
                showLocks:false
            }
        },
        created(){
            this.showLocks = true
        }
    }
</script>

<style scoped>
.allLevels{
    width: 9.8%;
    height: 9.8%;
    position: absolute;
    opacity: .9;
    border-radius: 14% 14% 50% 50%;
    box-shadow: 0px 0 20px 0px grey;
}
.level7{
    top: 28%;
    left: 7%;
}
.level6{
    top: 39.5%;
    left: 22.5%;
}
.level5{
    top: 31.5%;
    left: 42.5%;
}
.level4{
    top: 36.8%;
    left: 61.8%;
}
.level3{
    top: 59.6%;
    left: 54.8%;
}
.level2{
    top: 76.6%;
    left: 52.8%;
}
.level1{
    top: 74.9%;
    left: 75.8%;
}
.main {
  	/* width: 800px;
  	height: 300px; */
  	/* margin: auto; */
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
  	/* margin: 20% auto; */
  	text-align:center;
  	/* background: -webkit-linear-gradient(top, #ffffff 48%, #ecebfa 49%, #ecebfa 51%, #fff 52%); */
  	/* background: -moz-linear-gradient(top, #ffffff 48%, #ecebfa 49%, #ecebfa 51%, #fff 52%); */
  	/* background: linear-gradient(to bottom, #ffffff 48%, #ecebfa 49%, #ecebfa 51%, #fff 52%); */
  	/* width: 100px; */
  	/* height: 100px; */

  	-webkit-border-radius: 220px;
  	-moz-border-radius: 220px;
  	border-radius: 220px;

  	-webkit-animation:turning_cw 5s infinite;
  	-moz-animation:turning_cw 5s infinite;
  	animation:turning_cw 5s infinite;
  	/* position:relative; */
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
