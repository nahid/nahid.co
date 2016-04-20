@extends('site.layouts.email')
@section('contents')
	<h2 style="margin: 0; padding: 0; font-size: 16px; font-weight: bold; color: #fd2323; text-align: left;">Dear {{$user['name']}},</h2>
	Thank you for joining with me as an. {{$user['role']}} in <a href="http://nahid.co">nahid.co</a> site. <br/>
	Login <a href="http://nahid.co/login">here</a> to see your profile.
	@endsection
