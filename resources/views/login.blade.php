@extends('layouts.others')

@section('contents')
<div class="info border-bottom padding-block text-center" style="border:0px;">
  <h3 class="title">You can login with these social services</h3>
  <div class="circle-block ">
      <a class="icon hover-animate" href="{{url('login/facebook')}}"><i class="fa fa-facebook"></i></a>

  </div>
  <div class="circle-block">
    <a class="icon hover-animate" href="{{url('login/github')}}"><i class="fa fa-github"></i></a>

  </div>
  <div class="circle-block">
    <a class="icon hover-animate" href="{{url('login/google')}}"><i class="fa fa-google"></i></a>

  </div>
  <!-- <div class="circle-block">
    <a class="icon hover-animate" href="{{url('login/twitter')}}"><i class="fa fa-twitter"></i></a>

  </div> -->
</div>



@stop
