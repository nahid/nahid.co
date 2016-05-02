@extends('site.layouts.master')


@section('contents')
<!-- start post -->
@foreach($data as $diary)
<div class="post">
    <!-- start photo -->
    <div class="photo">
        <a href="{{url('diary/read/'.$diary->id)}}">
            <img src="{{asset('media/diary/'.$diary->featured_image)}}" alt="{{$diary->title}}">
        </a>
    </div>
    <!-- end photo -->
    <!-- start title post -->
    <a class="h3 title-link" href="{{url('diary/read/'.$diary->id)}}">
        <h3 class="title title-blog">{{$diary->title}}</h3>
    </a>
    <!-- end title post -->
    <div class="entry-byline">
         <i class="fa fa-user"></i>
        <span class="entry-author right-border">
            <a href="{{url('profile/'.$diary->user->id)}}" title="Posts by {{$diary->user->name}}" rel="author" >
                <span>{{$diary->user->name}}</span>
            </a>
        </span>
        <i class="fa fa-globe"></i>
        <span class="entry-author right-border">
            <a href="{{url('diary/category/'.$diary->category->category_alias)}}" title="Category of {{$diary->category->category_alias}}" rel="author">
                <span>{{$diary->category->category_name}}</span>
            </a>
        </span>
        <i class="fa fa-clock-o"></i>
        <time class="entry-published right-border">{{date('d/m/Y', strtotime($diary->created_at))}}</time>
        <i class="fa fa-comment"></i>
        <span class="comments-link right-border">{{count($diary->comments)}} Comments</span>
        <i class="fa fa-eye"></i>
        <span class="entry-author">{{$diary->visits}} Visits</span>
    </div>
    <!-- start desc post -->
    <p>{!!strShorten(Markdown::convertToHtml($diary->note), 500)!!}</p>
    <!-- end desc post -->
    <aside class="diary-tags">
    <div class="tagcloud">
        @foreach($diary->tags as $tag)
        <a href="{{url('diary/tag/'.$tag->tag_name)}}" class="hover-animate">{{$tag->tag_name}}</a>
        @endforeach
    </div>
    </aside>
    <a href="{{url('diary/read/'.$diary->id)}}" class="btn btn-info hover-animate btn-color-hover">Read More</a>
</div>
<!-- end post -->
@endforeach
    @if(isset($tags))
        @if(count($data)<1)
                <h3>Sorry we did'nt found any article from your desire query</h3>
                <h4>But maybe these tags can help to you</h4>
        <div class="post">
            <aside class="diary-tags">
                <div class="tagcloud">
                    @foreach($tags as $tag)
                        <a href="{{url('diary/tag/'.$tag->tag_name)}}" class="hover-animate">{{$tag->tag_name}}</a>
                    @endforeach
                </div>
            </aside>
        </div>
        @endif
    @endif


<!-- start pagination -->
<div class="pagination">
<!--       <span class="page-numbers current">1</span>
      <a class="page-numbers" href="#">2</a>
      <a class="page-numbers" href="#">3</a>
      <span class="page-numbers dots">…</span>
      <a class="page-numbers" href="#">9</a> -->

    @if($data->previousPageUrl())

      <a class="next page-numbers" href="{{$data->previousPageUrl()}}"><< Previous</a>

    @endif

    @if($data->hasMorePages())

      <a class="next page-numbers" href="{{$data->nextPageUrl()}}">Next >></a>

    @endif
</div>
<!-- end pagination -->

<script type="text/javascript">
$(document).ready(function(){
    $("pre").snippet("php",{style:"bright",startText:true});
});
</script>

@stop
