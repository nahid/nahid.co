@extends('site.layouts.master')

@section('contents')

<div class="post one-post">
                    <!-- start photo -->
                    <div class="photo">
                        <img src="{{asset('media/diary/'.$diary->featured_image)}}" alt="UkieWeb">
                    </div>
                    <!-- end photo -->
                    <!-- start title post -->
                    <h3 class="title title-blog">{{$diary->title}}</h3>
                    <!-- end title post -->
                    <div class="entry-byline">
                        <i class="fa fa-globe"></i>
                        <span class="entry-author right-border">
                            <a href="#" title="Posts by Theme Admin" rel="author">
                                <span>{{$diary->category->category_name}}</span>
                            </a>
                        </span>
                        <i class="fa fa-clock-o"></i>
                        <time class="entry-published right-border">{{date('d/m/Y', strtotime($diary->created_at))}}</time>
                        <i class="fa fa-comment"></i>
                        <span class="comments-link">{{count($diary->comments)}} Comments</span>
                    </div>
                    <!-- start text post -->
                    {{Markdown::convertToHtml($diary->note)}}
                    <!-- end text post -->

                    <!-- start post pagination -->

    <div class="share-buttons" style="margin-top:50px; text-align:center;">
        <h4>Share this diary</h4>
		<!-- Facebook -->
		<a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" title="Share on Facebook" target="_blank" class="btn btn-facebook social-btn"><i class="icon-facebook-1"></i> Facebook</a>
		<!-- Twitter -->
		<a href="http://twitter.com/home?status={{Request::url()}}" title="Share on Twitter" target="_blank" class="btn btn-twitter social-btn"><i class="icon-twitter-1"></i> Twitter</a>
		<!-- Google+ -->
		<a href="https://plus.google.com/share?url={{Request::url()}}" title="Share on Google+" target="_blank" class="btn btn-googleplus social-btn"><i class="icon-gplus"></i> Google+</a>

	</div>


                    <div class="clearfix"></div>
                    <!-- end post pagination -->

                    <!-- start post comments -->
                    <div class="post-comments">
                        <a name="comments"></a>
                        <h3>{{count($diary->comments)}} Comments</h3>
                        <div class="post-content-txt">
                @foreach($comments as $comment)
                            <!-- start post comment -->
                            <div class="post-comment">
                                <div class="col-md-2 col-xs-2 post-user-info text-center">
                                    <div class="user-img">
                                        <img src="{{$comment->user->image}}" alt="UkieWeb">
                                    </div>
                                    <div class="user-name">{{$comment->user->name}}</div>
                                </div>
                                <div class="col-md-10 col-xs-10 post-comment-txt">
                                    <span class="comment-time">{{date('d/m/Y', strtotime($comment->created_at))}}</span>
                                    <span class="reply">
                                        <a class="comment-reply-link hover-animate" href="#"><i class="fa fa-reply"></i> Reply</a>
                                    </span>
                                    <span class="clearfix"></span>
                                    <p>{!!Markdown::convertToHtml($comment->comment)!!}</p>
                                </div>
                            </div>
                            <!-- end post comment -->
                            <div class="clearfix"></div>
             @endforeach




                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <!-- end post comments -->
@if(Auth::check())
                    <!-- start leave comment -->
                    <a name="comment"></a>
                    <div class="leave-comment">
                        <h3>Leave a Comment</h3>
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                          @foreach($errors->all() as $err)
                            <li>{{$err}}</li>
                          @endforeach
                        </div>
                        @endif
                        @if(session('msg'))
                        <div class="alert alert-success">
                          {{session('msg')}}
                        </div>
                        @endif
                        <form id="contact_form" class="form email-form" method="post" action="{{url('diary/comment')}}" autocomplete="off">
                <div class="m-b">
                    <textarea name="comment" data-provide="markdown" data-height="200" rows="5" data-iconlibrary="fa" id="message" class="m-b"></textarea>
                    <input type="hidden" name="diary_id" value="{{$diary->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                            <div class="text-right" style="margin-top:20px;">
                                <button type="submit" class="btn btn-color hover-animate">Post Comment</button>
                            </div>
                        </form>

                    </div>
                    <!-- end leave comment -->
@else
<p>
    To make a comment you have to <a href="{{url('/login')}}">login</a>
</p>
@endif
                </div>



@stop
