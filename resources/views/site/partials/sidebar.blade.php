<div class="col-xs-12 col-sm-12 col-lg-4">
    <!-- start slidebar -->

    <aside class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>
        <ul>
            @foreach($navData['category'] as $cat)
            <li class="cat-item cat-item-6"><a href="{{url('/diary/category/'.$cat->category_alias)}}">{{$cat->category_name}}</a></li>
            @endforeach

        </ul>
    </aside>

    <aside class="widget widget_recent_entries">
        <h3 class="widget-title">Popular Diary</h3>
        <ul>
            @foreach($navData['populars'] as $popular)
            <li><a href="{{url('diary/read/'.$popular->id)}}">{{$popular->title}}</a></li>
            @endforeach

        </ul>
    </aside>
    <aside class="widget widget_recent_entries">
        <h3 class="widget-title">Recent Diary</h3>
        <ul>
            @foreach($navData['recents'] as $recent)
            <li><a href="{{url('diary/read/'.$recent->id)}}">{{$recent->title}}</a></li>
            @endforeach

        </ul>
    </aside>

    {{--<aside class="widget widget_archive">--}}
        {{--<h3 class="widget-title">Archives</h3>--}}
        {{--<ul>--}}
            {{--<li><a href="#">October 2014</a></li>--}}
            {{--<li><a href="#">September 2014</a></li>--}}
            {{--<li><a href="#">June 2014</a></li>--}}
        {{--</ul>--}}
    {{--</aside>--}}

    <aside class="widget widget_tag_cloud">
        <h3 class="widget-title">Tags</h3>
        <div class="tagcloud">
            @foreach($navData['tags'] as $tag)
            <a href="{{url('diary/tag/'.$tag->tag_name)}}" class="hover-animate">{{$tag->tag_name}}</a>
            @endforeach
        </div>
    </aside>

    <!-- end slidebar -->
</div>
