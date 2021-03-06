<!DOCTYPE html>
    <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="icon" type="image/png" href="https://i.imgur.com/vEXu5O8.png">
      <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <!-- Developed CSS -->
      <link rel="stylesheet" href="{{ asset('css/common.css') }}">
      <link rel="stylesheet" href="{{ asset('css/errorpage.css') }}">

      <!-- Developed JS -->
      <title>401 Not Found</title>
  </head>
  <body>
		<h1 class="display-1">4<i class="fa  fa-spin fa-cog fa-3x"></i> 1</h1>
		<h1 class="display-3">ERROR</h1>
    <br> <br>
    @foreach($errors as $message)
      <p class="lower-case">{{$message}}</p>
    @endforeach
    <br> <br> <br> <br> <br><br> <br> <br> <br> <br>
    <p class="lower-case"> <a class="home-page"  href={{route('login')}}> LOG IN NOW! </a> </p>
    <br> <br> <br> <br> <br>
    <p class="lower-case"> <a class="home-page"  href={{route('homepage')}}> GO BACK TO OUR HOMEPAGE </a> </p>
  </body>
</html>
