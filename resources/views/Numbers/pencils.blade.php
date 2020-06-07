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
    <h4 >Score :</h4>
    <h4>Time :</h4>
</div>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <pencil-in-box></pencil-in-box>
            
        </div>
    </div>
</div>
@endsection
