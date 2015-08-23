@include('site.partials.header')

    <!-- Load page -->
    <div class="animationload">
        <div class="loader"></div>
    </div>
    <!-- End load page -->

    <div id="wraper">

        <!-- Start Home-header section -->
        <section class="home-header border-bottom padding-block">
            <!-- start container -->
            <div class="container">
              @yield('contents')
            </div>
            <!-- end container -->
        </section>
        <!-- End Home-header section -->

            <!-- end address -->
            <!-- start Copyright -->
        <!-- Start Menu section -->
        <nav class="menu">
            <!-- start container -->
            <div class="container">
                <!-- start row -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-12">

                        <!-- start menu block (profile) -->
                        <a href="{{url('profile')}}" class="menu-li">
                            <!-- img menu block -->
                            <span class="foto">
                                <img src="{{asset('assets/img/menu/profile.png')}}" class="menu-img" data-img-name="profile" alt="Ukieweb">
                            </span>
                            <!-- name menu block -->
                            <span class="name">Profile</span>
                        </a>
                        <!-- end menu block (profile) -->

                        <!-- start menu block (resume) -->
                        <a href="{{url('/resume')}}" class="menu-li">
                            <!-- img menu block -->
                            <span class="foto">
                                <img src="{{asset('assets/img/menu/resume.png')}}" class="menu-img" data-img-name="resume" alt="Ukieweb">
                            </span>
                            <!-- name menu block -->
                            <span class="name">Resume</span>
                        </a>
                        <!-- end menu block (resume) -->

                        <!-- start menu block (portfolio) -->
                        <a href="portfolio.html" class="menu-li">
                            <!-- img menu block -->
                            <span class="foto">
                                <img src="{{asset('assets/img/menu/portfolio.png')}}" class="menu-img" data-img-name="portfolio" alt="Ukieweb">
                            </span>
                            <!-- name menu block -->
                            <span class="name">Workfolio</span>
                        </a>
                        <!-- end menu block (portfolio) -->

                        <!-- start menu block (blog) -->
                        <a href="{{url('diary')}}" class="menu-li">
                            <!-- img menu block -->
                            <span class="foto">
                                <img src="{{asset('assets/img/menu/blog.png')}}" class="menu-img" data-img-name="blog" alt="Ukieweb">
                            </span>
                            <!-- name menu block -->
                            <span class="name">Diary</span>
                        </a>
                        <!-- end menu block (portfolio) -->

                        <!-- start menu block (contact) -->
                        <a href="{{url('/contact')}}" class="menu-li">
                            <!-- img menu block -->
                            <span class="foto">
                                <img src="{{asset('assets/img/menu/contact.png')}}" class="menu-img" data-img-name="contact" alt="Ukieweb">
                            </span>
                            <!-- name menu block -->
                            <span class="name">Contact</span>
                        </a>
                        <!-- end men  u block (contact) -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </nav>
        <!-- End Menu section -->
@include('site.partials.footer')
