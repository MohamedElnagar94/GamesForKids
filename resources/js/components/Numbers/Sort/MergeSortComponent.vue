<template>
  <div class="container">
    <div class="row">
      <!-- character -->
      <div
        class="col-md-1 d-flex justify-content-center align-items-center"
        :style="[{ 'position': 'fixed', 'top': '30%','margin-left': '1%'}]"
      >
        <div style="text-align:center; ">
          <img :src="'/storage/Images/' + answer + '.gif'" alt />
        </div>
      </div>

      <div class="col-md-11 justify-content-center align-items-center">
        <h2
          :style="[{'margin':'0% 15% 3% 11%'}]"
          class="col-md-12 justify-content-center align-items-center"
        >
          Step One
          <i
            style="font-size: 48px; color: #FF8C00"
            v-on:click="voice('Step One. Divide This main array. into two sub-arrays. ')"
            :class="steps < 2 ? voiceIcon : ''"
          ></i>
          <br />
          <h3>Divide The main array into two sub-arrays</h3>
        </h2>
        <!-- step one drag  -->

        <div class="col-md-12" style="margin-left:25%">
          <div
            id="left-container"
            :draggable="status"
            @dragstart="onDragging(numbersArray.slice(0, 4),$event)"
          >
            <div
              class="col-md-5"
              style="background-color:lightblue; border-radius:30% ;"
              :class="{'animated bounce repeat-3':steps===1}"
            >
              <div
                v-for="i in numbersArray.slice(0, 4)"
                :key="i"
                class="col-md-1 d-flex justify-content-center align-items-center m-5"
              >
                <img style="height:50px" :src="'/storage/Images/' + i + '.png'" />
              </div>
            </div>
          </div>
          <!-- <div class="col-md-1"></div> -->
          <div
            id="right-container"
            draggable="true"
            @dragstart="onDragging(numbersArray.slice(4, 8),$event)"
          >
            <div
              class="col-md-5 ml-4"
              style="background-color:lightblue; border-radius:30% "
              :class="{'animated bounce repeat-3':steps===0}"
            >
              <div
                v-for="i in numbersArray.slice(4, 8)"
                :key="i"
                class="col-md-1 d-flex justify-content-center align-items-center m-5"
              >
                <img style="height:50px" :src="'/storage/Images/' + i + '.png'" />
              </div>
            </div>
          </div>
          <div>
            <img
              :style="[   steps === 0 ?   {'width': '25%', 'height': '90px', 'float': 'right', 'margin-right': '20%'} : 
                                    steps === 1 ?   {'width': '25%', 'height': '90px', 'float': 'left', 'margin-right': '20%', 'transform': 'scaleX(-1)'} : 
                                                    {'display' : 'none'}
                                ]"
              src="/storage/Images/arrow.gif"
              alt
            />
          </div>
        </div>

        <div class="col-md-12" style="margin-left:25%">
         <!-- step one drop -->
          <div
            class="col-md-5 mt-2"
            id="left-draggable"
            @drop="drop"
            @dragover="allowDrop"
            :style="[{'border-radius':'30%','margin': '10px 5px','border': '2px solid yellow', 'width': '51%', 'height': '100px', 'background-color': 'lightgreen'}]"
          ></div>

          <div
            id="right-draggable"
            class="col-md-5 mt-2"
            @drop="drop"
            @dragover="allowDrop"
            :style="[{'border-radius':'30%','margin': '10px 5px', 'border': '2px solid orange', 'width': '51%', 'height': '100px', 'background-color': 'lightpink'}]"
          ></div>

          <!-- Start Step Two Result -->
          <h2
            :style="[steps < 2 ? {'opacity': '0'} : {'margin':'3% 0% 1% -7%'}]"
            class="col-md-12 justify-content-center align-items-center"
          >
            Step Two
            <i
              style="font-size: 30px; color: #FF8C00"
              v-on:click="voice('Step Two. Divide each sub array. into two arrays. ')"
              :class="steps < 6 ? voiceIcon : ''"
            ></i>
            <br />
            <h3>Divide each sub array into two arrays</h3>
          </h2>

<!-- animate__animated animate__bounce animate__repeat-2 -->
          <!-- step two drag -->
          <div class="col-md-12">
            <div
              class="col-md-6 d-flex justify-content-center align-items-center"
              :style="[
                            steps < 2 ? {'display': 'none'} :
                            { 'width': '45%', 'height': '100px'}]"
            >
              <div
                :style="[steps < 2 ? {'display': 'none'} : {'border-radius':'30%','border': '2px solid orange', 'background-color': 'lightgreen', 'margin': '5px 0'}]"
               
                id="4left-2"
              :class="{'animated bounce repeat-3':steps==5}"
                                class="col-md-5 mr-2"

                draggable="true"
                @dragstart="onDragging (numbersArray.slice(0, 2),$event)"
              >
                <div
                  v-for="i in numbersArray.slice(0, 2)"
                  :key="i"
                  class="ml-2 xyz col-md-5 d-flex justify-content-center align-items-center p-4"
                >
                  <img style="height:50px " class="pl-1" :src="'/storage/Images/' + i + '.png'" />
                </div>
              </div>

              <div
                :style="[steps < 2 ? {'display': 'none'} : {'border-radius':'30%','border': '2px solid orange', 'background-color': 'lightgreen', 'margin': '5px 0 '}]"
                               :class="{'animated bounce repeat-3':steps==4}"
                                class="col-md-5 mr-2"
                id="4left-1"
                
                draggable="true"
                @dragstart="onDragging (numbersArray.slice(2, 4),$event)"
              >
                <div
                  v-for="i in numbersArray.slice(2, 4)"
                  :key="i"
                  class="ml-2 xyz col-md-5 d-flex justify-content-center align-items-center p-4"
                >
                  <img style="height:50px " class="pl-1" :src="'/storage/Images/' + i + '.png'" />
                </div>
              </div>
            </div>

            <div
              class="col-md-6 mr-5"
              :style="[
                            steps < 2 ? {'display': 'none'} :
                            { 'width': '45%', 'height': '100px'}]"
            >
              <div
                :style="[steps < 2 ? {'display': 'none'} : {'border-radius':'30%','border': '2px solid orange', 'background-color': 'lightpink', 'margin': '5px 0'}]"
                id="4right-1"
                draggable="true"
                @dragstart="onDragging (numbersArray.slice(4, 6),$event)"
                             :class="{'animated bounce repeat-3':steps==3}"
                            
                                class="col-md-5 mr-2"
>
                <div
                  v-for="i in numbersArray.slice(4, 6)"
                  :key="i"
                  class="col-md-5 d-flex justify-content-center align-items-center p-4 xyz ml-2"
                >
                  <img style="height:50px " class="pl-1" :src="'/storage/Images/' + i + '.png'" />
                </div>
              </div>

              <div
                :style="[steps < 2 ? {'display': 'none'} : {'border-radius':'30%','border': '2px solid orange', 'background-color': 'lightpink', 'margin': '5px 0 '}]"
                :class="{'animated bounce repeat-3':steps==2}"
                                class="col-md-5 mr-2"
                 
                id="4right-2"
                draggable="true"
                @dragstart="onDragging (numbersArray.slice(6, 8),$event)"
              >
                <div
                  v-for="i in numbersArray.slice(6, 8)"
                  :key="i"
                  class="ml-2 xyz col-md-5 d-flex justify-content-center align-items-center p-4"
                >
                  <img style="height:50px " class="pl-1" :src="'/storage/Images/' + i + '.png'" />
                </div>
              </div>
            </div>
          </div>
          <!-- img -->
          <div>
            <img
              :style="[   steps === 2 ?   {'width': '25%', 'height': '90px', 'margin-right':'15%', 'float': 'right'} : 
                                        steps === 3 ?   {'width': '25%', 'height': '90px', 'margin-right':'25%', 'float': 'right', 'transform': 'scaleX(-1)'} :
                                        steps === 4 ?   {'width': '25%', 'height': '90px', 'margin-left':'8%', 'float': 'left'} : 
                                        steps === 5 ?   {'width': '25%', 'height': '90px', 'margin-left':'-4%', 'float': 'left', 'transform': 'scaleX(-1)'} : 
                                                        {'display' : 'none'}
                                ]   "
              src="/storage/Images/arrow.gif"
              alt
            />
          </div>
          <!-- Second step drop -->
          <div class="col-md-12 ml-3">
            <div
              class="col-md-5 d-flex justify-content-center align-items-center"
              style="width=50%"
            >
              <div
                class="col-md-5 mr-2 pt-2"
                id="4left-step1"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 2 ? {'display': 'none'} : { 'width': '50%', 'height': '80px', 'border-radius':'30%','border': '2px solid orange', 'background-color':' lightblue', }]"
              ></div>

              <div
                class="col-md-5 ml-2 pt-2"
                id="4left-step2"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 2 ? {'display': 'none'} :{'width': '50%', 'height': '80px', 'border-radius':'30%','border': '2px solid orange', 'background-color': 'rgb(255, 218, 224)' }]"
              ></div>
            </div>

            <div
              class="col-md-5 d-flex justify-content-center align-items-center ml-2"
              style="width=50%"
            >
              <div
                class="col-md-5 mr-2 pt-2"
                id="4right-step3"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 2 ? {'display': 'none'} :{'width': '50%', 'height': '80px', 'border-radius':'30%','border': '2px solid orange', 'background-color':  '#FAEBD7',}]"
              ></div>
              <div
                class="col-md-5 ml-2 pt-2"
                id="4right-step4"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 2 ? {'display': 'none'} :{'width': '50%', 'height': '80px', 'border-radius':'30%','border': '2px solid orange', 'background-color':' rgb(216, 255, 157)',  }]"
              ></div>
            </div>
          </div>

          <!-- End Step Two Results -->

          <!-- Start Step Three Result [SORT] -->
          <h2
            :style="[steps < 6 ? {'opacity': '0'} : {'margin': '2% 0 3% -7%'}]"
            class="col-md-12 justify-content-center align-items-center"
          >
            Step Three
            <i
              style="font-size: 30px; color: #FF8C00"
              v-on:click="voice('Step Three. We seperated each array into elements. Sort elements. and conquer into sorted sub-arrays. ')"
              :class="steps < 14 ? voiceIcon : ''"
            ></i>
            <br />
            <h3>Sort elements and conquer into sorted sub-array</h3>
          </h2>
          <!-- third dragapple -->
          <div class="col-md-11 mb-5">
            <div
              class="col-md-6 d-flex justify-content-center align-items-center"
              
                              
              :style="[
                            steps < 6 ? {'display': 'none'} : {'width': '50%', 'height': '100px'}]"
            >
              <div
                :style="[steps < 6 ? {'display': 'none'} : {'margin': '10px 0px'}]"
                class="col-md-6"
              >
                <div
                  v-for="i in numbersArray.slice(0, 2)"
                  :key="i"
                  :id="i + '-element'"
                  draggable="true"
                  @dragstart="onDragging (i,$event)"
                  class="col-md-1 d-flex justify-content-center align-items-center p-5 m-1"
                   :class="{'animated bounce repeat-3':steps==12||steps==13}"
                  :style="[steps < 6 ? {'display': 'none'} : {'border-radius':'30%','border': '2px solid orange', 'background-color': 'lightpink'}]"
                >
                  <img style="height:50px" :src="'/storage/Images/' + i + '.png'" />
                </div>
              </div>

              <div
                :style="[steps < 6 ? {'display': 'none'} : { 'margin': '15px 0'}]"
                class="col-md-6"
              >
                <div
                  v-for="i in numbersArray.slice(2, 4)"
                  :key="i"
                  :id="i + '-element'"
                  draggable="true"
                  @dragstart="onDragging (i ,$event)"
                  class="col-md-1 d-flex justify-content-center align-items-center p-5 m-1"
                   :class="{'animated bounce repeat-3':steps==10||steps==11}"
                  :style="[steps < 6 ? {'display': 'none'} : {'border-radius':'30%','border': '2px solid orange', 'background-color': 'lightpink'}]"
                >
                  <img style="height:50px" :src="'/storage/Images/' + i + '.png'" />
                </div>
              </div>
            </div>

            <div
              class="col-md-6 d-flex justify-content-center align-items-center"
              :style="[steps < 6 ? {'display': 'none'} : {'width': '50%', 'height': '100px'}]"
            >
              <div
                :style="[steps < 6 ? {'display': 'none'} : {'margin': '15px 0px'}]"
                class="col-md-6"
              >
                <div
                  v-for="i in numbersArray.slice(4,6)"
                  :key="i"
                  :id="i + '-element'"
                  draggable="true"
                  @dragstart="onDragging (i,$event)"
                  class="col-md-1 d-flex justify-content-center align-items-center p-5 m-1"
                  :style="[steps < 6 ? {'display': 'none'} : {'border-radius':'30%','border': '2px solid orange', 'background-color': 'lightpink'}]"
                :class="{'animated bounce repeat-3':steps==8||steps==9}"
                >
                  <img style="height:50px" :src="'/storage/Images/' + i + '.png'" />
                </div>
              </div>

              <div
                :style="[steps < 6 ? {'display': 'none'} : { 'margin': '15px 0'}]"
                class="col-md-6"
              >
                <div
                  v-for="i in numbersArray.slice(6,8)"
                  :key="i"
                  :id="i + '-element'"
                  draggable="true"
                  @dragstart="onDragging (i ,$event)"
                  class="col-md-1 d-flex justify-content-center align-items-center p-5 m-1"
                   :class="{'animated bounce repeat-3':steps==6||steps==7}"
                  :style="[steps < 6 ? {'display': 'none'} : {'border-radius':'30%','border': '2px solid orange', 'background-color': 'lightpink'}]"
                >
                  <img style="height:50px" :src="'/storage/Images/' + i + '.png'" />
                </div>
              </div>
            </div>
          </div>
          <!-- third drop -->
          <div class="col-md-11 mt-5 ml-5">
            <div class="col-md-2 d-flex justify-content-center align-items-center mr-5">
              <div
                class="col-md-6 m-1 p-4 pt-5"
                :id="Math.min(...numbersArray.slice(0,2)) + '-sort'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 6 ? {'display': 'none'} : {'width': '50%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':' lightblue',}]"
              ></div>

              <div
                class="col-md-6 p-4 pt-5"
                :id="Math.max(...numbersArray.slice(0,2)) + '-sort'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 6 ? {'display': 'none'} :{'width': '50%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':' lightblue',}]"
              ></div>
            </div>

            <div class="col-md-2 d-flex justify-content-center align-items-center ml-5">
              <div
                class="col-md-6 m-1 p-4 pt-5"
                :id="Math.min(...numbersArray.slice(2,4)) + '-sort'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 6 ? {'display': 'none'} : {'width': '50%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':' lightblue',}]"
              ></div>

              <div
                class="col-md-6 pt-5"
                :id="Math.max(...numbersArray.slice(2,4)) + '-sort'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 6 ? {'display': 'none'} :{'width': '50%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':' lightblue',}]"
              ></div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2 d-flex justify-content-center align-items-center ml-3 mr-5">
              <div
                class="col-md-6 m-1 p-4 pt-5"
                :id="Math.min(...numbersArray.slice(4,6)) + '-sort'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 6 ? {'display': 'none'} : {'width': '50%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':' lightblue',}]"
              ></div>

              <div
                class="col-md-6 p-4 pt-5"
                :id="Math.max(...numbersArray.slice(4,6)) + '-sort'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 6 ? {'display': 'none'} :{'width': '50%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':' lightblue',}]"
              ></div>
            </div>

            <div class="col-md-2 d-flex justify-content-center align-items-center ml-5">
              <div
                class="col-md-6 m-1 p-4 pt-5"
                :id="Math.min(...numbersArray.slice(6,8)) + '-sort'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 6 ? {'display': 'none'} : {'width': '50%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':'lightblue',}]"
              ></div>

              <div
                class="col-md-6 p-4 pt-5"
                :id="Math.max(...numbersArray.slice(6,8)) + '-sort'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 6 ? {'display': 'none'} :{'width': '50%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':'lightblue',}]"
              ></div>
            </div>
          </div>

          <!-- End Step Three Results -->

          <!-- Start Step Four draggable [SORT] -->
          <h2
            :style="[steps < 14 ? {'opacity': '0'} : {'margin':'2% 0 3% -7%'}]"
            class="col-md-12 justify-content-center align-items-center"
          >
            Step Four
            <i
              style="font-size: 30px; color: #FF8C00"
              v-on:click="voice('Step Four. Sort each two sub arrays. into one array.')"
              :class="steps < 18 ? voiceIcon : ''"
            ></i>
            <br />
            <h3>Sort Arrays and conquer into sorted sub-array</h3>
          </h2>
             
          <!-- step four drag -->
          <div class="col-md-11 mt-5 mr-5 pr-5">
            <div class="col-md-3 d-flex justify-content-center align-items-center">
              <div
                class="col-md-5 m-1"
                     :class="{'animated bounce repeat-3':steps==21}"
                :style="[steps < 14 ? {'display': 'none'} : {'height':'100px','border-radius':'30%','border': '2px solid #FFD5AA', 'background-color': '#F0B9D6'}]"
              >
                <div
                  :key="Math.min(...numbersArray.slice(0, 2))"
                  :id="Math.min(...numbersArray.slice(0, 2)) + '-step4'"
                  draggable="true"
                  @dragstart="onDragging (Math.min(...numbersArray.slice(0, 2)),$event)"
                  class="col-md-4 d-flex justify-content-center align-items-center py-4 m-3"
              
                >
                  <img
                    style="height:50px"
                    :src="'/storage/Images/' +  Math.min(...numbersArray.slice(0, 2)) + '.png'"
                  />
                </div>
              </div>
              <div
                class="col-md-5 m-1"
                 :class="{'animated bounce repeat-3':steps==20}"
                :style="[steps < 14 ? {'display': 'none'} :{'height':'100px','border-radius':'30%','border': '3px solid #FFD5AA', 'background-color': '#F0B9D6'}]"
              >
                <div
                  :key="Math.max(...numbersArray.slice(0, 2))"
                  :id="Math.max(...numbersArray.slice(0, 2)) + '-step4'"
                  draggable="true"
                  @dragstart="onDragging (Math.max(...numbersArray.slice(0, 2)),$event)"
                  class="col-md-4 d-flex justify-content-center align-items-center py-4 m-3"
                  
                >
                  <img
                    style="height:50px"
                    :src="'/storage/Images/' +  Math.max(...numbersArray.slice(0, 2)) + '.png'"
                  />
                </div>
              </div>
            </div>

            <div class="col-md-3 d-flex justify-content-center align-items-center">
              <div
                class="col-md-5 m-1"
                   :class="{'animated bounce repeat-3':steps==19}"
                :style="[steps < 14 ? {'display': 'none'} : {'height':'100px','border-radius':'30%','border': '2px solid #FFD5AA', 'background-color': '#F0B9D6'}]"
              >
                <div
                  :key="Math.min(...numbersArray.slice(2,4))"
                  :id="Math.min(...numbersArray.slice(2,4)) + '-step4'"
                  draggable="true"
                  @dragstart="onDragging (Math.min(...numbersArray.slice(2,4)),$event)"
                  class="col-md-4 d-flex justify-content-center align-items-center py-4 m-3"
                
                >
                  <img
                    style="height:50px"
                    :src="'/storage/Images/' +  Math.min(...numbersArray.slice(2,4)) + '.png'"
                  />
                </div>
              </div>
              <div
                class="col-md-5 m-1"
                :class="{'animated bounce repeat-3':steps==18}"
                :style="[steps < 14 ? {'display': 'none'} :{'height':'100px','border-radius':'30%','border': '3px solid #FFD5AA', 'background-color': '#F0B9D6'}]"
              >
                <div
                  :key="Math.max(...numbersArray.slice(2,4))"
                  :id="Math.max(...numbersArray.slice(2,4)) + '-step4'"
                  draggable="true"
                  @dragstart="onDragging (Math.max(...numbersArray.slice(2,4)),$event)"
                  class="col-md-4 d-flex justify-content-center align-items-center py-4 m-3"
                 
                >
                  <img

                    style="height:50px"
                    :src="'/storage/Images/' +  Math.max(...numbersArray.slice(2,4)) + '.png'"
                  />
                </div>
              </div>
              <div class="col-md-1 mr-5"></div>
            </div>

            <div class="col-md-3 d-flex justify-content-center align-items-center">
              <div class="col-md-1 ml-5"></div>
              <div
                class="col-md-5 m-1"
                     :class="{'animated bounce repeat-3':steps==17}"
                :style="[steps < 14 ? {'display': 'none'} : {'height':'100px','border-radius':'30%','border': '2px solid #FFD5AA', 'background-color': '#F0B9D6'}]"
              >
                <div
                  :key="Math.min(...numbersArray.slice(4,6))"
                  :id="Math.min(...numbersArray.slice(4,6)) + '-step4'"
                  draggable="true"
                  @dragstart="onDragging (Math.min(...numbersArray.slice(4,6)),$event)"
                  class="col-md-4 d-flex justify-content-center align-items-center py-4 m-3"
              
                >
                  <img
                    style="height:50px"
                    :src="'/storage/Images/' +  Math.min(...numbersArray.slice(4,6)) + '.png'"
                  />
                </div>
              </div>
              <div
                class="col-md-5 m-1"
                 :class="{'animated bounce repeat-3':steps==16}"
                :style="[steps < 14 ? {'display': 'none'} :{'height':'100px','border-radius':'30%','border': '3px solid #FFD5AA', 'background-color': '#F0B9D6'}]"
              >
                <div
                  :key="Math.max(...numbersArray.slice(4,6))"
                  :id="Math.max(...numbersArray.slice(4,6)) + '-step4'"
                  draggable="true"
                  @dragstart="onDragging (Math.max(...numbersArray.slice(4,6)),$event)"
                  class="col-md-4 d-flex justify-content-center align-items-center py-4 m-3"
                  
                >
                  <img
                    style="height:50px"
                    :src="'/storage/Images/' +  Math.max(...numbersArray.slice(4,6)) + '.png'"
                  />
                </div>
              </div>
            </div>

            <div class="col-md-3 d-flex justify-content-center align-items-center">
              <div
                class="col-md-5 m-1"
                 :class="{'animated bounce repeat-3':steps==15}"
                :style="[steps < 14 ? {'display': 'none'} : {'height':'100px','border-radius':'30%','border': '2px solid #FFD5AA', 'background-color': '#F0B9D6'}]"
              >
                <div
                  :key="Math.min(...numbersArray.slice(6,8))"
                  :id="Math.min(...numbersArray.slice(6,8)) + '-step4'"
                  draggable="true"
                  @dragstart="onDragging (Math.min(...numbersArray.slice(6,8)),$event)"
                  class="col-md-4 d-flex justify-content-center align-items-center py-4 m-3"
                  
                >
                  <img
                    style="height:50px"
                    :src="'/storage/Images/' +  Math.min(...numbersArray.slice(6,8)) + '.png'"
                  />
                </div>
              </div>
              <div
                class="col-md-5 m-1"
                 :class="{'animated bounce repeat-3':steps==14}"
                :style="[steps < 14 ? {'display': 'none'} :{'height':'100px','border-radius':'30%','border': '3px solid #FFD5AA', 'background-color': '#F0B9D6'}]"
              >
                <div
                  :key="Math.max(...numbersArray.slice(6,8))"
                  :id="Math.max(...numbersArray.slice(6,8)) + '-step4'"
                  draggable="true"
                  @dragstart="onDragging (Math.max(...numbersArray.slice(6,8)),$event)"
                  class="col-md-4 d-flex justify-content-center align-items-center py-4 m-3"
                  
                >
                  <img
                    style="height:50px"
                    :src="'/storage/Images/' +  Math.max(...numbersArray.slice(6,8)) + '.png'"
                  />
                </div>
              </div>
            </div>
          </div>

          
          <!-- step four drop -->
          <div class="col-md-11 mt-5 mr-5 pr-5">
            <div class="col-md-6 d-flex justify-content-center align-items-center pr-5">
              <div
              
                class="col-md-3 m-1 p-5"
                 
                     :class="{'animated bounce repeat-3':steps==21}"
                :id="leftSortedArray[0] + '-sortstep4'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 14? {'display': 'none'} : {'width': '80%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':'lightgreen',}]"
              ></div>

              <div
                class="col-md-3 m-1 p-5"
                :id="leftSortedArray[1] + '-sortstep4'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 14? {'display': 'none'} : {'width': '80%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':'lightgreen',}]"
              ></div>

              <div
                class="col-md-3 m-1 p-5"
                :id="leftSortedArray[2] + '-sortstep4'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 14? {'display': 'none'} : {'width': '80%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':'lightgreen',}]"
              ></div>

              <div
                class="col-md-3 m-1 p-5"
                :id="leftSortedArray[3] + '-sortstep4'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 14? {'display': 'none'} : {'width': '80%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':'lightgreen',}]"
              ></div>
            </div>

            <div class="col-md-6 d-flex justify-content-center align-items-center pl-5">
              <div
                class="col-md-3 m-1 p-5"
                :id="rightSortedArray[0] + '-sortstep4'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 14? {'display': 'none'} : {'width': '80%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':'lightblue',}]"
              ></div>

              <div
                class="col-md-3 m-1 p-5"
                :id="rightSortedArray[1] + '-sortstep4'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 14? {'display': 'none'} : {'width': '80%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':'lightblue',}]"
              ></div>

              <div
                class="col-md-3 m-1 p-5"
                :id="rightSortedArray[2] + '-sortstep4'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 14? {'display': 'none'} : {'width': '80%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':'lightblue',}]"
              ></div>

              <div
                class="col-md-3 m-1 p-5"
                :id="rightSortedArray[3] + '-sortstep4'"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 14? {'display': 'none'} : {'width': '80%', 'height': '100px', 'border-radius':'30%','border': '2px solid #F2BBAD', 'background-color':'lightblue',}]"
              ></div>
            </div>
          </div>

          <!-- End Step Four Results -->

          <!-- Start Step five [SORT] -->
          <h2
            :style="[steps < 22 ? {'opacity': '0'} : {'margin': '2% 0 3% -7%'}]"
            class="col-md-12 justify-content-center align-items-center"
          >
            Step Five
            <i
              style="font-size: 30px; color: #FF8C00"
              v-on:click="voice('Great. You get it. Now sort all elements into one main array. ')"
              :class="steps < 22 ? voiceIcon : ''"
            ></i>
            <br />
            <h3>Sort sub-Arrays' elements and conquer into Main Sorted Array</h3>
          </h2>
        <div class="col-md-11">
          <div class="col-md-5 d-flex justify-content-center align-items-center p-4">
            <div
                class="col-md-3 m-1"
                     :class="{'animated bounce repeat-3':steps==29}"
               
              :style="[steps < 22 ? {'display': 'none'} : {'height':'100px','border-radius':'30%','border': '2px solid #FFD5AA', 'background-color': 'lightgreen'}]"
            >
              <div
                :key="leftSortedArray[0]"
                :id="leftSortedArray[0] + '-step5'"
                draggable="true"
                @dragstart="onDragging(leftSortedArray[0],$event)"
                class="d-flex justify-content-center align-items-center p-4 pt-5"
                    
              >
             \
                  <img
                   
                    style="height:50px"
                    :src="'/storage/Images/' + leftSortedArray[0] + '.png'"
                  />
              
              </div>
            </div>

            <div
               class="col-md-3 m-1"
                     :class="{'animated bounce repeat-3':steps==28}"
              :style="[steps < 22 ? {'display': 'none'} :{'height':'100px','border-radius':'30%','border': '2px solid #FFD5AA', 'background-color': 'lightgreen'}]"
            >
              <div
                :key="leftSortedArray[1]"
                :id="leftSortedArray[1] + '-step5'"
                draggable="true"
                @dragstart="onDragging(leftSortedArray[1],$event)"
                class="d-flex justify-content-center align-items-center p-4 pt-5"
              >
               
                  <img
                   
                    style="height:50px"
                    :src="'/storage/Images/' + leftSortedArray[1] + '.png'"
                  />
                </div>
           
            </div>

            <div
                class="col-md-3 m-1"
                     :class="{'animated bounce repeat-3':steps==27}"
              :style="[steps < 22 ? {'display': 'none'} : {'height':'100px','border-radius':'30%','border': '2px solid #FFD5AA', 'background-color': 'lightgreen'}]"
            >
              <div
                :key="leftSortedArray[2]"
                :id="leftSortedArray[2] + '-step5'"
                draggable="true"
                @dragstart="onDragging(leftSortedArray[2],$event)"
                class="d-flex justify-content-center align-items-center p-4 pt-5"
              >
           
                  <img
                 
                    style="height:50px"
                    :src="'/storage/Images/' + leftSortedArray[2] + '.png'"
                  />
              
              </div>
            </div>

            <div
               class="col-md-3 m-1"
                     :class="{'animated bounce repeat-3':steps==26}"
              :style="[steps < 22 ? {'display': 'none'} :{'height':'100px','border-radius':'30%','border': '2px solid #FFD5AA', 'background-color': 'lightgreen'}]"
            >
              <div
                :key="leftSortedArray[3]"
                :id="leftSortedArray[3] + '-step5'"
                draggable="true"
                @dragstart="onDragging(leftSortedArray[3],$event)"
                class="d-flex justify-content-center align-items-center p-4 pt-5"
           >
                  <img
                    
                    style="height:50px"
                    :src="'/storage/Images/' + leftSortedArray[3] + '.png'"
                  />
             
              </div>
            </div>
          </div>
              <div class="col-md-1"></div>
          <div class="col-md-5 d-flex justify-content-center align-items-center p-4">
            <div
                class="col-md-3 m-1"
                     :class="{'animated bounce repeat-3':steps==25}"
              :style="[steps < 22 ? {'display': 'none'} :{'height':'100px','border-radius':'30%','border': '2px solid #FFD5AA', 'background-color': 'lightblue'}]"
            >
              <div
                :key="rightSortedArray[0]"
                :id="rightSortedArray[0] + '-step5'"
                draggable="true"
                @dragstart="onDragging(rightSortedArray[0],$event)"
                class="d-flex justify-content-center align-items-center p-4 pt-5"
              >
              
                  <img
                    
                    style="height:50px"
                    :src="'/storage/Images/' + rightSortedArray[0] + '.png'"
                  />
              
              </div>
            </div>

            <div
                class="col-md-3 m-1"
                     :class="{'animated bounce repeat-3':steps==24}"
              :style="[steps < 22 ? {'display': 'none'} :{'height':'100px','border-radius':'30%','border': '2px solid #FFD5AA', 'background-color': 'lightblue'}]"
            >
              <div
                :key="rightSortedArray[1]"
                :id="rightSortedArray[1] + '-step5'"
                draggable="true"
                @dragstart="onDragging(rightSortedArray[1],$event)"
                class="d-flex justify-content-center align-items-center p-4 pt-5"
              >
               
                  <img
                   
                    style="height:50px"
                    :src="'/storage/Images/' + rightSortedArray[1] + '.png'"
                  />
               
              </div>
            </div>

            <div
                class="col-md-3 m-1"
                     :class="{'animated bounce repeat-3':steps==23}"
              :id="rightSortedArray[2] + '-sortstep4'"
              :style="[steps < 22 ? {'display': 'none'} :{'height':'100px','border-radius':'30%','border': '2px solid #FFD5AA', 'background-color': 'lightblue'}]"
            >
              <div
                :key="rightSortedArray[2]"
                :id="rightSortedArray[2] + '-step5'"
                draggable="true"
                @dragstart="onDragging(rightSortedArray[2],$event)"
                class="d-flex justify-content-center align-items-center p-4 pt-5"
              >
                
                  <img
                  
                    style="height:50px"
                    :src="'/storage/Images/' + rightSortedArray[2] + '.png'"
                  />
                
              </div>
            </div>

            <div
               class="col-md-3 m-1"
                     :class="{'animated bounce repeat-3':steps==22}"
              :id="rightSortedArray[3] + '-sortstep4'"
              :style="[steps < 22 ? {'display': 'none'} :{'height':'100px','border-radius':'30%','border': '2px solid #FFD5AA', 'background-color': 'lightblue'}]"
            >
              <div
                :key="rightSortedArray[3]"
                :id="rightSortedArray[3] + '-step5'"
                draggable="true"
                @dragstart="onDragging(rightSortedArray[3],$event)"
                class="d-flex justify-content-center align-items-center p-4 pt-5"
              >
                
                  <img
                    
                    style="height:50px"
                    :src="'/storage/Images/' + rightSortedArray[3] + '.png'"
                  />
              
              </div>
            </div>
          </div>
        </div>


        <!-- step five drop  -->

          <div
            class="col-md-11 d-flex justify-content-center align-items-center ml-5 pl-5"
            
          >
          <div class="col-md-1"></div>
            <div class="col-md-11 " >
              <div
                v-for="i in sortedArray"
                @drop="drop"
                @dragover="allowDrop"
                :style="[steps < 22 ? {'display': 'none'} :{'width': '100%','height':'100px','border-radius':'30%','border': '2px solid #FFD5AA', 'background-color': '#F0B9D6'}]"
                :id="i + '-finalResult'"
                :key="i"
                class="col-lg-1 m-1 py-5 pl-4 "
              ></div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <div
      id="congrats"
      class="popup justify-content-center align-items-center"
      onclick="$(this).hide()"
    >
      <div class="d-flex justify-content-center">
        <img
          class="col-md-5"
          :style="[{ margin: '5px', 'line-height': '7' }]"
          :src="'/storage/Images/congrates.gif'"
          alt
        />
      </div>
    </div>

    <audio id="correctElm" src="/storage/Sound/correct.mp3"></audio>
    <audio id="appluaseElm" src="/storage/Sound/applause6.mp3"></audio>
    <audio id="WrongElm" src="/storage/Sound/Wrong-answer.mp3"></audio>
     <audio id="applausElm" src="/storage/Sound/congrats-applaus.mp3"></audio>
    <audio id="fireworkElm" src="/storage/Sound/firework.mp3"></audio>

  </div>
</template>

<script>
export default {
  name: "MergeSortComponent",
  data() {
    return {
      answer: "",
      steps:0,
      status: "false",
      numbersArray: [],
      sortedArray: [],
      rightSortedArray: [],
      leftSortedArray: [],
      voiceIcon: "fa fa-play-circle",
      synth: window.speechSynthesis
    };
  },

  methods: {
    getArray: function(start, end, step) {
      let array = _.range(start, end, step);
      let currentIndex = array.length,
        temporaryValue,
        randomIndex;

      while (0 !== currentIndex) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
      }

      return array;
    },

    onDragging(arr, event) {
      event.dataTransfer.setData("text", event.target.id);
      event.dataTransfer.setData("imagElements", arr);
      console.log("EvEnT ==>", event);
    },

    allowDrop(event) {
      event.preventDefault();
    },

    drag(event) {
      this.voice("drag,me");
      event.dataTransfer.setData("text", event.target.id);
    },

    drop(event) {
      event.preventDefault();
      let data = event.dataTransfer.getData("text");
      let arr = event.dataTransfer.getData("imagElements");

      if (event.target.id.split("-")[0] === data.split("-")[0]) {
        this.newEle(event.target, arr.split(","));
        $("#correctElm")[0].play();
        $("#appluaseElm")[0].play();

        this.answer = "Yes";
        this.steps++;
        this.status = "true";
        if(this.steps === 30){
          this.endGame();
        }

        if (
          this.steps === 2 ||
          this.steps === 6 ||
          this.steps === 14 ||
          this.steps === 22
        ) {
          this.answer = "Think";
        }
      } else {
        this.answer = "No";
        $("#WrongElm")[0].play();
      }
    },

    newEle(parent, values) {
      let elements = [];

      for (let i = 0; i < values.length; i++) {
        let el = document.createElement("DIV");

        el.innerHTML = `
                        <div  id=${
                          i == 0 || i == 1 ? "-" + values[i] : "-" + values[i]
                        } >
                          
                            <img style="height:50px" src="/storage/Images/${
                              values[i]
                            }.png" />
                            
                          
                        </div>
                    `;

        elements.push(el);
      }
      console.log("value", values);

      switch (values.length) {
        case 4:
          let leftRegion = document.createElement("DIV");

          leftRegion.innerHTML = `
                             <div>
                            <div class="col-md-1 d-flex justify-content-center align-items-center m-5">
                                ${elements[0].innerHTML}
                               
                            </div>
                              <div class="col-md-1 d-flex justify-content-center align-items-center m-5">
                                
                                ${elements[1].innerHTML}
                            </div>
                             </div>
                        `;
          console.log("elements[0].innerHTML==>", elements[0].innerHTML);
          parent.appendChild(leftRegion);

          let rightRegion = document.createElement("DIV");
          rightRegion.innerHTML = `
                            <div>
                            <div class="col-md-1 d-flex justify-content-center align-items-center m-5">
                                ${elements[2].innerHTML}
                               
                            </div>
                              <div class="col-md-1 d-flex justify-content-center align-items-center m-5">
                                
                                ${elements[3].innerHTML}
                            </div>
                             </div>
                        `;

          parent.appendChild(rightRegion);
          break;

        case 2:
          let firstItem = document.createElement("DIV");
          firstItem.innerHTML = `
                            <div class="col-md-1 d-flex justify-content-center align-items-center m-3 pr-5">
                                ${elements[0].innerHTML}
                            </div>
                        `;

          parent.appendChild(firstItem);

          let sectItem = document.createElement("DIV");
          sectItem.innerHTML = `
                            <div  class="col-md-1 d-flex justify-content-center align-items-center m-3 ">
                                ${elements[1].innerHTML}
                            </div>
                        `;
          parent.appendChild(sectItem);

          break;

        case 1:
          let singleNum = document.createElement("DIV");
          singleNum.innerHTML = `
                            <div  class="col-md-1 d-flex justify-content-center align-items-center p-3>
                                ${elements[0].innerHTML}
                            </div>
                        `;
          parent.appendChild(singleNum);
          console.log(singleNum);
          break;
      }
    },

    textToVoice: function(text) {
      if (speechSynthesis !== undefined) {
        let toSpeak = new SpeechSynthesisUtterance(text);
        toSpeak.voice = this.synth.getVoices()[1];
        this.synth.speak(toSpeak);
      }
    },
endGame: function() {
      $("#applausElm")[0].play();

      $("#congrats").show();
      $("#fireworkElm")[0].play();
    },
    voice: function(msg) {
      this.voiceIcon = "fa fa-volume-up";
      this.textToVoice(msg);
      setTimeout(() => {
        this.voiceIcon = "fa fa-play-circle";
      }, 1000);
    }
  },

  created() {
    this.numbersArray = this.getArray(0, 8, 1);
    this.sortedArray = [...this.numbersArray].sort(function(a, b) {
      return a - b;
    });
    this.leftSortedArray = [...this.numbersArray.slice(0, 4)].sort(function(
      a,
      b
    ) {
      return a - b;
    });
    this.rightSortedArray = [...this.numbersArray.slice(4, 8)].sort(function(
      a,
      b
    ) {
      return a - b;
    });
    this.answer = "Think"; // Values ==> [Think, Yes, No].
  }
};
</script>
<style scoped>
.animatediv {
  animation: firstSelect;
  animation-duration: 4s;
  animation-delay: 1s;
  animation-iteration-count: 2;
  margin: 0 2px;
}

@keyframes firstSelect {
  from {
    background-color: pink;

    top: 0px;
  }

  50% {
    background-color: yellow;

    top: 200px;
  }

  to {
    background-color: green;

    top: 0px;
  }
}
.popup {
  position: fixed;
  top: 50%;
  left: 50%;
  width:100%;
  height: 100%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  background-color: rgba(1, 1, 22, 0.986);
  color: white;
  display: none;
  padding-top: 30px;
  z-index: 999;
}
</style>