@extends('site.layouts.others')

@section('contents')

<div class="row" style="margin-top:60px; margin-bottom:60px;">
  <div class="col-md-4 col-md-offset-4 text-center">
        <img src="{{$data->image}}" alt="{{$data->name}}" class="img-circle" style="width:120px; height:120px; border:1px solid #AAAAAA; padding:3px;" />
        <h1>{{$data->name}}</h1>
        <span class="h4">{{ucfirst($data->role)}} - since {{date('M d, Y', strtotime($data->created_at))}}</span>
  </div>


</div>

@endsection
