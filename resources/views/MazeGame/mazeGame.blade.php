@extends('layouts.app')
@section('className',"sub-banner")
@section('slider')

@endsection

@section('website')
<div class="trend-w3layouts">
	<div class="container">
		{{-- <h2>Maze Game</h2> --}}
		<maze-game-component></maze-game-component>
	</div>
</div>
@endsection
