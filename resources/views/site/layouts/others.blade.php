@include('site.partials.header')

<!-- Load page -->
<div class="animationload">
    <div class="loader"></div>
</div>
<!-- End load page -->

<div id="wraper">

    <!-- Start Head section -->
    <header class="head">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-8 col-sm-11 col-lg-11">
                    <img class="logo-page" src="{{asset('assets/img/'.$pageInfo['pageLogo'])}}_l.png" alt="Ukieweb">
                    <!-- Title Page -->
                    <h2 class="title">{{$pageInfo['pageHeading']}}</h2>
                    <!-- Description Page -->
                    <h4 class="sub-title">{{$pageInfo['pageHeadingSlogan']}}</h4>
                </div>
                <div class="col-xs-4 col-sm-1 col-lg-1 text-right">
                    <a href="{{url('/')}}" class="btn-close hover-animate"></a>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </header>
    <!-- End Head section -->


        @yield('contents')

@include('site.partials.footer')
