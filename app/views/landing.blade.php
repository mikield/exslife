<!DOCTYPE html>
<html lang="en">
	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="robots" content="index, follow"/>
		<meta name="description" content="Bootstrap Admin Theme for multi-purpose use."/>	
		<meta name="keywords" content="bootstrap themes, bootstrap, envato, bootstrap templates, neon template, neon theme, bootstrap admin, admin theme, best admin themes, best admin templates, top admin templates, best admin dashboards, bootstrap dashboard, laborator, themeforest bootstrap"/>

		<title>exSLife</title>

		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/main.css" />

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class="backs" style="height: 100%;background: #000;opacity: 0.8;position:absolute;width:100%;z-index:-1;"></div>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					
					<div class="description">
						<section style="font-size: 30px;font-weight: bolder;float:left;width:115px;margin-top:-7px">exSLife</section>
						<h1>{{ trans('indexPage.slide2Title')}}</h1>
						<p>
							{{ trans('indexPage.bottomText')}}
						</p>
					</div>
					<?php 
					switch (Session::get('lang')) {
						case 'ru':
							echo '<a href="/lang/ru" class="btn btn-success purchase">Русский</a>';
							echo '<a href="/lang/en" class="btn btn-default live-preview">English</a>';
							break;
						case 'en':
							echo '<a href="/lang/ru" style="margin-right:20px;" class="btn btn-default live-preview">Русский</a>';
							echo '<a href="/lang/en" class="btn btn-success purchase">English</a>';
							break;
						default:
							# code...
							break;
					}
					?>
						
						
					
					<div class="powered-by">
						<ul>
							<li>
								<a target="_blank" href="http://getbootstrap.com" title="Bootstrap" class="logo-1"></a>
							</li>
							<li>
								<a target="_blank" href="http://jquery.com/" title="jQuery" class="logo-3"></a>
							</li>
							
							<li class="right">
								<a title="Laravel Framework" target="_blank" href="http://laravel.com/" class="logo-4"></a>
							</li>
						</ul>
					</div>		
					</div>
				</div>
			</div>
		</header>
		
		<div class="features">
			<div class="container">
				<div class="features-title">
					<div class="row">
						<div class="col-lg-12">

							<div data-scroll-reveal="enter left and move 50px over 1.33s">
								<h1>{{ trans('indexPage.why') }}</h1>
								<h4>{{ trans('indexPage.whySub') }}</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6" data-scroll-reveal="enter from the left over 1s">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<a href="#" class="icon dashboard"></a>
							</div>
					
							<div class="col-lg-9 col-md-9">
								<div class="content">
									<h1>{{ trans('indexPage.land1Title') }}</h1>
									<p>{{ trans('indexPage.land1Text') }}</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-6" data-scroll-reveal="enter from the right over 1s">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<a href="#" class="icon frontend"></a>
							</div>
					
							<div class="col-lg-9 col-md-9">
								<div class="content">
									<h1>{{ trans('indexPage.land2Title') }}</h1>
									<p>{{ trans('indexPage.land2Text') }}</p>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-lg-6 col-md-6" data-scroll-reveal="enter from the left over 1s">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<a href="#" class="icon responsive"></a>
							</div>
					
							<div class="col-lg-9 col-md-9">
								<div class="content">
									<h1>{{ trans('indexPage.land3Title') }}</h1>
									<p>{{ trans('indexPage.land3Text') }}</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-6" data-scroll-reveal="enter from the right over 1s">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<a href="#" class="icon ui"></a>
							</div>
					
							<div class="col-lg-9 col-md-9">
								<div class="content">
									<h1>{{ trans('indexPage.land4Title') }}</h1>
									<p>{{ trans('indexPage.land4Text') }}</p>
								</div>
							</div>
						</div>
					</div>

				</div>
				
				<div class="features-title not-en" data-scroll-reveal="enter from the left over 1s">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="not-enough">{{ trans('indexPage.notEnough') }}</h1>
						</div>
					</div>
				</div>
				<div class="row">
					
					<div class="col-lg-6 col-md-6" data-scroll-reveal="enter from the right over 1s">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<a href="#" class="icon charts"></a>
							</div>
					
							<div class="col-lg-9 col-md-9">
								<div class="content">
									<h1>{{ trans('indexPage.land5Title') }}</h1>
									<p>{{ trans('indexPage.land5Text') }}</p>
								</div>
							</div>
						</div>
					</div>
				
					<div class="col-lg-6 col-md-6" data-scroll-reveal="enter from the left over 1s">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<a href="#" class="icon calendar"></a>
							</div>
					
							<div class="col-lg-9 col-md-9">
								<div class="content">
									<h1>{{ trans('indexPage.land6Title') }}</h1>
									<p>{{ trans('indexPage.land6Text') }}</p>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-lg-6 col-md-6" data-scroll-reveal="enter from the left over 1s">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<a href="#" class="icon invoice"></a>
							</div>
					
							<div class="col-lg-9 col-md-9">
								<div class="content">
									<h1>{{ trans('indexPage.land7Title') }}</h1>
									<p>{{ trans('indexPage.land7Text') }}</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-6" data-scroll-reveal="enter from the left over 1s">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<a href="#" class="icon maps"></a>
							</div>
					
							<div class="col-lg-9 col-md-9">
								<div class="content">
									<h1>{{ trans('indexPage.land8Title') }}</h1>
									<p>{{ trans('indexPage.land8Text') }}</p>
								</div>
							</div>
						</div>
					</div>


				</div>
				<div class="row">

					<div class="col-lg-6 col-md-6" data-scroll-reveal="enter from the right over 1s">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<a href="#" class="icon profile"></a>
							</div>
					
							<div class="col-lg-9 col-md-9">
								<div class="content">
									<h1>{{ trans('indexPage.land9Title') }}</h1>
									<p>{{ trans('indexPage.land9Text') }}</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-6" data-scroll-reveal="enter from the right over 1s">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<a href="#" class="icon support"></a>
							</div>
					
							<div class="col-lg-9 col-md-9">
								<div class="content">
									<h1>{{ trans('indexPage.land10Title') }}</h1>
									<p>{{ trans('indexPage.land10Text') }}</p>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
		<div class="testimonials">
			<div class="container">
				<div class="row">
					<div class="col-lg-12" data-scroll-reveal="enter top over 0.6s">
						<h1>
							{{ trans('indexPage.ps0') }}
						</h1>
						<ul id="clients-testimonials" class="owl-carousel">
							<li>
								{{ trans('indexPage.ps1') }}
							</li>

							<li>
								{{ trans('indexPage.ps2') }}
							</li>

							<li>
								{{ trans('indexPage.ps3') }}
							</li>

							<li>
								{{ trans('indexPage.ps4') }}
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<footer>


		<div class="footer-info">

			<div class="container">
					<div class="row">
						<div class="col-lg-1" data-scroll-reveal="enter from the bottom">
							<a class="laborator" href="http://vk.com/codemax_tm" target="_blank">CodeMax Labaratory</a>							
						</div>
						<div class="col-lg-8" data-scroll-reveal="enter from the bottom">
							<div class="copyright">
							exSLife
							<br />
							<span>Copyright &copy; 2014. CodeMax - creative labaratory</span>
						</div>
						</div>
						<div class="col-lg-3">
							<a href="http://vk.com/mr.mikield" target="_blank" class="purchase-footer" data-scroll-reveal="enter from the bottom">{{ trans('indexPage.contacts')}}</a>
						</div>
					</div>
			</div>
		</div>
	</footer>


	<script src="js/scrollReveal.js"></script>
	
	<script>
	
		$(document).ready(function() {
			
			window.scrollReveal = new scrollReveal();
			
			var img = new Image();
			img.src = 'images/thankyou.png';
			
			$("#clients-testimonials").owlCarousel({
				autoPlay: 7000,
				lazyEffect: "fade",
				singleItem:true				
			});
		});
	
	</script>
	
	<link type="text/css" rel="stylesheet" href="js/owl-carousel/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="js/owl-carousel/owl.theme.css" />
	<script src="js/owl-carousel/owl.carousel.js"></script>

	</body>


</html>
