<!-- Start Footer section -->
<footer class="footer">
    <!-- start container -->
    <div class="container">
        <!-- start row -->
        <div class="row">
            <!-- start phone number -->
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <a href="#" class="hover-animate">
                    <span class="ukie-icons hover-animate"><i class="fa fa-phone"></i></span> +88 01848 044 143
                </a>
            </div>
            <!-- end phone number -->
            <!-- start email -->
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <a href="#" class="hover-animate">
                    <span class="ukie-icons hover-animate"><i class="fa fa-paper-plane"></i></span> talk@nahid.co
                </a>
            </div>
            <!-- end email -->
            <!-- start address -->
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <a href="#" class="hover-animate">
                    <span class="ukie-icons hover-animate"><i class="fa fa-map-marker"></i></span> Mirpur 2, Dhaka - 1216
                </a>
            </div>
            <!-- end address -->
            <!-- start Copyright-animate"> -->

            <!-- start Copyright -->
            <div class="col-xs-12 col-sm-6 col-lg-3 text-right">
                <span class="copyright">{{date('Y')}} &copy; NAH!D</span>
            </div>
            <!-- end Copyright -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</footer>
<!-- End Footer section -->

</div>

<!-- Scroll to Top -->
<a href="#" class="btn scrollToTop"><i class="fa fa-angle-up"></i></a>
<!-- End Scroll to Top -->

<!-- Scripts -->

    <script src="{{asset('assets/js/jquery-1.11.2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/boostrap-files/js/bootstrap.min.js')}}" type="text/javascript"></script>


    <script src="{{asset('assets/js/jquery.countTo.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.appear.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.nicescroll.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.mixitup.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.inview.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.knob.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/scripts.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/markdown.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/to-bootstrap.js')}}" type="text/javascript"></script>
    

<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/highlight.min.js"></script>
 <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>
    <script src="{{asset('assets/js/gmaps.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/prettify.js')}}" type="text/javascript"></script>


            <script>hljs.initHighlightingOnLoad();</script>

            <script type="text/javascript">


                $('.social-btn').click(function(event){
                    var href=$(this).attr('href');
                     window.open(href, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=0, left=auto, width=550, height=400");
                     event.preventDefault();
                });


            </script>

            <script type="text/javascript">
    var map;
    $(document).ready(function(){
      prettyPrint();
      map = new GMaps({
        div: '#map',
        lat: 23.803947,
        lng: 90.352951
      });
      map.addMarker({
        lat: 23.803947,
        lng: 90.352951,
        title: 'Nahid Bin Azhar',
        infoWindow: {
          content: '<div  align="center"><img src="{{asset("assets/img/nahid_avatar.jpg")}}" class="img-circle" width="70px" /><h2>Nahid Bin Azhar</h2>  <p><strong>codesum</strong>, Floor#4th(right), House#41, Road#3, Block#A, Section#2, Rainkhola, Mirpur, Dhaka-1216</p></div>'
        }
      });
    });
  </script>


</body>
</html>
