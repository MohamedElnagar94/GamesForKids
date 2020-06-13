<template>
    <div class="container" :key="keyChange">
        <div class="row position-relative">
            <div class="text-center h1 w-100">
                <span
                    style="font-size: 52px;color: darkviolet;font-weight: bold;"
                    >The Wanted Number
                </span>
                <span
                    class="d-block"
                    style="font-size: 52px;color: blueviolet;font-weight: 900;"
                    >{{ theWantedNumber }}</span
                >
            </div>
            <div
                class="text-center w-100 d-flex justify-content-center align-items-center"
            >
                <div
                    class="result d-flex justify-content-center align-items-center m-3"
                    :class="{ divBg: seconedResult.includes(number) }"
                    v-for="number in numbers"
                    :key="number"
                    :id="number + 'h'"
                >
                    <img
                        class="img-fluid column"
                        style="height:85px"
                        :src="'/storage/Images/' + number + '.png'"
                    />
                </div>
                <i
                    class="fa fa-sort-amount-asc ml-5"
                    @click.once="sortNumbers"
                    aria-hidden="true"
                    style="font-size: 52px;color: blueviolet;cursor:pointer"
                ></i>
            </div>
            <div
                class="text-center w-100 d-flex justify-content-center align-items-center mt-5"
                v-if="seconedResult.length"
            >
                <div
                    class="result d-flex justify-content-center align-items-center m-3"
                    :class="{ divBg: thirdResult.includes(number) }"
                    :id="number"
                    v-for="number in seconedResult"
                    :key="number"
                >
                    <img
                        class="img-fluid column"
                        style="height:85px"
                        :src="'/storage/Images/' + number + '.png'"
                    />
                </div>

                <i
                    class="fa fa-level-down ml-5"
                    @click.once="
                        steps++;
                        changeStep();
                    "
                    style="font-size: 52px;color: blueviolet;cursor:pointer"
                ></i>
            </div>
            <div
                class="text-center w-100 d-flex justify-content-center align-items-center mt-5"
                v-if="thirdResult.length"
            >
                <div
                    class="result d-flex justify-content-center align-items-center m-3"
                    :class="[
                        {
                            divBg: finalResult.includes(number),
                            divBg2: thirdResult.length === 1
                        }
                    ]"
                    :id="number + 'a'"
                    v-for="number in thirdResult"
                    :key="number"
                >
                    <img
                        class="img-fluid column"
                        style="height:85px"
                        :src="'/storage/Images/' + number + '.png'"
                    />
                </div>
                <i
                    class="fa fa-level-down ml-5"
                    v-if="thirdResult.length > 1"
                    @click.once="
                        steps++;
                        changeStep();
                    "
                    style="font-size: 52px;color: blueviolet;cursor:pointer"
                ></i>
            </div>
            <div
                class="text-center w-100 d-flex justify-content-center align-items-center mt-5"
                v-if="finalResult.length"
            >
                <div
                    class="result d-flex justify-content-center align-items-center m-3 divBg"
                    :class="{ divBg2: thirdResult.length > 1 }"
                    :id="number + 'ab'"
                    v-for="number in finalResult"
                    :key="number"
                >
                    <img
                        class="number img-fluid column"
                        style="height:85px"
                        :src="'/storage/Images/' + number + '.png'"
                    />
                </div>
            </div>
            <div
                class="text-center w-100 d-flex justify-content-center align-items-center mt-5"
                v-if="theWantedNumber === middleNumber"
            >
                <div
                    class="result d-flex justify-content-center align-items-center m-3 divBg"
                >
                    <img
                        class="number img-fluid column"
                        style="height:85px"
                        :src="'/storage/Images/' + middleNumber + '.png'"
                    />
                </div>
            </div>
            <div
                class="col-md-12 d-flex align-items-center"
                style="justify-content: space-evenly;"
            >
                <i
                    v-if="
                        (theWantedNumber === middleNumber) |
                            (thirdResult.length === 1) |
                            finalResult.length
                    "
                    @click.prevent="playAgain()"
                    class="d-inline-block fa fa-repeat mt-2"
                    data-toggle="tooltip"
                    title="Play Again"                    
                    data-placement="top"
                    style="font-size:50px;cursor:pointer;color:blueviolet"
                ></i>

                <!-- <a href="/levels" ><img style="width: 100px" src="/storage/Images/door.png" alt="Prev Exam" data-toggle="tooltip" title="Next Level" data-placement="top"></a> -->
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "BinarySearch",
    data() {
        return {
            theWantedNumber: 0,
            numbers: [],
            sortedNumbers: [],
            seconedResult: [],
            thirdResult: [],
            finalResult: [],
            middleNumber: 0,
            steps: 0,
            changeColor: false,
            keyChange: 0
        };
    },
    methods: {
        randomNumber: function(minNum, maxNum) {
            return Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum;
        },
        start: function() {
            this.theWantedNumber = this.randomNumber(1, 9);
            this.numbers = [];
            for (let i = 0; i < 9; i++) {
                let randResult = this.randomNumber(1, 9);

                while (this.numbers.includes(randResult) === true) {
                    randResult = this.randomNumber(1, 9);
                }
                this.numbers.push(randResult);
            }
        },
        sortNumbers() {
            this.numbers.sort();
            setTimeout(() => {
                Swal.fire({
                    title: "Second Step",
                    width: 500,
                    text:
                        "Compare Between the wanted number and the middle number of these numbers",
                    // icon: "error",
                    confirmButtonText: "Ok"
                }).then(result => {
                    this.steps = 1;
                    this.changeStep();
                });
            }, 2000);
        },
        changeStep() {
            switch (this.steps) {
                case 1:
                    this.middleNumber = this.numbers[
                        Math.floor(this.numbers.length / 2)
                    ];
                    console.log("middle number", this.middleNumber);
                    if (this.theWantedNumber < this.middleNumber) {
                        this.seconedResult = this.numbers.filter(number => {
                            return number < this.middleNumber;
                        });
                    } else if (this.theWantedNumber > this.middleNumber) {
                        this.seconedResult = this.numbers.filter(number => {
                            return number > this.middleNumber;
                        });
                    } else if (this.theWantedNumber == this.middleNumber) {
                        $(`#${this.theWantedNumber}h`).addClass("divBg");
                    }

                    break;
                case 2:
                    this.middleNumber = this.seconedResult[
                        Math.floor(this.seconedResult.length / 2)
                    ];
                    console.log("middle number", this.middleNumber);
                    if (this.theWantedNumber < this.middleNumber) {
                        this.thirdResult = this.seconedResult.filter(number => {
                            return number < this.middleNumber;
                        });
                    } else if (this.theWantedNumber > this.middleNumber) {
                        this.thirdResult = this.seconedResult.filter(number => {
                            return number > this.middleNumber;
                        });
                    } else if (this.theWantedNumber == this.middleNumber) {
                        $(`#${this.theWantedNumber}`).addClass("divBg");
                    }

                    break;
                case 3:
                    this.middleNumber = this.thirdResult[
                        Math.floor(this.thirdResult.length / 2)
                    ];

                    console.log("middle number", this.middleNumber);
                    if (this.theWantedNumber < this.middleNumber) {
                        this.finalResult = this.thirdResult.filter(number => {
                            return number < this.middleNumber;
                        });
                        console.log("final number", this.finalResult);
                    } else if (this.theWantedNumber > this.middleNumber) {
                        this.finalResult = this.thirdResult.filter(number => {
                            return number > this.middleNumber;
                        });
                        console.log("final number", this.finalResult);
                    } else if (this.theWantedNumber == this.middleNumber) {
                        $(`#${this.theWantedNumber}a`).addClass("divBg");
                    }

                    break;

                default:
                    break;
            }
        },
        playAgain() {
            this.start();
            this.seconedResult = [];
            this.thirdResult = [];
            this.finalResult = [];
            this.middleNumber = 0;
            this.keyChange++;
        }
    },
    created() {
        this.start();
        setTimeout(function() {
            Swal.fire({
                title: "Frist Step",
                text: "Click on the Sort",
                // icon: "error",
                confirmButtonText: "Ok"
            });
        }, 2000);
    }
};
</script>
<style scoped>
.divBg {
    background-color: rgba(85, 169, 56, 0.5);
}
.divBg2 {
    background-color: rgba(85, 169, 56, 0.5);
}
.result {
    width: 100px;
    height: 100px;
    border: 1px solid gray;
    box-shadow: 0 0 3px 0 gray, inset 0 0 7px 0 gray;
}
</style>
