<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/62b510581b.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ URL::asset('/css/styles.css') }}">
    <link rel="shortcut icon" href="{{ URL::asset('/img/fraxinus_logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     
    @livewireStyles
    <head>
    
      <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
      <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

      <style>
         trix-toolbar [data-trix-button-group ="file-tools"]{
          display: none;
        }
        trix-editor{
          background-color: white;
        }
        .trix-button-group{
          background-color: white;
        }
      </style>

    </head>

    <title>Fraxinus</title>
  </head>
<body>
  

