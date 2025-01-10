<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	
<meta name="google-site-verification" content="x4H5uKMKsJa3ZJIHc7uGm_yFhwZPvNZ-9ocaATrlq5M">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="VGD Team">
<meta name="description" content="exSLife - Мощный инструмент продвижения в социальный сетях.">
<meta name="keywords" content="раскрутка вконтакте,vk.com,вконтакте,накрутить много друзей,хочу много друзей,накрутка комментариев,накрутка лайков,накрутка друзей,накрутка подписчиков,накрутка опросов,накрутка рассказать друзьям, накрутка репостов, сайт для накрутки вк,монти,крейзилайк">
<meta name="robots" content="no-cache">
	<script src="/assets/js/jquery-1.10.2.min.js"></script>
    <script src="/js/core.js"></script>
    <script src="http://exslife.com:3000/socket.io/socket.io.js"></script>
    <script type="text/javascript">// <![CDATA[
            var socket = io.connect('http://92.46.56.210:3000/');
 
            socket.on('connect', function(data){
                console.log(data);
                socket.emit('subscribe', {channel:'userUpdate{{ Auth::user()->id }}'});

                //showNotify({theme:'success',title:'Comet server started, and connected.'},false);
                console.log('Comet server started, and connected.');
            });
 
            socket.on('userUpdate{{ Auth::user()->id }}', function (data) {
                //Do something with data
                var data = jQuery.parseJSON(data);
                //console.log(data);
                showNotify(data,false);
            });
 
// ]]></script>
	<title>exSLife / {{ $title }}</title>
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->

		<style>
		.file-input-wrapper {
			overflow:hidden;
			position:relative;
			cursor:pointer;
			z-index:1;
		}

		.file-input-wrapper input[type=file],.file-input-wrapper input[type=file]:focus,.file-input-wrapper input[type=file]:hover {
			position:absolute;
			top:0;
			left:0;
			cursor:pointer;
			opacity:0;
			filter:alpha(opacity=0);
			z-index:99;
			outline:0;
		}

		.file-input-name {
			margin-left:8px;
		}
		</style>
	<link rel="stylesheet" href="/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="/assets/css/font-icons/font-awesome/css/font-awesome.min.css" >
	<link rel="stylesheet" href="/assets/css/font-icons/entypo/css/entypo.css" >
	<link rel="stylesheet" href="/assets/css/neon-core-min.css" id="style-resource-5">
	<link rel="stylesheet" href="/assets/css/neon-theme-min.css" id="style-resource-6">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="/assets/css/neon.css">
	<link rel="stylesheet" href="/assets/css/black.css">

	
	<script src="/js/notifications.js"></script>
	<script>$.noConflict();
	var $ = jQuery;</script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	</style>
</head>

<body class="page-body">
<div class="page-container" style="overflow: hidden; outline: none;">	
	
	<div class="sidebar-menu" style="min-height: 100%;">
    	@include('leftSideMenu')
	</div>

	<div class="main-content" style="min-height: 100%;">
    	@include('topMenu')
		<div id='content'>
		@yield('content')
		</div>
	</div>




<script src="/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
<script src="/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
<script src="/assets/js/bootstrap.min.js" id="script-resource-3"></script>
<script src="/assets/js/joinable.js" id="script-resource-4"></script>
<script src="/assets/js/resizeable.js" id="script-resource-5"></script>
<script src="/assets/js/neon-api.js" id="script-resource-6"></script>
<script src="/assets/js/jquery.validate.min.js" id="script-resource-7"></script>
<script src="/assets/js/toastr.js" id="script-resource-7"></script>
<script src="/assets/js/neon-login.js" id="script-resource-8"></script>
<script src="/assets/js/neon-custom.js" id="script-resource-9"></script>


<script src="/assets/js/neon-demo.js" id="script-resource-10"></script>
<script src="/assets/js/neon-chat.js" id="script-resource-15"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
  	
  ga('create', 'UA-38945158-1', 'exslife.com');
  ga('send', 'pageview');

</script>



