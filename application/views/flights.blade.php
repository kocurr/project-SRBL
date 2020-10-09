<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Znalezione loty</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <style>
			html {
    		scroll-behavior: smooth;
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
    </nav>
    <div class="row container-fluid" style="padding-top: 50px">
    <div class="col-1"></div>
    <div class="col" style="text-align: center">
      <pre>{{print_r($arrival_city)}}</pre>
      @if(!empty($departure_city) && !empty($arrival_city))
        <h1>Znalezione loty z {{$departure_city}} do {{$arrival_city}}</h1>
      @elseif (!empty($arrival_city))
        <h1>Znalezione loty do {{$arrival_city}}</h1>
      @else
        <h1>Znalezione loty z {{$departure_city}}</h1>
      @endif
      @if(isset($flights))
        <br><br>
        <table class="table table-bordered">
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
                  <td><a href="../reservation/{{$flight->flight_id}}"><button type="button" class="btn btn-outline-primary" id="flight_{{$flight->flight_id}}">Zarezerwuj</button></a></td>
                </tr>
              @endforeach
            </table>
          @else
            <h2>Brak lotów z wybranymi kryteriami</h2><br><br><br>
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
          @endif
          </div>
          <div class="col-1"></div>
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
