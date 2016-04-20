@extends('site.layouts.email')
@section('contents')
	<h2 style="margin: 0; padding: 0; font-size: 16px; font-weight: bold; color: #fd2323; text-align: left;">Dear {{$user['name']}},</h2>
	A new diary was published in <a href="{{url('/')}}">nahid.co</a>. Published by <a href="{{url('/user/'.$author['id'])}}">{{$author['name']}}</a> You can checkout this diary by clicking the link bellow.<br/>
	<a href="{{url('/diary/read/'.$diary['id'])}}">{{$diary['title']}}</a>
	@endsection
