@extends('welcomePage.layouts.app')
@section('title', 'Welcome')

@section('body')


<!--
Home Slider
==================================== -->

<section id="slider">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

		<!-- Indicators bullet -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		</ol>
		<!-- End Indicators bullet -->				

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">

			<!-- single slide -->
			<div class="item active" style="background-image: url({{ @asset('rawThemes/brandi/img/banner1.jpg') }});">
				<div class="carousel-caption">
					<h2 data-wow-duration="700ms" data-wow-delay="500ms" class="wow bounceInDown animated">High<span>Winds</span></h2>
					<h3 data-wow-duration="1000ms" class="wow slideInLeft animated"><span class="color">/monitoring</span> Wind-turbine data from Highways.</h3>
					<p data-wow-duration="1000ms" class="wow slideInRight animated">Wind-Turbines on high-ways</p>

					<ul class="social-links text-center">
						<li><a href=""><i class="fa fa-twitter fa-lg"></i></a></li>
						<li><a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
						<li><a href=""><i class="fa fa-google-plus fa-lg"></i></a></li>
						<li><a href=""><i class="fa fa-dribbble fa-lg"></i></a></li>
					</ul>
				</div>
			</div>
			<!-- end single slide -->

			<!-- single slide -->
			<div class="item" style="background-image: url({{ @asset('rawThemes/brandi/img/banner2.jpg')}});">
				<div class="carousel-caption">
					<h2 data-wow-duration="500ms" data-wow-delay="500ms" class="wow bounceInDown animated">Monitoring<span> LIVE</span>!</h2>
					<h3 data-wow-duration="500ms" class="wow slideInLeft animated"><span class="color">/Live</span> 24/7 monitoring.</h3>
					<p data-wow-duration="500ms" class="wow slideInRight animated">We use Internet of Things</p>

					<ul class="social-links text-center">
						<li><a href=""><i class="fa fa-twitter fa-lg"></i></a></li>
						<li><a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
						<li><a href=""><i class="fa fa-google-plus fa-lg"></i></a></li>
						<li><a href=""><i class="fa fa-dribbble fa-lg"></i></a></li>
					</ul>
				</div>
			</div>
			<!-- end single slide -->

		</div>
		<!-- End Wrapper for slides -->

	</div>
</section>

<!--
End Home SliderEnd
==================================== -->

<!--
Features
==================================== -->

<section id="features" class="features">
	<div class="container">
		<div class="row">

			<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
				<h2>Log in</h2>
				<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
			</div>

			<!-- service item -->
			<div class="col-md-6 wow fadeInLeft" data-wow-duration="500ms">
				<div class="service-item">
					<div class="service-icon">
						<i class="fa fa-building fa-2x text-success"></i>
					</div>

					<div class="service-desc">
						<h3><span class="text-success">Commercial</span></h3>
						<p>Log in to a Commercial Profile meant for the Wind-turbines owners on the Stretch of highways.</p>
						<br>
						<a href="/login" class="btn btn-lg btn-success">
							@guest
								Commercial<strong> Log In</strong>
							@else
								<strong>Your Dashboard</strong>
							@endguest
						</a>
					</div>
				</div>
			</div>
			<!-- end service item -->
			
			<!-- service item -->
			<div class="col-md-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms">
				<div class="service-item">
					<div class="service-icon">
						<i class="fa fa-user fa-2x text-muted"></i>
					</div>

					<div class="service-desc">
						<h3><span class="text-muted">Casual</span></h3>
						<p>Explore through the casual services as a researcher for surveys and scholarly works. Of Course, we take permissions from the owners first!</p>
						<br>
						<a href="/user" class="btn btn-lg btn-default">Casual Use</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--
End Features
==================================== -->



<!--
Our Works
==================================== -->

<section id="works" class="works clearfix">
	<div class="container">
		<div class="row">

			<div class="sec-title text-center">
				<h2>Works</h2>
				<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
			</div>

			<div class="sec-sub-title text-center">
				<p>We Provide numerous services that will help your wind-turbines to function properly by keeping a track of their performance on a timely basis.</p>
			</div>

			<div class="work-filter wow fadeInRight animated" data-wow-duration="500ms">
				<ul class="text-center">
					<li><a href="javascript:;" data-filter="all" class="active filter">All</a></li>
					<li><a href="javascript:;" data-filter=".branding" class="filter">Authentication</a></li>
					<li><a href="javascript:;" data-filter=".web" class="filter">Wind-Turbine Management</a></li>
					<li><a href="javascript:;" data-filter=".logo-design" class="filter">Detailed Reports</a></li>
					<li><a href="javascript:;" data-filter=".photography" class="filter">Analytical Predictions</a></li>
				</ul>
			</div>

		</div>
	</div>

	<div class="project-wrapper">

		<figure class="mix work-item branding">
			<img src="{{ @asset('rawThemes/brandi/img/works/item-1.jpg')}}" alt="">
			<figcaption class="overlay">
				<a class="fancybox" rel="works" title="Write Your Image Caption Here" href="{{ @asset('rawThemes/brandi/img/works/item-1.jpg')}}"><i class="fa fa-eye fa-lg"></i></a>
				<h4>Company User Authentication</h4>
				<p>Authentication</p>
			</figcaption>
		</figure>

		<figure class="mix work-item web">
			<img src="{{ @asset('rawThemes/brandi/img/works/item-2.jpg')}}" alt="">
			<figcaption class="overlay">
				<a class="fancybox" rel="works" title="Write Your Image Caption Here" href="{{ @asset('rawThemes/brandi/img/works/item-2.jpg')}}"><i class="fa fa-eye fa-lg"></i></a>
				<h4>Add and View Wind-Turbines</h4>
				<p>Wind-Turbine Management</p>
			</figcaption>
		</figure>

		<figure class="mix work-item logo-design">
			<img src="{{ @asset('rawThemes/brandi/img/works/item-3.jpg')}}" alt="">
			<figcaption class="overlay">
				<a class="fancybox" rel="works" title="Write Your Image Caption Here" href="{{ @asset('rawThemes/brandi/img/works/item-3.jpg')}}"><i class="fa fa-eye fa-lg"></i></a>
				<h4>Detailed reports of the Wind-turbine Logs</h4>
				<p>Detailed Reports</p>
			</figcaption>
		</figure>

		<figure class="mix work-item photography">
			<img src="{{ @asset('rawThemes/brandi/img/works/item-4.jpg')}}" alt="">
			<figcaption class="overlay">
				<a class="fancybox" rel="works" title="Write Your Image Caption Here" href="{{ @asset('rawThemes/brandi/img/works/item-4.jpg')}}"><i class="fa fa-eye fa-lg"></i></a>
				<h4>Power-generation prediction for Wind-turbine</h4>
				<p>Analytical Predictions</p>
			</figcaption>
		</figure>

		<figure class="mix work-item branding">
			<img src="{{ @asset('rawThemes/brandi/img/works/item-5.jpg')}}" alt="">
			<figcaption class="overlay">
				<a class="fancybox" rel="works" title="Write Your Image Caption Here" href="{{ @asset('rawThemes/brandi/img/works/item-5.jpg')}}"><i class="fa fa-eye fa-lg"></i></a>
				<h4>Company User Account Registration</h4>
				<p>Authentication</p>
			</figcaption>
		</figure>

		<figure class="mix work-item web">
			<img src="{{ @asset('rawThemes/brandi/img/works/item-6.jpg')}}" alt="">
			<figcaption class="overlay">
				<a class="fancybox" rel="works" title="Write Your Image Caption Here" href="{{ @asset('rawThemes/brandi/img/works/item-6.jpg')}}"><i class="fa fa-eye fa-lg"></i></a>
				<h4>Update and Delete Wind-Turbine if needed</h4>
				<p>Wind-Turbine Management</p>
			</figcaption>
		</figure>

		<figure class="mix work-item logo-design">
			<img src="{{ @asset('rawThemes/brandi/img/works/item-7.jpg')}}" alt="">
			<figcaption class="overlay">
				<a class="fancybox" rel="works" title="Write Your Image Caption Here" href="{{ @asset('rawThemes/brandi/img/works/item-7.jpg')}}"><i class="fa fa-eye fa-lg"></i></a>
				<h4>Detailed reports of the Locations</h4>
				<p>Detailed Reports</p>
			</figcaption>
		</figure>

		<figure class="mix work-item photography">
			<img src="{{ @asset('rawThemes/brandi/img/works/item-8.jpg')}}" alt="">
			<figcaption class="overlay">
				<a class="fancybox" rel="works" title="Write Your Image Caption Here" href="{{ @asset('rawThemes/brandi/img/works/item-8.jpg')}}"><i class="fa fa-eye fa-lg"></i></a>
				<h4>Power-generation prediction for Area</h4>
				<p>Analytical Predictions</p>
			</figcaption>
		</figure>

	</div>


</section>

<!--
End Our Works
==================================== -->

<!--
Meet Our Team
==================================== -->		

<section id="team" class="team">
	<div class="container">
		<div class="row">

			<div class="sec-title text-center wow fadeInUp animated" data-wow-duration="700ms">
				<h2>Meet Our Team</h2>
				<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
			</div>

			<div class="sec-sub-title text-center wow fadeInRight animated" data-wow-duration="500ms">
				<p>We have an efficient team of smart-working people who are innovative in their ideas.</p>
			</div>
			
			<!-- single member -->
			<figure class="team-member col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
				<div class="member-thumb">
					<img src="{{ @asset('rawThemes/brandi/img/team/member-1.png')}}" alt="Team Member" class="img-responsive">
					<figcaption class="overlay">
						<h5>Pratiksha Sisodia <small> - MD</small></h5>
						<p>pratiksha.sisodia @mca.christuniversity.in</p>
						<ul class="social-links text-center">
							<li><a href=""><i class="fa fa-twitter fa-lg"></i></a></li>
							<li><a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
							<li><a href=""><i class="fa fa-google-plus fa-lg"></i></a></li>
						</ul>
					</figcaption>
				</div>
				<h4>Pratiksha Sisodia</h4>
				<span>Managing Director</span>
			</figure>
			<!-- end single member -->

			<!-- single member -->
			<figure class="team-member col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
				<div class="member-thumb">
					<img src="{{ @asset('rawThemes/brandi/img/team/member-2.png')}}" alt="Team Member" class="img-responsive">
					<figcaption class="overlay">
						<h5>Vikramsinh Dantkale <small> - Lead Dev</small></h5>
						<p>vikramsinh.dantkale @mca.christuniversity.in</p>
						<ul class="social-links text-center">
							<li><a href=""><i class="fa fa-twitter fa-lg"></i></a></li>
							<li><a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
							<li><a href=""><i class="fa fa-google-plus fa-lg"></i></a></li>
						</ul>
					</figcaption>
				</div>
				<h4>Vikramsinh Dantkale</h4>
				<span>Lead Developer</span>
			</figure>
			<!-- end single member -->

			<!-- single member -->
			<figure class="team-member col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
				<div class="member-thumb">
					<img src="{{ @asset('rawThemes/brandi/img/team/member-3.png')}}" alt="Team Member" class="img-responsive">
					<figcaption class="overlay">
						<h5>Jishnu Raj <small> - UI Design</small></h5>
						<p>jishnu.raj @mca.christuniversity.in</p>
						<ul class="social-links text-center">
							<li><a href=""><i class="fa fa-twitter fa-lg"></i></a></li>
							<li><a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
							<li><a href=""><i class="fa fa-google-plus fa-lg"></i></a></li>
						</ul>
					</figcaption>
				</div>
				<h4>Jishnu Raj</h4>
				<span>Sr. UI Designer</span>
			</figure>
			<!-- end single member -->

			<!-- single member -->
			<figure class="team-member col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
				<div class="member-thumb">
					<img src="{{ @asset('rawThemes/brandi/img/team/member-1.png')}}" alt="Team Member" class="img-responsive">
					<figcaption class="overlay">
						<h5>Prof. Kavita R <small> - Project Guide</small></h5>
						<p>kavita.r @christuniversity.in</p>
						<ul class="social-links text-center">
							<li><a href=""><i class="fa fa-twitter fa-lg"></i></a></li>
							<li><a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
							<li><a href=""><i class="fa fa-google-plus fa-lg"></i></a></li>
						</ul>
					</figcaption>
				</div>
				<h4>Prof. Kavita R</h4>
				<span>Project Guide</span>
			</figure>
			<!-- end single member -->

		</div>
	</div>
</section>

<!--
End Meet Our Team
==================================== -->

<!--
Some fun facts
==================================== -->		

<section id="facts" class="facts">
	<div class="parallax-overlay">
		<div class="container">
			<div class="row number-counters">

				<div class="sec-title text-center mb50 wow rubberBand animated" data-wow-duration="1000ms">
					<h2>Some Fun Facts</h2>
					<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
				</div>

				<!-- first count item -->
				<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
					<div class="counters-item">
						<i class="fa fa-clock-o fa-3x"></i>
						<strong data-to="3200">0</strong>
						<!-- Set Your Number here. i,e. data-to="56" -->
						<p>Hours of Work</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
					<div class="counters-item">
						<i class="fa fa-users fa-3x"></i>
						<strong data-to="120">0</strong>
						<!-- Set Your Number here. i,e. data-to="56" -->
						<p>Satisfied Clients</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
					<div class="counters-item">
						<i class="fa fa-rocket fa-3x"></i>
						<strong data-to="360">0</strong>
						<!-- Set Your Number here. i,e. data-to="56" -->
						<p>Wind-Turbines</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
					<div class="counters-item">
						<i class="fa fa-trophy fa-3x"></i>
						<strong data-to="6454">0</strong>
						<!-- Set Your Number here. i,e. data-to="56" -->
						<p>Log Records</p>
					</div>
				</div>
				<!-- end first count item -->

			</div>
		</div>
	</div>
</section>

<!--
End Some fun facts
==================================== -->


<!--
Contact Us
==================================== -->		

<section id="contact" class="contact">
	<div class="container">
		<div class="row mb50">

			<div class="sec-title text-center mb50 wow fadeInDown animated" data-wow-duration="500ms">
				<h2>Let’s Discuss</h2>
				<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
			</div>

			<div class="sec-sub-title text-center wow rubberBand animated" data-wow-duration="1000ms">
				<p>You can get in touch with us by sending a message to us.</p>
			</div>

			<!-- contact address -->
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 wow fadeInLeft animated" data-wow-duration="500ms">
				<div class="contact-address">
					<h3>Or Write to us on this address.</h3>
					<p>CHRIST (Deemed to be University),</p>
					<p>Hosur Main Road,</p>
					<p>Koramanagala,</p>
					<p>Bengaluru - 560029</p>
					<p>(+91) 080 2456123</p>
				</div>
			</div>
			<!-- end contact address -->

			<!-- contact form -->
			<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="300ms">
				<div class="contact-form">
					<h3>Say hello!</h3>
					<form action="#" id="contact-form">
						<div class="input-group name-email">
							<div class="input-field">
								<input type="text" name="name" id="name" placeholder="Name" class="form-control">
							</div>
							<div class="input-field">
								<input type="email" name="email" id="email" placeholder="Email" class="form-control">
							</div>
						</div>
						<div class="input-group">
							<textarea name="message" id="message" placeholder="Message" class="form-control"></textarea>
						</div>
						<div class="input-group">
							<input type="submit" id="form-submit" class="pull-right" value="Send message">
						</div>
					</form>
				</div>
			</div>
			<!-- end contact form -->

			<!-- footer social links -->
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 wow fadeInRight animated" data-wow-duration="500ms" data-wow-delay="600ms">
				<ul class="footer-social">
					<li><a href="https://www.behance.net/Themefisher"><i class="fa fa-behance fa-2x"></i></a></li>
					<li><a href="https://www.twitter.com/Themefisher"><i class="fa fa-twitter fa-2x"></i></a></li>
					<li><a href="https://dribbble.com/themefisher"><i class="fa fa-dribbble fa-2x"></i></a></li>
					<li><a href="https://www.facebook.com/Themefisher"><i class="fa fa-facebook fa-2x"></i></a></li>
				</ul>
			</div>
			<!-- end footer social links -->

		</div>
	</div>

	<!-- Google map -->
	<div id="map_canvas" class="wow bounceInDown animated" data-wow-duration="500ms"></div>
	<!-- End Google map -->

</section>

<!--
End Contact Us
==================================== -->


<footer id="footer" class="footer">
	<div class="container">
		<div class="row">

			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms">
				<div class="footer-single">
					{{-- <img src="{{ @asset('rawThemes/brandi/img/footer-logo.png')}}" alt=""> --}}
					<h2 id="logo" style="padding-top: 10px;">
					    High<strong>Winds</strong>
					    {{-- <img height="27px" src="{{ @asset('rawThemes/brandi/img/logo.png')}}" alt="Brandi"> --}}
					</h2>
					<p>is a monitoring platform that built on IoT that is used for monitoring the electrical power generated by Wind-Turbine on the Highways, with climatic monitoring as well. We also provide predictive analysis based on Machine Learning for our users.</p>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
				<div class="footer-single">
					<h6>Subscribe </h6>
					<form action="#" class="subscribe">
						<input type="text" name="subscribe" id="subscribe">
						<input type="submit" value="&#8594;" id="subs">
					</form>
					<p>Get regular notifications from our services. </p>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
				<div class="footer-single">
					<h6>Explore</h6>
					<ul>
						<li><a href="#">Inside Us</a></li>
						<li><a href="#">Flickr</a></li>
						<li><a href="#">Google</a></li>
						<li><a href="#">Forum</a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
				<div class="footer-single">
					<h6>Support</h6>
					<ul>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Market Blog</a></li>
						<li><a href="#">Help Center</a></li>
						<li><a href="#">Pressroom</a></li>
					</ul>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="copyright text-center">
					Copyright © 2018 <a href="{{ @url('http://highwinds.herokuapp.com') }}">HighWinds</a>. All rights reserved. Designed & developed by <a href="{{ @url('http://highwinds.herokuapp.com/#team') }}">HighWinds</a>
				</p>
			</div>
		</div>
	</div>
</footer>



@endsection