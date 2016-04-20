@extends('site.layouts.email')
@section('contents')
	<h2 style="margin: 0; padding: 0; font-size: 16px; font-weight: bold; color: #fd2323; text-align: left;">Dear {{$user->name}},</h2>
	Thank you for contacting with me. Your message is already in queue. I will contact with you as soon as possible.
	@endsection
