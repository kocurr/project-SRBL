<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Rejestracja</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body style="background: url(../img/llll.jpg) no-repeat; background-size: cover; font-family: 'Montserrat';font-size: 20px;">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item active"><a class="nav-link" href="#">SRBL</a></li>
              <li class="nav-item"><a class="nav-link" href="{{base_url()}}main">Strona główna</a></li>
              <li class="nav-item"><a class="nav-link" href="{{base_url()}}loty">Loty</a></li>
              <li class="nav-item"><a class="nav-link" href="#kontakt">Kontakt</a></li>
              <li class="nav-item"><a class="nav-link" href="{{base_url()}}user">Zaloguj się</a></li>
          </ul>
      </nav>
    <div class="row container-fluid" style="padding-top: 50px">
      <div class="col"></div>
        <div class="login-page col-3 login" style="background-color: #FAFBFD; border-radius: 10px; padding: 20px 20px 20px 20px; border: 1px solid grey">
          <form action="<?php echo base_url('user/post_register') ?>" method="post" accept-charset="utf-8">
          <center><span style="font-size: 4vh">Zarejestruj się</span><br>
              <br><input class="un " type="text" align="center" name="login" placeholder="login">
              <?php echo form_error('login'); ?>

              <br><br><input class="un " type="text" align="center" name="first_name" placeholder="imie">
              <?php echo form_error('first_name'); ?>

              <br><br><input class="un " type="text" align="center" name="last_name" placeholder="nazwisko">
              <?php echo form_error('last_name'); ?>

              <br><br><input class="un " type="text" align="center" name="phone_number" placeholder="numer telefonu" maxlength="10">
              <?php echo form_error('phone_number'); ?>

              <br><br><input class="un " type="text" align="center" name="email" placeholder="E-mail">
              <?php echo form_error('email'); ?>

              <br><br><input class="pass" type="password" align="center" name="password" placeholder="Hasło">
              <?php echo form_error('password'); ?>

              <br><br><input class="pass" type="text" align="center" name="age" placeholder="Wiek">
              <?php echo form_error('age'); ?>

              <br><br><input class="pass" type="text" align="center" name="pesel" placeholder="PESEL">
              <?php echo form_error('pesel'); ?>

              <br><br><input class="pass" type="text" align="center" name="address" placeholder="Adres">
              <?php echo form_error('address'); ?>

              <br><br><button type="submit" align="center" class="submit btn btn-outline-primary">Zarejestruj się</button>
            </center>
          </form>
        </div>
      <div class="col"></div>
    </div>
  </body>
</html>
