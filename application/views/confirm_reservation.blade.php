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
        text-align: center;
        font-size: 60px;
        font-weight: 900;
      }
		 </style>
    </head>
    <body style="font-family: 'Montserrat';font-size: 20px;">
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
				<ul class="navbar-nav">
					<li class="nav-item active"><a class="nav-link" href="#">SRBL</a></li>
					<li class="nav-item"><a class="nav-link" href="{{base_url()}}main">Strona główna</a></li>
					<li class="nav-item"><a class="nav-link" href="{{base_url()}}loty">Loty</a></li>
					<li class="nav-item"><a class="nav-link" href="#kontakt">Kontakt</a></li>
					<li class="nav-item"><a class="nav-link" href="{{base_url()}}profile">Profil</a></li>
					<li class="nav-item"><a class="nav-link" href="{{base_url()}}logout">Wyloguj się!</a></li>
				</ul>
			</nav><br><br>
    <h1>Uzupełnij szczegóły rezerwacji</h1>
    <div style="padding: 3%;">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Lotnisko wylotu</th>
            <th>Lotnisko docelowe</th>
            <th>Data wylotu</th>
            <th>Godzina wylotu</th>
            <th>Dodatkowy bagaż</th>
            <th>Klasa</th>
            <th>Rezerwuj miejsce</th>
          </tr>
        </thead>
        <tr>
          <form action="../doReservation" method="post">
            <input hidden name="flight_id" value="{{$flight->flight_id}}"></input>
            <td name="departure_city">{{$flight->departure_city}}</td>
            <td>{{$flight->arrival_city}}</td>
            <td>{{$flight->departure_date}}</td>
            <td>{{$flight->departure_time}}</td>
            <td><input type="checkbox" name="baggage"></input>Tak</td>
            <td>
              <select name="class">
                <option value="1" selected>Pierwsza</option>
                <option value="2">Ekonomiczna</option>
                <option value="3">Biznes</option>
              </select>
            </td>
            <td><input type="submit" value="Potwierdź" class="btn btn-outline-success"></button></td>
          </form>
        </tr>
        </table>
    </div>
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
