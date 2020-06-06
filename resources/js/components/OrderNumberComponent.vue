<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<template>
    <div class="container">
       <div id="content">
           <div id="cardPile"></div>
           <div id="cardSlots"></div>

            <div id="successMessage">
                <img src="/storage/Images/welldone.jpg" class="welldone" alt="">
                <button v-on:click="init()">play Again</button>
            </div>
       </div>
    </div>
</template>


<script>
    export default {
        name:'OrderNumber',
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            let correctCards = 0;
            $(init);
            function init(){
                //hide success message
                $('#successMessage').hide();
                $('#successMessage').css({
                    left:'580px',
                    top:'330px',
                    width:0,
                    height:0
                });
                //reset the game
                correctCards = 0 ;
                $('#cardPile').html('');
                $('#cardSlots').html('');

                //create the numbers
                let numbers = [1,2,3,4,5,6,7,8,9,10];
                numbers.sort(() => {
                    return Math.random -.5 ;
                });

                for (let i =0 ; i<10 ; i++){
                    $('div' + numbers[i] + '</div>').data('number',numbers[i]).attr(
                        'id','card'+numbers[i]).appendTo('#cardPile').draggable({
                            containment:'#conent',
                            stack:'#cardPile div',
                            cursor:'move',
                            revert:true
                        });
                    
                }

                //create numbers names
                let words = [ 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten' ];
                for(let i =1;i<=10;i++){
                    $('<div>' + words[i-1] + '</div>').data('number',i).appendTo('#cardSlots').droppable({
                        accept:'#cardPile div',
                        hoverClass:'hovered',
                        // drop:handleCardDrop
                    })
                }
                
            }
        }
    }
</script>


<style scoped>
    body{
        margin: 30px;
        line-height: 1.8em;

    }
    #content{
        margin: 80px 70px;
        text-align: center;
        -moz-user-select: none;
        -webkit-user-select: none;
        user-select: none;
    }
    #cardSlots{
        margin: 50px auto 0 auto;
        background: rgb(163, 163, 167);
    }

    #cardPile{
        margin: 0 auto ;
        background: rgb(201, 201, 202);
    }
    #cardSlots , #cardPile{
        width: 840px;
        height: 140px;
        padding: 20px;
        border: 2px solid rgb(95, 95, 95);
        border-radius: 15px;
        -moz-box-shadow: 0 0 .3em rgba(41, 40, 40, 0.8);
        -webkit-box-shadow: 0 0 .3em rgba(37, 37, 37, 0.8);
        box-shadow: 0 0 .3em rgba(41, 40, 40, 0.8);

    }
    #cardSlots div , #cardPile div{
        float: left;
        width: 70px;
        height: 80px;
        padding: 10px;
        padding-top: 20px;
        padding-bottom: 0;
        border: 2px solid rgb(rgb(77, 72, 72), rgb(68, 116, 68), rgb(66, 66, 107));
         -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        margin: 0 0 0 10px;
        background: #fff;
    }
    #cardSlots div:first-child, #cardPile div:first-child {
        margin-left: 0;
    }
    #cardSlots div.hovered{
        background: #aaa;
    }
    #cardPile div{
        background: rgb(123, 24, 136);
        color: #fff;
        font-size: 50px;
        text-shadow: 0 0 3px #000;
    }
    #cardPile div.ui-draggable-dragging {
        -moz-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
        -webkit-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
        box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
    }

    /*success message */
    #successMessage{
        position: absolute;
        left: 580;
        top: 250px;
        width: 0;
        height: 0;
        z-index: 10;
        background: #dfd;
        border: 2px solid #333;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        -moz-box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
        -webkit-box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
        box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
        padding: 20px;
    }
    .welldone{
        width: 330px;
        height: 170px;
        border-radius: 15px;
    }
</style>
