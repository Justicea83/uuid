<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="/css/app.css">

        <title>@yield('title')</title>

        

       
    </head>
    <body>
       @yield('content') 
        <script src="/jquery.min.js"></script>
       <script src="/bootstrap/js/bootstrap.min.js"></script>
       <script src="/js/app.js"></script>
      
       <script src="vue.js"></script>
       
    </body>
</html>
