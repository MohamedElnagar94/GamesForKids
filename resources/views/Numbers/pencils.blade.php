@extends('layouts.app')
<link src="./fonts/MISTV___.TTF" />
 <link href="css/pencil.css" rel="stylesheet" />
 @section('className',"sub-banner")


@section('slider')

@endsection
<style>

</style>
@section('website')
<!-- <div id="gameTitle">
            <h2 >
            Match Numbers
            </h2>
 </div> -->
 <div id="gameControlls">
            <h1 ></h1>
            <h4 >Score :</h4><span id="scoreText" ></span>
            <h4 >Time : </h4><span id="timerPencil"> </span><h3>seconds</h>
        </div>

<div class="container" id="gameContainer" >

    <div class="row justify-content-center">
        <div class="col-md-10">
            <pencil-in-box></pencil-in-box>
            
        </div>
    </div>
</div>
<script type="text/javascript">

 seconds=0;

setInterval(function () {
    document.getElementById('timerPencil').innerText=seconds;
            seconds++;
            }, 1000);
 
</script>
@endsection
