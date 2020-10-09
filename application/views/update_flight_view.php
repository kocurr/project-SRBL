<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Panel administratora</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <style>
			html {
    		scroll-behavior: smooth;
        }
      h1 {
        font-size: 80px;
        font-weight: 900;
        text-align: center;
      }

		 </style>
  </head>
  <body style="font-family: 'Montserrat';font-size: 18px;">
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
				<ul class="navbar-nav" style="color: white">
        <li class="nav-item active"><a class="nav-link" href="#">SRBL&nbsp&nbsp&nbsp</a></li>
        <li><a href="<?= base_url();?>main/admin">Profil&nbsp&nbsp</a></li>
					<li><a href="<?= base_url();?>user/logout">Wyloguj się</a></li>
				</ul>
      </nav>
    <div class="row container-fluid" style="padding-top: 50px;">
      <div class="col" style="text-align: center">
        <h1>Edytuj loty:</h1><br><br>
        <table class="table table-bordered table-secondary">
          <thead class="thead-dark">
            <tr>
              <th>Państwo docelowe</th>
              <th>Lotnisko wylotu</th>
              <th>Lotnisko docelowe</th>
              <th>Samolot</th>
              <th>Liczba miejsc</th>
              <th>Data wylotu</th>
              <th>Data przylotu</th>
              <th>Godzina wylotu</th>
              <th>Godzina przylotu</th>
              <th>Edycja</th>
              <th>Działanie</th>
            </tr>
          </thead>
      <?php
      foreach ($flights as $row)
      {
      ?>
      <form method="post" accept-charset="utf-8">
        <tr>
        <td><input class="un " type="text" align="center" name="destination" size="10" value="<?php echo $row->destination; ?>"></td>
        <td><input class="un " type="text" align="center" name="departure_city" size="10" value="<?php echo $row->departure_city; ?>"></td>
        <td><input class="un " type="text" align="center" name="arrival_city" size="10" value="<?php echo $row->arrival_city; ?>"></td>
        <td><input class="un " type="text" align="center" name="airplane" size="8" value="<?php echo $row->airplane; ?>"></td>
        <td><input class="un " type="text" align="center" name="seats" size="2" value="<?php echo $row->seats; ?>"></td>
        <td><input class="pass" type="date" align="center" name="departure_date" value="<?php echo $row->departure_date; ?>"></td>
        <td><input class="pass" type="date" align="center" name="arrival_date" value="<?php echo $row->arrival_date; ?>"></td>
        <td><input class="pass" type="time" align="center" name="departure_time" value="<?php echo $row->departure_time; ?>"></td>
        <td><input class="pass" type="time" align="center" name="arrival_time" value="<?php echo $row->arrival_time; ?>"></td>
        <td><input type="submit" align="center" name="update" class="submit btn btn-outline-success" value="Akceptuj"/></td>
        <td><input type="submit" align="center" name="discard" class="submit btn btn-outline-danger" value="Anuluj"/></td></tr>
       </form>
       <?php
       }
       ?>
        </table><br><br><br><br>
      </div>
    </div>
    <!-- Footer Links -->
    <div class="container text-center text-md-left" style="font-size: 15px">
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
