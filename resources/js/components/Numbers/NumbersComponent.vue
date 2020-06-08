<template>
    <div class="container">
        <div class="row">
            <div
                class="col-md-6"
                style="padding: 30px 145px 0;display: flex;flex-direction: column;"
            >
                <div class="text-center">
                    <img
                        class="img-fluid"
                        :src="'/storage/Images/' + chosenNumber.imgNum"
                        alt=""
                    />
                </div>
                <div
                    class="text-center"
                    style="padding: 0 20px 0;font-size: 115px"
                >
                    <p
                        style="text-shadow: 0px 3px grey;"
                        :style="{ color: chosenNumber.color }"
                    >
                        {{ chosenNumber.nameEN }}
                    </p>
                </div>
            </div>
            <div class="col-md-6" style="padding: 25px 137px 0">
                <div class="text-center count">
                    <img v-for="(item ,index) in chosenNumber.id " :key="index"
                        class=""
                        :src="'/storage/Images/' + chosenNumber.imgAnimate"
                        style="height:100px;padding:2px"
                        alt=""
                    />
                </div>
            </div>
            <div
                class="col-md-12 position-relative d-flex align-items-center"
                style="justify-content: space-evenly;padding: 30px"
            >
                <a
                    href="/numbersExam"
                    class="position-absolute"
                    style="top: 30px;left: 25px;"
                    ><img
                        class="img-fluid"
                        style="width:75px;"
                        src="/storage/Images/door.png"
                        alt=""
                /></a>
                <img
                    class="img-fluid right"
                    v-if="this.indexOfChosen > 0"
                    v-on:click="changeNumber(indexOfChosen, 'right')"
                    style="width: 75px;transform: rotate(180deg)"
                    src="/storage/Images/arrow.png"
                    alt=""
                />
                <img
                    class="img-fluid left"
                    v-if="indexOfChosen < 9"
                    v-on:click="changeNumber(indexOfChosen, 'left')"
                    style="width: 75px;"
                    src="/storage/Images/arrow.png"
                    alt=""
                />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NumbersComponent",
    data() {
        return {
            numbers: [
                {
                    id: 1,
                    nameAR: "واحد",
                    color: "#97D6E8",
                    nameEN: "One",
                    imgNum: "one.png",
                    imgAnimate: "apple.png"
                },
                {
                    id: 2,
                    nameAR: "إثنان",
                    color: "#F09F18",
                    nameEN: "Two",
                    imgNum: "two.png",
                    imgAnimate: "mango.png"
                },
                {
                    id: 3,
                    nameAR: "ثلاثة",
                    color: "#EE92B7",
                    nameEN: "Three",
                    imgNum: "three.png",
                    imgAnimate: "strawberry.png"
                },
                {
                    id: 4,
                    nameAR: "أربعة",
                    color: "#F2E652",
                    nameEN: "Four",
                    imgNum: "four.png",
                    imgAnimate: "apple.png"
                },
                {
                    id: 5,
                    nameAR: "خمسة",
                    color: "#9DBF63",
                    nameEN: "Five",
                    imgNum: "five.png",
                    imgAnimate: "apple.png"
                },
                {
                    id: 6,
                    nameAR: "ستة",
                    color: "#E21133",
                    nameEN: "Six",
                    imgNum: "six.png",
                    imgAnimate: "strawberry.png"
                },
                {
                    id: 7,
                    nameAR: "سبعة",
                    color: "#5D8BC3",
                    nameEN: "Seven",
                    imgNum: "seven.png",
                    imgAnimate: "apple.png"
                },
                {
                    id: 8,
                    nameAR: "ثمانية",
                    color: "#BEBBDA",
                    nameEN: "Eight",
                    imgNum: "eight.png",
                    imgAnimate: "apple.png"
                },
                {
                    id: 9,
                    nameAR: "تسعة",
                    color: "#93C6BF",
                    nameEN: "Nine",
                    imgNum: "nine.png",
                    imgAnimate: "apple.png"
                },
                {
                    id: 10,
                    nameAR: "عشرة",
                    color: "#BF0826",
                    nameEN: "Ten",
                    imgNum: "ten.png",
                    imgAnimate: "strawberry.png"
                }
            ],
            chosenNumber: {},
            indexOfChosen: 0
        };
    },
    methods: {
        changeNumber: function(index, word) {
            if (word === "left") {
                if (this.indexOfChosen < 9) {
                    this.indexOfChosen = index + 1;
                } else {
                    this.indexOfChosen = index;
                }
                console.log(index, this.indexOfChosen);
            } else {
                if (this.indexOfChosen > 0) {
                    this.indexOfChosen = index - 1;
                } else {
                    this.indexOfChosen = index;
                }
                // this.indexOfChosen = index - 1;
                console.log(index, this.indexOfChosen);
            }
            return (this.chosenNumber = this.numbers[this.indexOfChosen]);
        }
    },
    created() {
        this.chosenNumber = this.numbers[this.indexOfChosen];
    },
    computed: {}
};
</script>

<style scoped></style>
