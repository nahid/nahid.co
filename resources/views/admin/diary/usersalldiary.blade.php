@extends('admin.layouts.master')

@section('contents')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{url('admin/diary/new')}}" class="btn btn-success">New Diary</a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    @if(session('msg'))
                      <div class="alert alert-success" style="margin-top:10px;">Diary Deleted Successfully</div>
                    @endif
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Diary Title</th>
                      <th>Category</th>
                      <th>Tags</th>

                      <th style="width: 100px">Action</th>
                    </tr>
                    @foreach($data['diary'] as $diary)
                    <tr>
                      <td>{{$diary->id}}</td>
                      <td><a href="{{url('diary/read/'.$diary->id)}}" target="_blank">{{$diary->title}}</a></td>
                      <td>{{$diary->category->category_name}}</td>
                      <td>
                          @foreach($diary->tags as $tag)
                            <code>{{$tag->tag_name}}</code>
                          @endforeach
                      </td>


                      <td>
                          <a href="{{url('admin/diary/edit/'.$diary->id)}}" class="btn btn-info btn-xs">Edit</a>
                          <a href="{{url('admin/diary/delete/'.$diary->id)}}" class="btn btn-danger btn-xs del">Delete</a>

                      </td>
                    </tr>
                      @endforeach

                  </tbody></table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                      @if($data['diary']->previousPageUrl())

                        <li><a class="next page-numbers" href="{{$data['diary']->previousPageUrl()}}"><< Previous</a></li>

                      @endif

                      @if($data['diary']->hasMorePages())

                        <li><a class="next page-numbers" href="{{$data['diary']->nextPageUrl()}}">Next >></a></li>

                      @endif
                  </ul>
                </div>
              </div>
        </div>
    </div>

@endsection
