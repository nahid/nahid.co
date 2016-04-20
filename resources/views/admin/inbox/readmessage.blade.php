@extends('admin.layouts.master')

@section('contents')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">

              <h1>Sender:  <img src="{{$data->image}}" width="40" alt="" /> {{$data->name}}</h1>
              <span>Email: <a href="mailto:{{$data->email}}">{{$data->email}}</a></span>
              &nbsp; &nbsp; <span>At: {{date('d M, Y', strtotime($data->created_at))}}</span>
              <hr/>
              <p>
                {{$data->message}}
              </p>
              </div>
        </div>
    </div>

@endsection
