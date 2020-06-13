<template>
    <div class="container">
        <div class="row">
            <div class="col-md-2 d-flex justify-content-center align-items-center p-4">
                <div style="text-align:center; line-height: 5">
                    <img
                        :style="[{ 'position': 'fixed', 'top': '30%', 'left': '15%'}]"
                        :src="'/storage/Images/' + answer + '.gif'" alt="">
                </div>
            </div>

            <div class="col-md-10 justify-content-center align-items-center p-4">

                <h2 :style="[{'margin-left': '12%'}]" 
                    class="col-md-12 justify-content-center align-items-center p-4" >  Step One
                        <i style="font-size: 48px; color: #FF8C00" 
                        v-on:click="voice('Step One. Divide This main array. into two sub-arrays. ')" :class="steps < 2 ? voiceIcon : ''"></i>
                        <br/> <h3>Divide The main array into two sub-arrays</h3> </h2>

                <div class='col-md-12' style="margin-left:25%">
                    <div id = "left-container" :draggable="status" @dragstart="onDragging">
                        <div v-for="i in numbersArray.slice(0, 4)"
                            :style="[{'background-color': 'lightgreen'}]"
                            :key="i" class="col-md-1 d-flex justify-content-center align-items-center p-4">
                            <div style="font-size: 30px; margin: 0 40px;">{{ i }}</div>
                        </div>
                    </div>

                    <div id = "right-container" draggable="true" @dragstart="onDragging">
                        <div v-for="i in numbersArray.slice(4, 8)"
                            :style="[{'background-color': 'lightblue'}]"
                            :key="i" class="col-md-1 d-flex justify-content-center align-items-center p-4">
                            <div style="font-size: 30px; margin: 0 40px">{{ i }}</div>
                        </div>
                    </div>
                    <div><img
                        :style="[   steps === 0 ?   {'width': '25%', 'height': '150px', 'float': 'right', 'margin-right': '20%'} : 
                                    steps === 1 ?   {'width': '25%', 'height': '150px', 'float': 'left', 'margin-right': '20%', 'transform': 'scaleX(-1)'} : 
                                                    {'display' : 'none'}
                                ]"
                        src="/storage/Images/arrow.gif" alt="" /></div>
                </div>

                <div class="col-md-12" style="margin-left:20%" >
                    <div id = "left-draggable" 
                        class="col-md-5 d-flex justify-content-center align-items-center p-4"
                        @drop="drop" @dragover="allowDrop"
                        :style ="[{'margin': '5px', 'border': '1px solid gray', 'width': '50%', 'height': '74px', 'background-color': 'lightgreen'}]"
                        >
                    </div>


                    <div id = "right-draggable" 
                        class="col-md-5 d-flex justify-content-center align-items-center p-4"
                        @drop="drop" @dragover="allowDrop"
                        :style ="[{'margin': '5px', 'border': '1px solid gray', 'width': '50%', 'height': '74px', 'background-color': 'lightblue'}]"
                        >
                    </div>


                    <!-- Start Step Two Result -->
                    <h2 :style="[steps < 2 ? {'opacity': '0'} : {'margin': '10% 0 3% -10%'}]" 
                    class="col-md-12 justify-content-center align-items-center" > Step Two 
                    <i style="font-size: 48px; color: #FF8C00" 
                    v-on:click="voice('Step Two. Divide each sub array. into two arrays. ')" :class="steps < 6 ? voiceIcon : ''"></i>
                    <br /> <h3>Divide each sub array into two arrays</h3></h2>

                    <div
                        class="col-md-5 d-flex justify-content-center align-items-center p-4"
                        :style="[
                            steps < 2 ? {'display': 'none'} :
                            {'margin': '5px', 'width': '50%', 'height': '74px'}]">

                        <div  class="row">
                                <div
                                    :style="[steps < 2 ? {'display': 'none'} : {'border': '1px solid gray', 'background-color': 'lightgreen', 'margin': '15px 0'}]"
                                   class="col-md-5"
                                    id= "4left-2"
                                    draggable="true" @dragstart="onDragging">
                                    <div
                                        v-for="i in numbersArray.slice(0, 2)"
                                        :key="i"
                                        class="xyz col-md-5 d-flex justify-content-center align-items-center p-4">
                                        <div style="font-size: 30px; margin: 0 40px">{{ i }}</div>
                                    </div>

                                </div>

                                <div
                                    :style="[steps < 2 ? {'display': 'none'} : {'border': '1px solid gray', 'background-color': 'lightgreen', 'margin': '15px 0 15px 0'}]"
                                    class="col-md-5"
                                    id= "4left-1"
                                    draggable="true" @dragstart="onDragging">
                                    <div
                                        v-for="i in numbersArray.slice(2, 4)"
                                        :key="i"
                                        class="xyz col-md-5 d-flex justify-content-center align-items-center p-4">
                                        <div style="font-size: 30px; margin: 0 40px">{{ i }}</div>
                                    </div>

                                </div>

                        </div>
                    </div>

                    <div 
                        class="col-md-5 d-flex justify-content-center align-items-center p-4"
                        :style="[steps < 2 ? {'display': 'none'} : {'margin': '5px', 'width': '50%', 'height': '74px'}]">
                        <div class="row">
                                <div
                                    :style="[steps < 2 ? {'display': 'none'} : {'border': '1px solid gray', 'background-color': 'lightblue', 'margin': '15px 0'}]"
                                    id= "4right-1"
                                    draggable="true" @dragstart="onDragging"
                                    class="col-md-5">
                                    <div
                                        v-for="i in numbersArray.slice(4, 6)"
                                        :key="i"
                                        class="xyz col-md-5 d-flex justify-content-center align-items-center p-4">
                                        <div style="font-size: 30px; margin: 0 40px">{{ i }}</div>
                                    </div>

                                </div>

                                <div
                                    :style="[steps < 2 ? {'display': 'none'} : {'border': '1px solid gray', 'background-color': 'lightblue', 'margin': '15px 0'}]"
                                    class="col-md-5"
                                    id= "4right-2"
                                    draggable="true" @dragstart="onDragging">
                                    <div
                                        v-for="i in numbersArray.slice(6, 8)"
                                        :key="i"
                                        class="xyz col-md-5 d-flex justify-content-center align-items-center p-4">
                                        <div style="font-size: 30px; margin: 0 40px">{{ i }}</div>
                                    </div>

                                </div>                                
                        </div>
                    </div>

                    <div>
                        <img
                            :style="[   steps === 2 ?   {'width': '25%', 'height': '150px', 'margin-right':'8%', 'float': 'right'} : 
                                        steps === 3 ?   {'width': '25%', 'height': '150px', 'margin-right':'38%', 'float': 'right', 'transform': 'scaleX(-1)'} :
                                        steps === 4 ?   {'width': '25%', 'height': '150px', 'margin-left':'22%', 'float': 'left'} : 
                                        steps === 5 ?   {'width': '25%', 'height': '150px', 'margin-left':'-4%', 'float': 'left', 'transform': 'scaleX(-1)'} : 
                                                        {'display' : 'none'}
                                ]   "
                            src="/storage/Images/arrow.gif" alt="" />
                    </div>
    

                    <div class='col-md-12 d-flex justify-content-center align-items-center p-4' style="margin-left: -5%">
                        <div class='col-md-6 d-flex justify-content-center align-items-center p-4'>
                            <div class=" col-md-6" id="4left-step1" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 2 ? {'display': 'none'} : {'width': '100%', 'height': '74px', 'background-color': '#FAEBD7'}]"></div>

                            
                            <div class=" col-md-6" id="4left-step2" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 2 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'background-color': '#F5F5DC'}]"></div>
                        </div>

                        <div class='col-md-6 d-flex justify-content-center align-items-center p-4'>
                            <div class=" col-md-6" id="4right-step3" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 2 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'background-color': '#FAEBD7'}]"></div>
                            <div class=" col-md-6" id="4right-step4" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 2 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'background-color': '#F5F5DC'}]"></div>
                        </div>
                    </div>

                    <!-- End Step Two Results -->




                     <!-- Start Step Three Result [SORT] -->
                    <h2 :style="[steps < 6 ? {'opacity': '0'} : {'margin': '10% 0 3% -7%'}]" 
                    class="col-md-12 justify-content-center align-items-center" > Step Three 
                    <i style="font-size: 48px; color: #FF8C00" 
                    v-on:click="voice('Step Three. We seperated each array into elements. Sort elements. and conquer into sorted sub-arrays. ')" :class=":class="steps < 14 ? voiceIcon : ''""></i>
                    <br /> <h3>Sort elements and conquer into sorted sub-array</h3> </h2>

                    <div
                        class="col-md-6 d-flex justify-content-center align-items-center p-4"
                        :style="[
                            steps < 6 ? {'display': 'none'} : {'width': '50%', 'height': '74px'}]">

                        <div  class="row">
                                <div
                                    :style="[steps < 6 ? {'display': 'none'} : {'margin': '15px 0'}]"
                                   class="col-md-5"
                                    >
                                    <div
                                        v-for="i in numbersArray.slice(0, 2)"
                                        :key="i"
                                        :id = "i + '-element'"
                                        draggable="true" @dragstart="onDragging"
                                        class="col-md-4 d-flex justify-content-center align-items-center p-4" 
                                        :style="[steps < 6 ? {'display': 'none'} : {'background-color': '#FAEBD7', 'margin': '0 5%'}]"
                                        >
                                        <div style="font-size: 30px; margin: 0 40px">{{ i }}</div>
                                    </div>

                                </div>

                                <div
                                    :style="[steps < 6 ? {'display': 'none'} : { 'margin': '15px 0'}]"
                                    class="col-md-5">
                                     <div
                                        v-for="i in numbersArray.slice(2, 4)"
                                        :key="i"
                                        :id = "i + '-element'"
                                        draggable="true" @dragstart="onDragging"
                                        class="col-md-4 d-flex justify-content-center align-items-center p-4" 
                                        :style="[steps < 6 ? {'display': 'none'} : {'background-color': '#FAEBD7', 'margin': '0 5%'}]">
                                        <div style="font-size: 30px; margin: 0 40px">{{ i }}</div>
                                    </div>

                                </div>

                        </div>
                    </div>

                    <div 
                        class="col-md-6 d-flex justify-content-center align-items-center p-4"
                        :style="[steps < 6 ? {'display': 'none'} : {'width': '50%', 'height': '74px'}]">
                        <div class="row">
                                <div
                                    :style="[steps < 6 ? {'display': 'none'} : {'margin': '15px 0'}]"
                                    class="col-md-5">
                                    <div
                                        v-for="i in numbersArray.slice(4, 6)"
                                        :key="i"
                                        :id = "i + '-element'"
                                        draggable="true" @dragstart="onDragging"
                                        class="col-md-4 d-flex justify-content-center align-items-center p-4" 
                                        :style="[steps < 6 ? {'display': 'none'} : {'background-color': '#F5F5DC', 'margin': '0 5%'}]">
                                        <div style="font-size: 30px; margin: 0 40px">{{ i }}</div>
                                    </div>

                                </div>

                                <div
                                    :style="[steps < 6 ? {'display': 'none'} : {'margin': '15px 0'}]"
                                    class="col-md-5">
                                    <div
                                        v-for="i in numbersArray.slice(6, 8)"
                                        :key="i"
                                        :id = "i + '-element'"
                                        draggable="true" @dragstart="onDragging"
                                        class="col-md-4 d-flex justify-content-center align-items-center p-4" 
                                        :style="[steps < 6 ? {'display': 'none'} : {'background-color': '#F5F5DC', 'margin': '0 5%'}]">
                                        <div style="font-size: 30px; margin: 0 40px">{{ i }}</div>
                                    </div>

                                </div>                                
                        </div>
                    </div>

                    <!--
                    <div>
                        <img
                            :style="[   steps === 6 || steps === 7 ?   {'height': '150px', 'float': 'right', 'margin-right': '11%'} : 
                                        steps === 8 || steps === 9 ?   {'height': '150px', 'float': 'right', 'margin-right': '33%'} : 
                                        steps === 10 || steps === 11 ?   {'height': '150px', 'float': 'left' , 'margin-left' : '22%'} : 
                                        steps === 12 || steps === 13 ?   {'height': '150px', 'float': 'left'} :  {'display' : 'none'}
                                ]   "
                            src="/storage/Images/drop.gif" alt="" />
                    </div>
                    -->
                    
                    <div class='col-md-12 d-flex justify-content-center align-items-center p-4' style="margin-left: -5%">
                        <div class='col-md-3 d-flex justify-content-center align-items-center p-4'>
                            <div class=" col-md-6" :id="Math.min(...numbersArray.slice(0, 2)) + '-sort'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 6 ? {'display': 'none'} : {'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': '#FAEBD7'}]"></div>

                            
                            <div class=" col-md-6" :id="Math.max(...numbersArray.slice(0, 2)) + '-sort'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 6 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': '#FAEBD7'}]"></div>
                        </div>

                        <div class='col-md-3 d-flex justify-content-center align-items-center p-4'>
                            <div class=" col-md-6" :id="Math.min(...numbersArray.slice(2, 4)) + '-sort'" @drop="drop" @dragover="allowDrop"
                            :style="[steps < 6 ? {'display': 'none'} : {'width': '100%', 'height': '74px','border-right': '2px solid white',  'background-color': '#FAEBD7'}]"></div>

                            
                            <div class=" col-md-6" :id="Math.max(...numbersArray.slice(2, 4)) + '-sort'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 6 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'background-color': '#FAEBD7'}]"></div>
                        </div>

                        <div class='col-md-3 d-flex justify-content-center align-items-center p-4'>
                            <div class=" col-md-6" :id="Math.min(...numbersArray.slice(4, 6)) + '-sort'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 6 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': '#F5F5DC'}]"></div>
                            
                            <div class=" col-md-6" :id="Math.max(...numbersArray.slice(4, 6)) + '-sort'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 6 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white',  'background-color': '#F5F5DC'}]"></div>
                        </div>

                        <div class='col-md-3 d-flex justify-content-center align-items-center p-4'>
                            <div class=" col-md-6" :id="Math.min(...numbersArray.slice(6, 8)) + '-sort'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 6 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': '#F5F5DC'}]"></div>
                           
                            <div class=" col-md-6" :id="Math.max(...numbersArray.slice(6, 8)) + '-sort'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 6 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'background-color': '#F5F5DC'}]"></div>
                        </div>
                    </div>
                    <!-- End Step Three Results -->



                    <!-- Start Step Four [SORT] -->
                    <h2 :style="[steps < 14 ? {'opacity': '0'} : {'margin': '10% 0 3% -7%'}]" 
                    class="col-md-12 justify-content-center align-items-center" > Step Four 
                    <i style="font-size: 48px; color: #FF8C00" 
                    v-on:click="voice('Step Four. Sort each two sub arrays. into one array.')" :class="steps < 18 ? voiceIcon : ''"></i>
                    <br /> <h3>Sort Arrays and conquer into sorted sub-array</h3> </h2>

                    <div class='col-md-3 d-flex justify-content-center align-items-center p-4'>
                        <div class=" col-md-6" 
                        :style="[steps < 14 ? {'display': 'none'} : {'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': '#FAEBD7'}]">
                            <div
                                :key="Math.min(...numbersArray.slice(0, 2))"
                                :id="Math.min(...numbersArray.slice(0, 2)) + '-step4'"
                                draggable="true" @dragstart="onDragging"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{ Math.min(...numbersArray.slice(0, 2)) }}</div>
                            </div>
                        </div>

                        
                        <div class=" col-md-6" 
                        :style="[steps < 14 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': '#FAEBD7'}]">
                            <div
                                :key="Math.max(...numbersArray.slice(0, 2))"
                                :id="Math.max(...numbersArray.slice(0, 2)) + '-step4'"
                                draggable="true" @dragstart="onDragging"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{ Math.max(...numbersArray.slice(0, 2)) }}</div>
                            </div>
                        </div>

                    </div>

                    <div class='col-md-3 d-flex justify-content-center align-items-center p-4'>
                        <div class=" col-md-6" 
                        :style="[steps < 14 ? {'display': 'none'} : {'width': '100%', 'height': '74px','border-right': '2px solid white',  'background-color': '#FAEBD7'}]">
                            <div
                                :key="Math.min(...numbersArray.slice(2, 4))"
                                draggable="true" @dragstart="onDragging"
                                :id="Math.min(...numbersArray.slice(2, 4)) + '-step4'"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{ Math.min(...numbersArray.slice(2, 4)) }}</div>
                            </div>
                        </div>

                        
                        <div class=" col-md-6" 
                            :style="[steps < 14 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'background-color': '#FAEBD7'}]">
                            <div
                                :key="Math.max(...numbersArray.slice(2, 4))"
                                :id="Math.max(...numbersArray.slice(2, 4)) + '-step4'"
                                draggable="true" @dragstart="onDragging"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{ Math.max(...numbersArray.slice(2, 4)) }}</div>
                            </div>
                        </div>
                    </div>

                    <div class='col-md-3 d-flex justify-content-center align-items-center p-4'>
                        <div class=" col-md-6" 
                        :style="[steps < 14 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': '#F5F5DC'}]">
                            <div
                                :key="Math.min(...numbersArray.slice(4, 6))"
                                draggable="true" @dragstart="onDragging"
                                :id="Math.min(...numbersArray.slice(4, 6)) + '-step4'"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{ Math.min(...numbersArray.slice(4, 6)) }}</div>
                            </div>
                        </div>
                        
                        <div class=" col-md-6" 
                        :style="[steps < 14 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white',  'background-color': '#F5F5DC'}]">
                            <div
                                :key="Math.max(...numbersArray.slice(4, 6))"
                                :id="Math.max(...numbersArray.slice(4, 6)) + '-step4'"
                                draggable="true" @dragstart="onDragging"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{ Math.max(...numbersArray.slice(4, 6)) }}</div>
                            </div>
                        </div>
                    </div>

                    <div class='col-md-3 d-flex justify-content-center align-items-center p-4'>

                        <div class=" col-md-6" 
                        :style="[steps < 14 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': '#F5F5DC'}]">
                            <div
                                :key="Math.min(...numbersArray.slice(6, 8))"
                                :id="Math.min(...numbersArray.slice(6, 8)) + '-step4'"
                                draggable="true" @dragstart="onDragging"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{ Math.min(...numbersArray.slice(6, 8)) }}</div>
                            </div>
                        </div>
                        
                        <div class=" col-md-6"
                        :style="[steps < 14 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'background-color': '#F5F5DC'}]">
                            <div
                                :key="Math.max(...numbersArray.slice(6, 8))"
                                draggable="true" @dragstart="onDragging"
                                :id="Math.max(...numbersArray.slice(6, 8)) + '-step4'"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{ Math.max(...numbersArray.slice(6, 8)) }}</div>
                            </div>
                        </div>
                    </div>

                    <!--
                    <div>
                      <img
                            :style="[   steps === 14 || steps === 15 || steps === 16 || steps === 17 ?   {'height': '150px', 'float': 'right', 'margin-right': '17%'} : 
                                        steps === 18 || steps === 19 || steps === 20 || steps === 21 ?   {'height': '150px', 'float': 'left', 'margin-left': '16%'} : 
                                        {'display' : 'none'}
                                ]   "
                            src="/storage/Images/drop.gif" alt="" />
                    </div>
                    -->
                    
                    <div class='col-md-12 d-flex justify-content-center align-items-center p-4' style="margin-left: -5%">
                        <div class='col-md-6 d-flex justify-content-center align-items-center p-4'>
                            <div class=" col-md-3" :id="leftSortedArray[0] + '-sortstep4'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 14 ? {'display': 'none'} : {'width': '100%', 'border-right': '2px solid white', 'height': '74px', 'background-color': 'lightgreen'}]"></div>

                            
                            <div class=" col-md-3" :id="leftSortedArray[1] + '-sortstep4'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 14 ? {'display': 'none'} :{'width': '100%', 'border-right': '2px solid white', 'height': '74px', 'background-color': 'lightgreen'}]"></div>

                            <div class=" col-md-3" :id="leftSortedArray[2] + '-sortstep4'" @drop="drop" @dragover="allowDrop"
                            :style="[steps < 14 ? {'display': 'none'} : {'width': '100%', 'height': '74px','border-right': '2px solid white',  'background-color': 'lightgreen'}]"></div>

                            
                            <div class=" col-md-3" :id="leftSortedArray[3] + '-sortstep4'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 14 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'background-color': 'lightgreen'}]"></div>
                        </div>

                        <div class='col-md-6 d-flex justify-content-center align-items-center p-4'>
                            <div class=" col-md-3" :id="rightSortedArray[0] + '-sortstep4'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 14 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': 'lightblue'}]"></div>
                            
                            <div class=" col-md-3" :id="rightSortedArray[1] + '-sortstep4'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 14 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': 'lightblue'}]"></div>

                            <div class=" col-md-3" :id="rightSortedArray[2] + '-sortstep4'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 14 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': 'lightblue'}]"></div>
                           
                            <div class=" col-md-3" :id="rightSortedArray[3] + '-sortstep4'" @drop="drop" @dragover="allowDrop" 
                            :style="[steps < 14 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': 'lightblue'}]"></div>
                        </div>
                    </div>

                    <!-- End Step Four Results -->


                     <!-- Start Step Four [SORT] -->
                    <h2 :style="[steps < 22 ? {'opacity': '0'} : {'margin': '10% 0 3% 0'}]" 
                    class="col-md-12 justify-content-center align-items-center" > Step Five 
                    <i style="font-size: 48px; color: #FF8C00" 
                    v-on:click="voice('Great. You get it. Now sort all elements into one main array. ')" :class="steps < 22 ? voiceIcon : ''"></i>
                    <br /> <h3>Sort sub-Arrays' elements and conquer into Main Sorted Array</h3>  </h2>

                    <div class='col-md-6 d-flex justify-content-center align-items-center p-4'>
                        <div class=" col-md-3"
                        :style="[steps < 22 ? {'display': 'none'} : {'width': '100%', 'border-right': '2px solid white', 'height': '74px', 'background-color': 'lightgreen'}]">
                            <div
                                :key="leftSortedArray[0]"
                                :id="leftSortedArray[0] + '-step5'"
                                draggable="true" @dragstart="onDragging"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{leftSortedArray[0]}}</div>
                            </div>
                        </div>

                        
                        <div class=" col-md-3" 
                        :style="[steps < 22 ? {'display': 'none'} :{'width': '100%', 'border-right': '2px solid white', 'height': '74px', 'background-color': 'lightgreen'}]">
                            <div
                                :key="leftSortedArray[1]"
                                :id="leftSortedArray[1] + '-step5'"
                                draggable="true" @dragstart="onDragging"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{leftSortedArray[1]}}</div>
                            </div>
                        </div>

                        <div class=" col-md-3"
                        :style="[steps < 22 ? {'display': 'none'} : {'width': '100%', 'height': '74px','border-right': '2px solid white',  'background-color': 'lightgreen'}]">
                            <div
                                :key="leftSortedArray[2]"
                                :id="leftSortedArray[2] + '-step5'"
                                draggable="true" @dragstart="onDragging"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{leftSortedArray[2]}}</div>
                            </div>
                        </div>

                        
                        <div class=" col-md-3"
                        :style="[steps < 22 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'background-color': 'lightgreen'}]">
                            <div
                                :key="leftSortedArray[3]"
                                :id="leftSortedArray[3] + '-step5'"
                                draggable="true" @dragstart="onDragging"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{leftSortedArray[3]}}</div>
                            </div>
                        </div>
                    </div>

                    <div class='col-md-6 d-flex justify-content-center align-items-center p-4'>
                        <div class=" col-md-3"
                        :style="[steps < 22 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': 'lightblue'}]">
                            <div
                                :key="rightSortedArray[0]"
                                :id="rightSortedArray[0] + '-step5'"
                                draggable="true" @dragstart="onDragging"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{rightSortedArray[0]}}</div>
                            </div>
                        </div>
                        
                        <div class=" col-md-3"
                        :style="[steps < 22 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': 'lightblue'}]">
                            <div
                                :key="rightSortedArray[1]"
                                :id="rightSortedArray[1] + '-step5'"
                                draggable="true" @dragstart="onDragging"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{rightSortedArray[1]}}</div>
                            </div>
                        </div>

                        <div class=" col-md-3" :id="rightSortedArray[2] + '-sortstep4'" 
                        :style="[steps < 22 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': 'lightblue'}]">

                            <div
                                :key="rightSortedArray[2]"
                                :id="rightSortedArray[2] + '-step5'"
                                draggable="true" @dragstart="onDragging"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{rightSortedArray[2]}}</div>
                            </div>

                        </div>
                        
                        <div class=" col-md-3" :id="rightSortedArray[3] + '-sortstep4'" 
                        :style="[steps < 22 ? {'display': 'none'} :{'width': '100%', 'height': '74px', 'border-right': '2px solid white', 'background-color': 'lightblue'}]">
                            <div
                                :key="rightSortedArray[3]"
                                :id="rightSortedArray[3] + '-step5'"
                                draggable="true" @dragstart="onDragging"
                                class="d-flex justify-content-center align-items-center p-4">
                                <div style="font-size: 30px; margin: 0 40px">{{rightSortedArray[3]}}</div>
                            </div>
                        </div>
                    </div>

                    <!--
                    <div>
                    
                       <img
                            :style="[ steps > 21 && steps < 30 ?   {'height': '150px', 'float': 'right', 'margin-right': '44%'} : {'display' : 'none'}]"
                            src="/storage/Images/drop.gif" alt="" />
                    </div>
                    -->
                    
                    <div class='col-md-12 d-flex justify-content-center align-items-center p-4' style="margin-left: -5%">
                        <div class='col-md-12' style="margin-left:25%">
                            <div v-for="i in sortedArray" @drop="drop" @dragover="allowDrop"
                                :style="[steps < 22 ? {'display': 'none'} :{'border': '1px solid gray',  'background-color': 'lightblue', 'height':'74px', 'margin' : '0 3px'}]"
                                :id="i + '-finalResult'"
                                :key="i" class="col-md-1">
                            </div>
                        </div>
                    </div>

                </div>



               
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "MergeSortComponent",
         data(){
            return {
                answer: '',
                steps: 0,
                status: 'false',
                numbersArray: [],
                sortedArray: [],
                rightSortedArray: [],
                leftSortedArray: [],
                voiceIcon: 'fa fa-play-circle',
               synth: window.speechSynthesis,
            }
        },

        methods: {
            getArray: function(start,end,step)
            {
                let array = _.range(start,end,step);
                let currentIndex = array.length, temporaryValue, randomIndex;

                while (0 !== currentIndex) {
                    randomIndex = Math.floor(Math.random() * currentIndex);
                    currentIndex -= 1;
                    temporaryValue = array[currentIndex];
                    array[currentIndex] = array[randomIndex];
                    array[randomIndex] = temporaryValue;
                }

                return array;
            },


            onDragging(event){
                event.dataTransfer.setData("text", event.target.id);
                console.log('EvEnT ==>', event);
            },


            allowDrop(event) {
                event.preventDefault();
            },


            drag(event) {
                event.dataTransfer.setData("text", event.target.id);
            },


            drop(event) {
                event.preventDefault();
                let data = event.dataTransfer.getData("text");
                console.log('data =>' + data + 'event => ' + event.target.id);
                if(event.target.id.split('-')[0] === data.split('-')[0]){
                    let newElementsArray = [...document.getElementById(data).innerText.replace(/\r?\n|\r/g, '')];
                    this.newEle(event.target, newElementsArray);
                    this.answer = 'Yes';
                    this.steps++;
                    this.status = 'true';

                    if(this.steps === 2 || this.steps === 6 || this.steps === 14 || this.steps === 22){
                        this.answer = 'Think';
                    }
                }
                else{
                    this.answer = 'No';
                }
            },


            newEle(parent, values){
                let elements = [];
                for(let i =0; i<values.length; i++){
                    let el = document.createElement('DIV');
                    el.innerHTML = `
                        <div  id=${i == 0 || i == 1 ? '-' + values[i] : '-' + values[i]} class="col-md-5 d-flex justify-content-center align-items-center p-4">
                            <div style="font-size: 30px; margin: 0 40px">${values[i]}</div>
                        </div>
                    `;

                    elements.push(el);
                }
                
                switch(values.length){
                    case 4 :
                        let leftRegion = document.createElement('DIV');
                        leftRegion.innerHTML = `
                            <div class="row"  style="margin: 15px;">
                                ${elements[0].innerHTML}
                                ${elements[1].innerHTML}
                            </div>
                        `;

                        parent.appendChild(leftRegion);


                        let rightRegion = document.createElement('DIV');
                        rightRegion.innerHTML = `
                            <div class="row"  style="margin: 15px;">
                                ${elements[2].innerHTML}
                                ${elements[3].innerHTML}
                            </div>
                        `;

                        parent.appendChild(rightRegion);
                    break;


                    case 2 :
                        let firstItem = document.createElement('DIV');
                        firstItem.innerHTML = `
                            <div class="col-md-4"  style="margin: 0 5%;">
                                ${elements[0].innerHTML}
                            </div>
                        `;
                        parent.appendChild(firstItem);


                        let sectItem = document.createElement('DIV');
                        sectItem.innerHTML = `
                            <div class="col-md-4"  style="margin: 0 5%;">
                                ${elements[1].innerHTML}
                            </div>
                        `;
                        parent.appendChild(sectItem);

                    break;

                    case 1:
                        let singleNum = document.createElement('DIV');
                        singleNum.innerHTML = `
                            <div style="margin-left: 15%">
                                ${elements[0].innerHTML}
                            </div>
                        `;
                        parent.appendChild(singleNum);
                    break;
                }
            },


            textToVoice: function(text){
                if (speechSynthesis !== undefined) {
                    let toSpeak = new SpeechSynthesisUtterance(text);
                    toSpeak.voice = this.synth.getVoices()[1];
                    this.synth.speak(toSpeak);
                }
            },


            voice: function(msg){
                this.voiceIcon = 'fa fa-volume-up';
                this.textToVoice(msg);
                setTimeout(() => {
                    this.voiceIcon = 'fa fa-play-circle';
                }, 4500);
            }

        },

        created() {
            this.numbersArray = this.getArray(0, 8, 1);
            this.sortedArray = [...this.numbersArray].sort(function(a,b){return a-b });
            this.leftSortedArray = [...this.numbersArray.slice(0, 4)].sort(function(a,b){return a-b });
            this.rightSortedArray = [...this.numbersArray.slice(4, 8)].sort(function(a,b){return a-b });
            this.answer = 'Think'; // Values ==> [Think, Yes, No].
        }
    }
</script>
