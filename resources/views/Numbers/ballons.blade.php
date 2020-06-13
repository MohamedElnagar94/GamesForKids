@extends('layouts.app')
<link src="./fonts/MISTV___.TTF" />
<link href="css/ballon3.css" rel="stylesheet" />
     @section('className',"sub-banner")


@section('slider')

@endsection
<style>

</style>
@section('website')

 <!-- <div class="row">
        <h2 >
           ballon
        </h2>
    </div>
 -->

<div class="container" style="height:50em;">
     <h1 v-text="answerNum"></h1>

      <ballons ></ballons>

</div>
<script type="text/javascript">

seconds=0;
setInterval(function () {
    document.getElementById('timerPencil').innerText=seconds;
            seconds++;
            }, 1000);
 
</script>
@endsection
