@extends('layouts.app')
@section('className',"header")
@section('slider')
<!-- Slider -->
<div class="slider position-relative">
    <ul class="rslides" id="slider">
        <li>
            <img src="images/slider1.png" alt="" />
        </li>
        <li>
            <img src="images/slider2.png" alt="" />
        </li>
        <li>
            <img src="images/slider3.png" alt="" />
        </li>
    </ul>
    <a href="/levels" class="glow-on-hover" type="button">START THE GAME</a>
</div>
<!-- //Slider -->
@endsection

@section('website')
<!-- trend -->
<div class="trend-w3layouts">
	<div class="container">
		<h2>Trending Games</h2>
		<ul id="flexiselDemo1">
				<li>
					<div class="trend-grid">
						<h4>Math Games</h4>
						<img src="images/math1.jpg" alt=" " class="img-responsive" />
					</div>
				</li>
				<li>
					<div class="trend-grid">
						<h4>Number Games</h4>
						<img src="images/numbergame.jpg" alt=" " class="img-responsive" />
					</div>
				</li>
				<li>
					<div class="trend-grid">
						<h4>Sort Game</h4>
						<img src="images/order.png" alt=" " class="img-responsive" />
					</div>
				</li>
				<li>
					<div class="trend-grid">
						<h4>Bubble Sort Game</h4>
						<img src="images/bubblesort.png" alt=" " class="img-responsive" />
					</div>
                </li>
                <li>
					<div class="trend-grid">
						<h4>Merge Sort Game</h4>
						<img src="images/merg2.jpg" alt=" " class="img-responsive" />
					</div>
				</li>
				<li>
					<div class="trend-grid">
						<h4>Memory Game</h4>
						<img src="images/card4-3.png" alt=" " class="img-responsive" />
					</div>
				</li>
                <li>
					<div class="trend-grid">
						<h4>Pencil In Box</h4>
						<img src="images/pencilInBox.png" alt=" " class="img-responsive" />
					</div>
				</li>
				<li>
					<div class="trend-grid">
						<h4>Ballons Game</h4>
						<img src="images/ballons.png" alt=" " class="img-responsive" />
					</div>
                </li>
                <li>
					<div class="trend-grid">
						<h4>Compare Numbers</h4>
						<img src="images/compare.jpg" alt=" " class="img-responsive" />
					</div>
				</li>
				<li>
					<div class="trend-grid">
						<h4>Insertion Sort</h4>
						<img src="images/insertionsort.png" alt=" " class="img-responsive" />
					</div>
                </li>
                <li>
					<div class="trend-grid">
						<h4>Count Numbers</h4>
						<img src="images/count.jpg" alt=" " class="img-responsive" />
					</div>
				</li>
				
				
                <li>
					<div class="trend-grid">
						<h4>Memory Game</h4>
						<img src="images/card4-4.png" alt=" " class="img-responsive" />
					</div>
				</li>
			</ul>

	</div>
</div>
<!-- //trend -->
@endsection
@push('script')
<script type="text/javascript">
    var jq142 = jQuery.noConflict();
    jq142(document).ready(function () {
        jq142("#flexiselDemo1").flexisel({
                visibleItems: 4,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint:480,
                        visibleItems: 2
                    },
                    landscape: {
                        changePoint:640,
                        visibleItems:3
                    },
                    tablet: {
                        changePoint:768,
                        visibleItems: 4
                    }
                }
            });

        });
</script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
@endpush
