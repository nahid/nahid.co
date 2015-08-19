<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->


<!-- Mirrored from ukieweb.com/envato/ukiecard/style1/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 12 Aug 2015 11:15:14 GMT -->
<head>
    <meta charset="utf-8" />
    <title>NAH!D | {{$pageInfo['siteTitle']}}</title>
    <meta name="author" content="ukieweb" />
    <meta name="keywords" content="ukieCard, css3, template, html5 template" />
    <meta name="description" content="ukieCard - Personal Vcard & Resume HTML Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Font Awesome -->
    <link type="text/css" media="all" href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Libs CSS -->
    <link type="text/css" media="all" href="{{asset('assets/boostrap-files/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Animate CSS -->
    <link type="text/css" media="all" href="{{asset('assets/css/animate.css')}}" rel="stylesheet" />
    <!-- Template CSS -->
    <link type="text/css" media="all" href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <!-- Switcher CSS -->
    <link type="text/css" media="all" href="{{asset('assets/css/switcher.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/colour-scheme/color-blue.css')}}" rel="stylesheet" type="text/css" media="all">
    <!-- Responsive CSS -->
    <link type="text/css" media="all" href="{{asset('assets/css/respons.css')}}" rel="stylesheet" />
    <link type="text/css" media="all" href="{{asset('assets/css/bootstrap-markdown.min.css')}}" rel="stylesheet" />
    <link type="text/css" media="all" href="{{asset('assets/css/social-sharing-buttons.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/styles/github.min.css">


    <!-- Style Switcher -->
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/img/favicons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/img/favicons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/img/favicons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/favicons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/img/favicons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/img/favicons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/img/favicons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/img/favicons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/favicons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('assets/img/favicons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('assets/img/favicons/ms-icon-144x144.png')}}">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>







</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">NAH!D | The Alien</a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Profile</a></li>
              <li><a href="#about">Resume</a></li>
              <li><a href="#contact">Workfolio</a></li>
              <li><a href="#contact">Diary</a></li>
              <li><a href="#contact">Contact</a></li>
              @if(Auth::check())
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{Auth::user()->image}}" style="width:19px; height:19px; border-radius:50%" /> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="{{url('logout')}}">Logout</a></li>
                </ul>
              </li>
              @endif
              @if(Auth::guest())
                <li><a href="{{url('login')}}">Login</a></li>
              @endif
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
