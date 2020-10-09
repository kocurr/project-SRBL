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
        <h1>Dodaj nowy lot:</h1><br><br>
        <table class="table table-bordered table-secondary">
          <thead class="thead-dark">
            <tr>
              <th>Kraj docelowy</th>
              <th>Miasto wylotu</th>
              <th>Miasto przylotu</th>
              <th>Samolot</th>
              <th>Liczba miejsc</th>
              <th>Data wylotu</th>
              <th>Data przylotu</th>
              <th>Godzina wylotu</th>
              <th>Godzina przylotu</th>
              <th>Działanie</th>
            </tr>
          </thead>
          <tr>
      <form action="<?php echo base_url('user/post_add_flight') ?>" method="post" accept-charset="utf-8">
        <td><input class="un " type="text" align="center" name="destination" size="12" placeholder="Kraj docelowy">
        <?php echo form_error('destination'); ?></td>
        <td><input class="un " type="text" align="center" name="departure_city" size="12" placeholder="Miasto wylotu">
        <?php echo form_error('departure_city'); ?></td>
        <td><input class="un " type="text" align="center" name="arrival_city" size="12" placeholder="Miasto przylotu">
        <?php echo form_error('arrival_city'); ?></td>
        <td><select class="form-control" name="airplane">
            <option value=""></option>
            <?php
            foreach($planes as $airplanes)
            {
                echo '<option value="'.$airplanes['type'].'">'.$airplanes['type'].'</option>';
            }
            ?>
        </select> 
        <?php echo form_error('airplane'); ?></td>
        <td><input class="un " type="text" align="center" name="seats" size="4" placeholder="Liczba siedzeń">
        <?php echo form_error('seats'); ?></td>
        <td><input class="pass" type="date" align="center" name="departure_date" placeholder="departure date">
        <?php echo form_error('departure_date'); ?></td>
        <td><input class="pass" type="date" align="center" name="arrival_date" placeholder="arrival date">
        <?php echo form_error('arrival_date'); ?></td>
        <td><input class="pass" type="time" align="center" name="departure_time" placeholder="departure time">
        <?php echo form_error('departure_time'); ?></td>
        <td><input class="pass" type="time" align="center" name="arrival_time" placeholder="arrival time">
        <?php echo form_error('arrival_time'); ?></td>
        <td><button type="submit" align="center" class="submit btn btn-outline-success">Dodaj lot</button></td>
       </form></tr>
    </table><br><br><br><br>
      </div>
      </div>
      <div class="row container-fluid">
        <div class="col-2"></div>
        <div class="col" style="text-align: center">
    <h1>Dodaj nowy samolot:</h1><br><br>
        <table class="table table-bordered table-secondary">
          <thead class="thead-dark">
            <tr>
              <th>Producent</th>
              <th>Model</th>
              <th>Działanie</th>
            </tr>
          </thead>
          <tr>
      <form action="<?php echo base_url('user/post_add_plane') ?>" method="post" accept-charset="utf-8">
        <td><input class="un " type="text" align="center" name="producer" placeholder="Producent">
        <?php echo form_error('producer'); ?></td>
        <td><input class="un " type="text" align="center" name="type" placeholder="Model">
        <?php echo form_error('type'); ?></td>
        <td><button type="submit" align="center" class="submit btn btn-outline-success">Dodaj samolot</button></td>
       </form></tr>
    </table><br><br><br><br>
    </div>
    <div class="col-2"></div>
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
