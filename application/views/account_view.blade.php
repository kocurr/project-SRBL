<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #dddddd;
      }
      span{
        font-weight: bold;
        color: #FCBA04;
      }
      .panelgl{
        padding-top: 40px;
      }
      .panel{
        background-color: #7A7A7A;
        padding: 15px 15px 15px 15px;
        border: solid 2px #289AD7;
        border-radius: 15px;
        width: 100%;
      }
      .reservations{
        background-color: #7A7A7A;
        padding: 15px 15px 15px 15px;
        border: solid 2px #FCBA04;
        border-radius: 15px;
        width: 100%;
      }
      html {
    		scroll-behavior: smooth;
        }
      .last{
        text-align: center;
      }
      .last:hover{
        transform: scale(1.3);
      }
    </style>
    <meta charset="utf-8">
    <title>Profil</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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
      </nav>
      <div class="row container-fluid panelgl">
      <div class="col-3" style="font-size: 20px">
      <div class="panel">
        <h3>Witaj <span>{{$this->session->userdata('first_name')}}</span> na swoim profilu</h3><br>
        <div>
            <p><b>Imię i nazwisko: </b><?=$this->session->userdata('first_name')?> <?=$this->session->userdata('last_name')?></p>
            <p><b>Login: </b><?=$this->session->userdata('login')?></p>
            <p><b>Email: </b><?=$this->session->userdata('email')?></p>
            <p><b>Telefon: </b><?=$this->session->userdata('phone_number')?></p>
            <p><b>PESEL: </b><?=$this->session->userdata('pesel')?></p>
            <p><b>Wiek: </b><?=$this->session->userdata('age')?></p>
            <p><b>Adres: </b><?=$this->session->userdata('address')?></p>
        </div>
        </div>
      </div>
      <div class="col-9 reservations">
        @if(isset($error))
          <h1 style="color: red;">{{$error}}</h1>
        @endif
        @if(isset($myReservations))
          <div style="padding:5%;">
            <h3>Moje rezerwacje</h3><br>
              <table class="table table-bordered table-secondary">
                <thead class="thead-dark">
                  <tr>
                    <th>Lotnisko wylotu</th>
                    <th>Lotnisko docelowe</th>
                    <th>Data wylotu</th>
                    <th>Godzina wylotu</th>
                    <th>Miejsce</th>
                    <th>Klasa</th>
                    <th>Cena</th>
                    <th>Status</th>
                    <th>Zapłać</th>
                    <th>Zrezygnuj</th>
                  </tr>
                </thead>
                  @foreach ($myReservations as $key => $myReservation)
                    @if($myReservation->Reservation_status == 1)
                      <tr>
                        <form action="{{base_url()}}buyTicket/{{$myReservation->Booking_id}}" method="post">
                          <td>{{$myReservation->departure_city}}</td>
                          <td>{{$myReservation->arrival_city}}</td>
                          <td>{{$myReservation->departure_date}}</td>
                          <td>{{$myReservation->departure_time}}</td>
                          <td>{{$myReservation->Seat_number}}</td>
                          <td>{{$myReservation->flichtClass}}</td>
                          <td>{{$myReservation->ticketPrize}} zł</td>
                          <td>{{$myReservation->reservationsStatus}}</td>
                          <td><input type="submit" name="button" value="Zapłać" class="btn btn-outline-success"></input></td>
                          <td><input type="submit" name="button" value="Zrezygnuj" class="btn btn-outline-danger"></input></td>
                        </form>
                      </tr>
                    @endif
                  @endforeach
                </table>
              </div>
              <div style="padding:5%;">
                <h3>Moje bilety</h3><br>
                <table class="table table-bordered table-secondary">
                  <thead class="thead-dark">
                    <tr>
                      <th>Lotnisko wylotu</th>
                      <th>Lotnisko docelowe</th>
                      <th>Data wylotu</th>
                      <th>Godzina wylotu</th>
                      <th>Miejsce</th>
                      <th>Klasa</th>
                      <th>Wydrukuj bilet</th>
                    </tr>
                  </thead>
                    @foreach ($myReservations as $key => $myReservation)
                      @if($myReservation->Reservation_status == 2)
                        <tr>
                          <td>{{$myReservation->departure_city}}</td>
                          <td>{{$myReservation->arrival_city}}</td>
                          <td>{{$myReservation->departure_date}}</td>
                          <td>{{$myReservation->departure_time}}</td>
                          <td>{{$myReservation->Seat_number}}</td>
                          <td>{{$myReservation->flichtClass}}</td>
                          <td class="last"><a href="{{base_url()}}Ticket_generation/{{$myReservation->Booking_id}}"<i class="fa fa-print"></i></a></td>
                        </tr>
                      @endif
                    @endforeach
                  </table>
                </div>
          @else
            <h2>Dokonaj swojej pierwszej rzerwacji! </h2>
          @endif
      </div>
      </div><br>
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
