<div class="col-xs-12 col-sm-12 col-lg-4">
    <!-- start slidebar -->

    <aside class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>
        <ul>
            @foreach($navData['category'] as $cat)
            <li class="cat-item cat-item-6"><a href="#">{{$cat->category_name}}</a></li>
            @endforeach

        </ul>
    </aside>

    <aside class="widget widget_recent_entries">
        <h3 class="widget-title">Recent Posts</h3>
        <ul>
            @foreach($navData['recents'] as $recent)
            <li><a href="{{url('diary/read/'.$recent->id)}}">{{$recent->title}}</a></li>
            @endforeach
            
        </ul>
    </aside>

    <aside class="widget widget_archive">
        <h3 class="widget-title">Archives</h3>
        <ul>
            <li><a href="#">October 2014</a></li>
            <li><a href="#">September 2014</a></li>
            <li><a href="#">June 2014</a></li>
        </ul>
    </aside>

    <aside class="widget widget_tag_cloud">
        <h3 class="widget-title">Tags</h3>
        <div class="tagcloud">
            <a href="#" class="hover-animate">Web</a>
            <a href="#" class="hover-animate">Illustrations</a>
            <a href="#" class="hover-animate">Graphic design</a>
            <a href="#" class="hover-animate">Applications</a>
            <a href="#" class="hover-animate">Photo</a>
            <a href="#" class="hover-animate">UkieWeb</a>
        </div>
    </aside>

    <!-- end slidebar -->
</div>
