<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->


<!-- Mirrored from ukieweb.com/envato/ukiecard/style1/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 12 Aug 2015 11:15:14 GMT -->
<head>
    <meta charset="utf-8" />
    <title>{{$pageInfo['siteTitle']}} :: NAH!D</title>
    <meta name="author" content="Nahid Bin Azhar" />

    <meta name="keywords" content="@if (isset($diary)) @foreach($diary->tags as $tag) {{$tag->tag_name}}, @endforeach @endif nahid, bin, azhar, html5, php, laravel, laravel 5, blog, bangla blog, diary, angular js, web artisan, js, javascript, bangladesh, dhaka, barisal, bubt, bubt student" />
    <meta name="description" content="{{isset($pageInfo['siteContents'])?$pageInfo['siteContents'] : 'Hi, This is NAHID from Southern Asia. I know, you are looking for an excellent & professional web developer. Thats why I am here for you right now! I have been working on PHP, jQuery, jQuery UI, Twitter Bootstrap and Laravel 4 for a long time. Its not me alone, I have a great team named CODESUM. If you have a job to be done, hand it over & RELAX forever... :)'}}" />

    <meta property="og:title" content="{{$pageInfo['siteTitle']}} :: NAH!D" />
    <meta property="og:site_name" content="NAH!D | The Alien" />
    <meta property="og:description"  content="{{isset($pageInfo['siteContents'])?$pageInfo['siteContents'] : 'Hi, This is NAHID from Southern Asia. I know, you are looking for an excellent & professional web developer. Thats why I am here for you right now! I have been working on PHP, jQuery, jQuery UI, Twitter Bootstrap and Laravel 4 for a long time. Its not me alone, I have a great team named CODESUM. If you have a job to be done, hand it over & RELAX forever... :)'}}" />

    <meta  property="og:type" content="article" />
    <meta  property="og:url" content="{{Request::url()}}" />
    <meta  property="og:image" content="{{ isset($pageInfo['siteImage'])?asset('media/diary/'.$pageInfo['siteImage']) : asset('assets/img/nahid_avatar.jpg')}}" />

    <meta name="google-site-verification" content="1_Y-hxUZol_K73c_qTrkVJbuWp9_YJYEIuwWL73edzc" />

    <script type="text/javascript">
      var _baseUrl = "{{url('/')}}";
    </script>

@section('google-rich-content')
    <script type="application/ld+json">
       "@context": "http://schema.org",
      "@type": "WebSite",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{url('/')}}"
      },
      "headline": "NAH!D | The Alen",
      "image": {
        "@type": "ImageObject",
        "url": "{{asset('assets/img/nahid_avatar.jpg')}}",
        "height": "800px",
        "width": "800px"
      },
      "author": {
        "@type": "Person",
        "name": "Nahid Bin Azhar"
      },
       "publisher": {
        "@type": "Organization",
        "name": "NAH!D",
        "logo": {
          "@type": "ImageObject",
          "url": "{{url('/assets/img/logo.jpg')}}",
          "width": "100px",
          "height": "100px"
        }
      },
      "description": "Its Nahid's Personal Blog Site"
}
  </script>
@show

    <link href="https://plus.google.com/u/0/+NahidBinAzhar" rel="publisher">





    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Font Awesome -->
    <link type="text/css" media="all" href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Libs CSS -->
    <link type="text/css" media="all" href="{{asset('assets/boostrap-files/css/bootstrap.min.css')}}" rel="stylesheet" />

    <link href="{{asset('assets/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/owl.theme.css')}}" rel="stylesheet" type="text/css" />
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
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">NAH!D | The Alien</a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="{{ Request::path() ==  'profile' ? 'active' : ''  }}"><a href="{{url('profile')}}">Profile</a></li>
              <li class="{{ Request::path() ==  'resume' ? 'active' : ''  }}"><a href="{{url('/resume')}}">Resume</a></li>
              <li><a href="#contact">Workfolio</a></li>
              <li class="{{ Request::path() ==  'diary' ? 'active' : ''  }}"><a href="{{url('/diary')}}">Diary</a></li>
              <li class="{{ Request::path() ==  'contact' ? 'active' : ''  }}"><a href="{{url('/contact')}}">Contact</a></li>
              @if(Auth::check())
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{Auth::user()->image}}" style="width:19px; height:19px; border-radius:50%" /> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{url('/admin')}}">Account</a></li>
                  <li><a href="{{url('profile/'.auth()->user()->id)}}">Profile</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="{{url('logout')}}">Logout</a></li>
                </ul>
              </li>
              @endif
              @if(Auth::guest())
                <li><a href="{{url('login')}}">Login</a></li>
              @endif


            </ul>
              <div class="col-sm-3 col-md-3">
                  <form class="navbar-form" role="search" method="get" action="{{url('diary/search')}}">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search What I Write" name="q">
                          <div class="input-group-btn">
                              <button class="btn btn-default search-box" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                      </div>
                  </form>
              </div>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
