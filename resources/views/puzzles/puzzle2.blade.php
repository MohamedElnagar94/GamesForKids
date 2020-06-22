@extends('layouts.app')
<link src="./fonts/MISTV___.TTF" />
<link href="css/ballon3.css" rel="stylesheet" />
<link href="css/puzzle.css" rel="stylesheet" />

     @section('className',"sub-banner")


@section('slider')

@endsection
<style>
.answer {
    width:100%;
}
.answer span{
    border:1px solid black;
     display:inline-block;
     width:25%;
     height:107px;
     margin-top:.1em;
}

 #finalImage{
    width:30%;
    margin:4em 30% 2em ;
}
</style>
@section('website')

<div class="container" id="puzzle2"style="height:50em;">
     

      <puzzle2></puzzle2>
     

</div>


@endsection
