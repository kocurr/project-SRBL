<!DOCTYPE html>
<html lang="pl" dir="ltr">
	<head>
		<meta charset="utf-8">
		 <!-- Bootstrap CSS -->
		 <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		 <style>
		 	#wyszukiwarka {
				 padding: 5%;
			}
			html {
    		scroll-behavior: smooth;
			  }
			h2 {
				text-transform: uppercase;
				font-size: 160px;
				font-weight: 900;
				text-align: center;
				background-image: url('/projektsrbl/img/lo.jpg');
				background-size: 100% 100%;
				color: transparent;
				-webkit-background-clip: text;
			}
		 </style>
		<title>HOME</title>
	</head>
	<body style="font-family: 'Montserrat';font-size: 20px;">
		@if(isset($this->session->user_id))
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
				<ul class="navbar-nav">
					<li class="nav-item active"><a class="nav-link" href="#">SRBL</a></li>
					<li class="nav-item"><a class="nav-link" href="{{base_url()}}main">Strona główna</a></li>
					<li class="nav-item"><a class="nav-link" href="{{base_url()}}loty">Loty</a></li>
					<li class="nav-item"><a class="nav-link" href="#kontakt">Kontakt</a></li>
					<li class="nav-item"><a class="nav-link" href="{{base_url()}}profile">Profil</a></li>
					<li class="nav-item"><a class="nav-link" href="{{base_url()}}logout">Wyloguj się!</a></li>
				</ul>
			</nav>
		@else
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
				<ul class="navbar-nav">
					<li class="nav-item active"><a class="nav-link" href="#">SRBL</a></li>
					<li class="nav-item"><a class="nav-link" href="{{base_url()}}main">Strona główna</a></li>
					<li class="nav-item"><a class="nav-link" href="{{base_url()}}loty">Loty</a></li>
					<li class="nav-item"><a class="nav-link" href="#kontakt">Kontakt</a></li>
					<li class="nav-item"><a class="nav-link" href="{{base_url()}}user">Zaloguj się!</a></li>
				</ul>
			</nav>
		@endif
				<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
						<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
						<img src="/projektsrbl/img/city-street-1246870_1920 (1).jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h1><b>Potrzebujesz oderwania od codzienności?</b></h1>
							<p>Już tej zimy poleć z nami w najciekawsze zakątki Azji południowej!</p>
						</div>
						</div>
						<div class="carousel-item">
						<img src="/projektsrbl/img/sunrise-1014712_1920.jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h1><b>Uciec od zgiełku?</b></h1>
							<p>Filipiny w okresie zimowym to idealne miejsce do odpoczynku!</p>
						</div>
						</div>
						<div class="carousel-item">
						<img src="/projektsrbl/img/suspension-bridge-1149942_1920.jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h1><b>USA – Podróż marzeń czy po marzenia?</b></h1>
							<p>Już nie potrzebujesz wizy by spełnic swój sen o Stanach Zjednoczonych!</p>
						</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>

			  	<div class="bg-dark text-white container-fluid"><br><h2>Dokąd <br>lecimy?</h2>
					<div class="row" id="wyszukiwarka">
						<div class="col-2"></div>
						<form action="{{base_url()}}search" method="post">
							<center><label for="departure_city">Lotnisko wylotu:&nbsp&nbsp</label>
							<input name="departure_city" type="text" placeholder="Wpisz miasto"></input>&nbsp&nbsp&nbsp&nbsp
							<label for="arrival_city">Lotnisko docelowe:&nbsp&nbsp</label>
							<input name="arrival_city" type="text" placeholder="Wpisz miasto"></input>&nbsp&nbsp&nbsp&nbsp&nbsp
							<button type="submit" align="center" class="submit btn btn-outline-primary ">Szukaj</button></center>
						</form>
						<div class="col-2"></div>
					</div>
				</div>

				<!-- Footer -->
					<footer id="kontakt" class="page-footer font-small mdb-color lighten-3 pt-4" style="font-size: 15px; background: rgb(41,43,44);
background: linear-gradient(0deg, rgba(41,43,44,0) 63%, rgba(52,58,64,1) 100%);">
					<!-- Footer Links -->
					<div class="container text-center text-md-left">
					<!-- Grid row -->
					<div class="row">
						<!-- Grid column -->
						<div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">
						<!-- Content -->
						<h5 class="font-weight-bold text-uppercase mb-4">SRBL Project</h5>
						<p>Aplikacja służąca wyszukiwaniu, rezerwacji oraz kupna biletów lotniczych.</p>
						<p>W naszej bazie rejsów lotniczych każdy znajdzie coś dla siebie. Aplikacja w fazie rozwoju. Wszelkie raporty o błędach prosimy wysyłać na maila podanego w zakładce "Adres".</p>

						</div>
						<!-- Grid column -->
						<hr class="clearfix w-100 d-md-none">
						<!-- Grid column -->
						<div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
						<!-- Links -->
						<h5 class="font-weight-bold text-uppercase mb-4">Więcej</h5>
						<ul class="list-unstyled">
							<li>
							<p>
								<a href="#!">WSPÓŁPRACA</a>
							</p>
							</li>
							<li>
							<p>
								<a href="#!">O NAS</a>
							</p>
							</li>
							<li>
							<p>
								<a href="#!">BLOG</a>
							</p>
							</li>
							<li>
							<p>
								<a href="#!">NAGRODY</a>
							</p>
							</li>
						</ul>
						</div>
						<!-- Grid column -->
						<hr class="clearfix w-100 d-md-none">
						<!-- Grid column -->
						<div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">
						<!-- Contact details -->
						<h5 class="font-weight-bold text-uppercase mb-4">Adres</h5>
						<ul class="list-unstyled">
							<li>
							<p>
								<i class="fa fa-home mr-3"></i> Rzeszów, ul. Lotnicza 15B, PL</p>
							</li>
							<li>
							<p>
								<i class="fa fa-envelope mr-3"></i> SRBL@srbl.com</p>
							</li>
							<li>
							<p>
								<i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
							</li>
							<li>
							<p>
								<i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
							</li>
						</ul>
						</div>
						<!-- Grid column -->
						<hr class="clearfix w-100 d-md-none">
						<!-- Grid column -->
						<div class="col-md-2 col-lg-2 text-center mx-auto my-4">
						<!-- Social buttons -->
						<h5 class="font-weight-bold text-uppercase mb-4">Follow Us</h5>
						<!-- Facebook -->
						<a class="btn-floating btn-lg btn-fb" type="button" role="button"><i class="fa fa-facebook-f"></i></a><br>
						<!-- Twitter -->
						<a class="btn-floating btn-lg btn-tw" type="button" role="button"><i class="fa fa-twitter"></i></a><br>
						<!-- Google +-->
						<a class="btn-floating btn-lg btn-ins" type="button" role="button"><i class="fa fa-instagram"></i></a><br>
						<!-- Dribbble -->
						<a class="btn-floating btn-lg btn-yt" type="button" role="button"><i class="fa fa-youtube"></i></a>
						</div>
						<!-- Grid column -->
					</div>
					<!-- Grid row -->
					</div>
					<!-- Footer Links -->
					<!-- Copyright -->
					<div class="footer-copyright text-center py-3">© 2020 Copyright:
					<a> SRBL Team</a>
					</div>
					<!-- Copyright -->
					</footer>
					<!-- Footer -->

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</body>
</html>
