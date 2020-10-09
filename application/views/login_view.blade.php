<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Logowanie</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body style="background: url(/projektsrbl/img/llll.jpg) no-repeat; background-size: cover; font-family: 'Montserrat';font-size: 20px;">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item active"><a class="nav-link" href="#">SRBL</a></li>
              <li class="nav-item"><a class="nav-link" href="{{base_url()}}main">Strona główna</a></li>
              <li class="nav-item"><a class="nav-link" href="{{base_url()}}loty">Loty</a></li>
              <li class="nav-item"><a class="nav-link" href="#kontakt">Kontakt</a></li>
              <li class="nav-item"><a class="nav-link" href="{{base_url()}}user">Zaloguj się</a></li>
          </ul>
      </nav>
    <div class="row container-fluid" style="padding-top: 200px">
      <div class="col"></div>
        <div class="login-page col-3 login" style="background-color: #FAFBFD; border-radius: 10px; padding: 20px 20px 20px 20px; border: 1px solid grey">
          <form action="<?php echo base_url('user/post_login') ?>" method="post" accept-charset="utf-8">
            <center><span style="font-size: 4vh">Zaloguj się</span><br><br>
              E-mail: <br><input class="un " type="text" align="center" name="email" placeholder="E-mail">
              <?php echo form_error('email'); ?><br>
              Hasło: <br><input class="pass" type="password" align="center" name="password" placeholder="Hasło">
              <?php echo form_error('password'); ?><br><br>
              <button type="submit" align="center" class="submit btn btn-outline-primary">Zaloguj się</button>
              <br><br><p>Nie posiadasz konta? Załóż <a href="http://localhost/projektsrbl/user/register">darmowe konto</a>.</p>
            </center>
          </form>
        </div>
      <div class="col"></div>
    </div>
  </body>
</html>
