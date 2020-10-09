<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Testy</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <style>
        #test1{
          text-align: center;
          padding: 5% 15%;
          width: 110%;
        }
        table{
          width: 100%;
          margin-bottom: 5%;
        }
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        tr:nth-child(4){
          font-weight: bold;
          font-size: 160%;
        }
      </style>
  </head>
  <body>
    <div class="container">
      <h1>{{$Test_header}}</h1>
      <a href="{{base_url()}}Testy_jednostkowe"><button type="button" class="btn btn-dark">Testy jednostkowe</button></a>
      <a href="{{base_url()}}Testy_integracyjne"><button type="button" class="btn btn-dark">Testy integracyjne</button></a>
      <div id="test1">
        <pre>{{print_r($test_report)}}</pre>

      </div>
    </div>
  </body>
  </html>
