<?php $fTime = time(); ?>

<html lang="en"><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Neon Admin Panel">
  <meta name="author" content="Laborator.co">
  
  <title>exSLife / {{ $title }}</title>
  

  <link rel="stylesheet" href="/assets/frontend/css/bootstrap-min.css" >
  <link rel="stylesheet" href="/assets/frontend/css/font-icons/entypo/css/entypo.css">
  <link rel="stylesheet" href="/assets/frontend/css/neon.css">

  <script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script>
  <script src="/assets/frontend/js/jquery-1.11.0.min.js"></script>
<script>$.noConflict();</script>

  <!--[if lt IE 9]><script src="./assets/frontend/js/ie8-responsive-file-warning.js"></script><![endif]-->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <style>
  [class^="entypo-"]:before, [class*=" entypo-"]:before {
    line-height:2em;
  }
  </style>
</head>
<body>
        @include('frontEnd.mobileMenu')
        <div class="wrap">
          @include('frontEnd.header')
          @yield('content')
        </div>
        <script src="/assets/frontend/js/gsap/main-gsap.js" id="script-resource-1"></script>
        <script src="/assets/frontend/js/bootstrap.js" id="script-resource-2"></script>
        <script src="/assets/frontend/js/joinable.js" id="script-resource-3"></script>
        <script src="/assets/frontend/js/resizeable.js" id="script-resource-4"></script>
        <script src="/assets/frontend/js/neon-slider.js" id="script-resource-5"></script>
        <script src="/assets/frontend/js/neon-custom.js" id="script-resource-6"></script>
    </body>
</html>

<?php   $lTime = time();
           $time = $lTime-$fTime;
           echo $time; ?>