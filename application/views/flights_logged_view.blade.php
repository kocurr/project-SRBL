<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Loty</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <style>
			html {
    		scroll-behavior: smooth;
        }
      .wazne {
        background: no-repeat 50% 50%;
        background-size: cover;
        width: 100%;
        height: 95vh;
        margin: 0px;
        padding-top: 150px;
      }
      h1{
        color: white;
        text-align: center;
        font-size: 60px;
        font-weight: 900;
      }
		 </style>
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
      </ul>
    </nav>
    @if(isset($flights))
      <div class="row container-fluid wazne" style="background-image: url('/projektsrbl/img/lot.jpg')">
        <div class="col-1"></div>
        <div class="col">
        <h1>Najbardziej popularne loty w tym miesiącu!</h1><br><br>
        <table class="table table-bordered table-secondary" >
          <thead class="thead-dark">
            <tr>
              <th>Numer lotu</th>
              <th>Państwo docelowe</th>
              <th>Lotnisko wylotu</th>
              <th>Lotnisko docelowe</th>
              <th>Data wylotu</th>
              <th>Godzina wylotu</th>
              <th>Data przylotu</th>
              <th>Godzina przylotu</th>
              <th>Samolot</th>
              <th>Dostępne miejsca</th>
              <th>Rezerwuj miejsce</th>
            </tr>
            </thead>
            @foreach ($flights as $key => $flight) 
				<tr>
					<td>{{$flight->flight_id}}</td>
					<td>{{$flight->destination}}</td>
					<td>{{$flight->departure_city}}</td>
					<td>{{$flight->arrival_city}}</td>
					<td>{{$flight->departure_date}}</td>
					<td>{{$flight->departure_time}}</td>
					<td>{{$flight->arrival_date}}</td>
					<td>{{$flight->arrival_time}}</td>
					<td>{{$flight->airplane}}</td>
					<td>{{($flight->seats)-count($flight->boughtTickets)}}</td>
					<td><a href="{{base_url()}}reservation/{{$flight->flight_id}}"><button type="button" class="btn btn-outline-primary" id="flight_{{$flight->flight_id}}">Zarezerwuj</button></a></td>  
            @endforeach
          </table>
          </div>
          <div class="col-1"></div>
      </div>
    @endif
    <center><h1 style="color: #7a7a7a; padding-top: 50px">Co wyróżnia nasz system?</h1></center>
    <div class="container" style="font-size: 18px; padding-top: 60px; text-align: center">
      <!-- Three columns of text below the carousel -->
      <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="/projektsrbl/img/different.png" alt="Generic placeholder image" width="140" height="140" >
            <h2>Ogromny wybór</h2>
            <p>W naszym systemie znajduje się obecnie ponad 500 destynacji. Współpracujemy z największymi przewoźnikami, co czyni nas numerem 1 na rynku.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="/projektsrbl/img/billing.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Natychmiastowa odpowiedź</h2>
            <p>Cały czas udoskonalamy nasz system dla Was. Po zakupie lotu, Twój bilet dotrze do Ciebie natychmiastowo! Nie każ sobie czekać.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="/projektsrbl/img/support.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Pomoc techniczna 24/7</h2>
            <p>Nasi konsultanci są gotowi do udzielenia odpowiedźi na najtrudniejsze pytania. Rozwiążemy każdą sprawę niecierpiącą zwłoki!</p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div><br><br>
    <!-- Footer -->
    <footer id="kontakt" class="page-footer font-small mdb-color lighten-3 pt-4" style="font-size: 15px">
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
  </body>
</html>
