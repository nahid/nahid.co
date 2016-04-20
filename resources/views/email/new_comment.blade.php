@extends('site.layouts.email')
        @section('contents')
            <h2 style="margin: 0; padding: 0; font-size: 16px; font-weight: bold; color: #fd2323; text-align: left;">Dear {{$users['name']}},</h2>
            A new comment was published in <a href="{{url('/diary/read/'.$comment['diary_id'])}}">nahid.co</a> where you commented before. <br/>
            Please check it out now and response his/her comment.
        @endsection
