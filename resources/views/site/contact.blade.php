@extends('site.layouts.others')


@section('contents')

<section class="content padding-block border-bottom">
      <!-- start container -->
      <div class="container">
          <!-- start row -->
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-lg-6">
                  <h3 class="title title-contact">Map</h3>
                  <div id="map" class="map"></div>
              </div>
              <div class="col-xs-12 col-sm-12 col-lg-6">
                  <h3 class="title title-contact">Contact form</h3>
                  <!-- Start Contact Form -->
                  <div class="contact-form">
                      @if(count($errors)>0)
                      <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                          <li>{{$err}}</li>
                        @endforeach
                      </div>
                      @endif
                      @if(session('msg')=='ok')
                      <div class="alert alert-success">
                        Thank you, I'll contact you as soon as possible
                      </div>
                      @endif
                      <form action="{{url('/message')}}" id="contact-form" method="post">
                          <input type="text" id="user-name" name="name" value="" placeholder="Name">
                          <input type="email" id="user-email" name="email" value="" placeholder="Email">
                          <textarea id="user-message" name="message" placeholder="Message"></textarea>
                          <div class="footer-form">
                              <input type="hidden" name="_token"value="{{csrf_token()}}">
                              <input type="submit" class="btn btn-color hover-animate" value="Send Message">
                              <div class="info-message-form">
                                  <p>Please fill out all the fields!</p>
                                  <span class="close-msg"><i class="fa fa-close"></i></span>
                              </div>
                          </div>
                      </form>
                  </div>
                  <!-- End Contact Form -->
              </div>
          </div>
          <!-- end row -->
      </div>
      <!-- end container -->
  </section>

@endsection
