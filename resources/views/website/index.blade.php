@extends('layouts.app')
@section('className',"header")
@section('slider')
<!-- Slider -->
<div class="slider position-relative">
    <ul class="rslides" id="slider">
        <li>
            <img src="images/banner1.jpg" alt="" />
        </li>
        <li>
            <img src="images/banner2.jpg" alt="" />
        </li>
        <li>
            <img src="images/banner3.jpg" alt="" />
        </li>
    </ul>
    <a href="/numbers" class="glow-on-hover" type="button">START THE GAME</a>
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
						<h4>Racing Games</h4>
						<img src="images/tg1.jpg" alt=" " class="img-responsive" />
					</div>
				</li>
				<li>
					<div class="trend-grid">
						<h4>3D Games</h4>
						<img src="images/tg2.jpg" alt=" " class="img-responsive" />
					</div>
				</li>
				<li>
					<div class="trend-grid">
						<h4>Action Games</h4>
						<img src="images/tg3.jpg" alt=" " class="img-responsive" />
					</div>
				</li>
				<li>
					<div class="trend-grid">
						<h4>Toy Games</h4>
						<img src="images/tg4.jpg" alt=" " class="img-responsive" />
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
