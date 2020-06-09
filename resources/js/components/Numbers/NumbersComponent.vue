<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="padding: 30px 145px 0;display: flex;flex-direction: column;">
                <div class="text-center">
                    <img @mouseover="playAudio()" class="img-fluid" style="cursor: url('/storage/Images/audio2.png') 25 25,auto;" :src="'/storage/Images/'+ chosenNumber.imgNum" alt="">
                </div>
                <div class="text-center" style="padding: 0 20px 0;font-size: 115px">
                    <p @mouseover="playAudio()" style="text-shadow: 0px 3px grey;cursor: url('/storage/Images/audio2.png') 25 25,auto;" :style="{color: chosenNumber.color}">{{chosenNumber.nameEN}}</p>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center" style="padding: 25px 137px 0">
                <div class="text-center">
                    <img v-for="item in chosenNumber.id" :key="item" style="margin:10px" :style="chosenNumber.style" class="img-fluid" :src="'/storage/Images/' + chosenNumber.imgAnimate" alt="">
                </div>
            </div>
            <audio id="femaleAudio" :src="'/storage/Sound/'+ chosenNumber.femaleVoice"></audio>
            <audio id="maleAudio" :src="'/storage/Sound/'+ chosenNumber.maleVoice"></audio>
            <div class="col-md-12 d-flex align-items-center" style="justify-content: space-evenly;padding: 30px">
                <img class="img-fluid right" v-if="indexOfChosen > 0" v-on:click="changeNumber(indexOfChosen,'right')" style="width: 75px;transform: rotate(180deg)" src="/storage/Images/arrow.png" alt="">
                <img class="img-fluid left" v-if="indexOfChosen < 9" v-on:click="changeNumber(indexOfChosen,'left')" style="width: 75px;" src="/storage/Images/arrow.png" alt="">
            </div>
            <div class="w-100">
                <a href="/levels" class="d-flex justify-content-center align-items-center w-100"><img class="img-fluid" style="width:75px;" src="/storage/Images/door.png" alt=""></a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NumbersComponent",
        data(){
            return {
                numbers:[
                    {id:1, nameAR:'واحد',color:'#97D6E8',nameEN:'One',imgNum:'one.png',imgAnimate:'apple.png',style:'width:100%',maleVoice:'one-male.mp3',femaleVoice:'one-female.mp3'},
                    {id:2, nameAR:'إثنان',color:'#F09F18',nameEN:'Two',imgNum:'two.png',imgAnimate:'mango.png',style:'width:50%',maleVoice:'two-male.mp3',femaleVoice:'two-female.mp3'},
                    {id:3, nameAR:'ثلاثة',color:'#EE92B7',nameEN:'Three',imgNum:'three.png',imgAnimate:'strawberry.png',style:'width:33.3333%',maleVoice:'three-male.mp3',femaleVoice:'three-female.mp3'},
                    {id:4, nameAR:'أربعة',color:'#F2E652',nameEN:'Four',imgNum:'four.png',imgAnimate:'banana.png',style:'width:25%',maleVoice:'four-male.mp3',femaleVoice:'four-female.mp3'},
                    {id:5, nameAR:'خمسة',color:'#9DBF63',nameEN:'Five',imgNum:'five.png',imgAnimate:'apple.png',style:'width:25%',maleVoice:'five-male.mp3',femaleVoice:'five-female.mp3'},
                    {id:6, nameAR:'ستة',color:'#E21133',nameEN:'Six',imgNum:'six.png',imgAnimate:'strawberry.png',style:'width:25%',maleVoice:'six-male.mp3',femaleVoice:'six-female.mp3'},
                    {id:7, nameAR:'سبعة',color:'#5D8BC3',nameEN:'Seven',imgNum:'seven.png',imgAnimate:'apple.png',style:'width:25%',maleVoice:'seven-male.mp3',femaleVoice:'seven-female.mp3'},
                    {id:8, nameAR:'ثمانية',color:'#BEBBDA',nameEN:'Eight',imgNum:'eight.png',imgAnimate:'apple.png',style:'width:25%',maleVoice:'eight-male.mp3',femaleVoice:'eight-female.mp3'},
                    {id:9, nameAR:'تسعة',color:'#93C6BF',nameEN:'Nine',imgNum:'nine.png',imgAnimate:'apple.png',style:'width:25%',maleVoice:'nine-male.mp3',femaleVoice:'nine-female.mp3'},
                    {id:10, nameAR:'عشرة',color:'#BF0826',nameEN:'Ten',imgNum:'ten.png',imgAnimate:'strawberry.png',style:'width:25%',maleVoice:'ten-male.mp3',femaleVoice:'ten-female.mp3'},
                ],
                chosenNumber:{},
                indexOfChosen:0
            }
        },
        methods:{
            changeNumber:function (index,word) {
                if(word === 'left'){
                    this.indexOfChosen = index + 1;
                    // console.log(this.indexOfChosen)
                    if(this.indexOfChosen >= 9){
                        let levels = JSON.parse(localStorage.getItem('levels'));
                        levels[1].open = true;
                        localStorage.setItem('levels',JSON.stringify(levels))
                        this.indexOfChosen = 9;
                    }

                }else {
                    this.indexOfChosen = index - 1;
                    if(this.indexOfChosen < 0){
                        this.indexOfChosen = 0;
                    }
                    // this.indexOfChosen = index - 1;
                    // console.log(index,this.indexOfChosen)
                }
                return this.chosenNumber = this.numbers[this.indexOfChosen];
            },
            randFun:function(minNum,maxNum){
                return Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum;
            },
            playAudio:function(){
                let rand = this.randFun(0,1);
                let female = document.getElementById('femaleAudio');
                let male = document.getElementById('maleAudio');
                if(rand === 0){
                    female.currentTime = 0;
                    female.play();
                }else{
                    male.currentTime = 0;
                    male.play();
                }
            }
        },
        created() {
            this.chosenNumber = this.numbers[this.indexOfChosen]
        },
        computed:{

        }
    }
</script>

<style scoped>

</style>
