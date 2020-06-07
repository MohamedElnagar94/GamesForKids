<template>
    <div class="container">
        <div id="content">
            <div id="cardPile">
                <img
                    class="number img-fluid"
                    v-for="number in numbers"
                    :key="number"
                    :src="'/storage/Images/' + number + '.png'"
                />
            </div>
            <div id="cardSlots">
                <div class="words" v-for="word in words" :key="word">
                    {{ word }}
                </div>
            </div>
           
        </div>
    </div>
</template>

<script>
export default {
    name: "OrderNumber",
    mounted() {
        console.log("Component mounted.");
    },
    methods: {
        randFun: function(minNum, maxNum) {
            return Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum;
        }
    },
    data() {
        return {
            numbers: [],
            words: [
                "one",
                "two",
                "three",
                "four",
                "five",
                "six",
                "seven",
                "eight",
                "nine",
                "ten"
            ]
        };
    },
    created() {
        this.numbers = [];
        for (let i = 0; i < 10; i++) {
            let randResult = this.randFun(1, 10);
            // console.log("outside",randResult,this.resultOption);
            while (this.numbers.includes(randResult) === true) {
                randResult = this.randFun(1, 10);
                // console.log("inside",randResult,this.resultOption);
            }
            this.numbers.push(randResult);
        }        
    }
};
</script>

<style scoped>
body {
    margin: 30px;
    line-height: 1.8em;
}
#content {
    margin: 70px 70px;
    text-align: center;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
}
#cardSlots {
    margin: 50px auto 0 auto;
    background: rgb(163, 163, 167);
    display: flex;
}

#cardPile {
    margin: 0 auto;
    background: rgb(201, 201, 202);
    display: flex;
}
#cardSlots,
#cardPile {
    width: 840px;
    height: 140px;
    padding: 20px;
    border: 2px solid rgb(95, 95, 95);
    border-radius: 15px;
    -moz-box-shadow: 0 0 0.3em rgba(41, 40, 40, 0.8);
    -webkit-box-shadow: 0 0 0.3em rgba(37, 37, 37, 0.8);
    box-shadow: 0 0 0.3em rgba(41, 40, 40, 0.8);
}
#cardSlots div,
#cardPile div {
    float: left;
    width: 80px;
    height: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 2px solid rgb(rgb(77, 72, 72), rgb(68, 116, 68), rgb(66, 66, 107));
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    margin: 0 0 0 10px;
    background: #fff;
}
#cardSlots div:first-child,
#cardPile div:first-child {
    margin-left: 0;
}
#cardSlots div.hovered {
    background: #aaa;
}
#cardPile div {
    background: rgb(123, 24, 136);
    color: #fff;
    font-size: 50px;
    text-shadow: 0 0 3px #000;
}
#cardPile div.ui-draggable-dragging {
    -moz-box-shadow: 0 0 0.5em rgba(0, 0, 0, 0.8);
    -webkit-box-shadow: 0 0 0.5em rgba(0, 0, 0, 0.8);
    box-shadow: 0 0 0.5em rgba(0, 0, 0, 0.8);
}

/*success message */
#successMessage {
    position: absolute;
    left: 580;
    top: 250px;
    width: 0;
    height: 0;
    z-index: 7;
    background: #dfd;
    border: 2px solid #333;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    -moz-box-shadow: 0.3em 0.3em 0.5em rgba(0, 0, 0, 0.8);
    -webkit-box-shadow: 0.3em 0.3em 0.5em rgba(0, 0, 0, 0.8);
    box-shadow: 0.3em 0.3em 0.5em rgba(0, 0, 0, 0.8);
    padding: 20px;
}
.welldone {
    width: 330px;
    height: 170px;
    border-radius: 15px;
}
.words {
    font-size: 26px;
    font-weight: bold;
}
.number {
    /* position: relative;  */
    width: 80px;
    color: #fff;
    text-shadow: 0 0 3px #000;
}
</style>
